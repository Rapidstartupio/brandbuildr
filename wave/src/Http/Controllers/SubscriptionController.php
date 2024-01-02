<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use TCG\Voyager\Models\Role;
use Wave\PaddleSubscription;
use Carbon\Carbon;
use Wave\Plan;
use Wave\User;

class SubscriptionController extends Controller
{

    private $paddle_checkout_url;
    private $paddle_vendors_url;
    private $endpoint = 'https://vendors.paddle.com/api';

    private $vendor_id;
    private $vendor_auth_code;
    private $paddle_api_base_url;

    public function __construct()
    {
        $this->vendor_auth_code = config('wave.paddle.auth_code');
        $this->vendor_id = config('wave.paddle.vendor');

        $this->paddle_checkout_url = (config('wave.paddle.env') == 'sandbox') ? 'https://sandbox-checkout.paddle.com/api' : 'https://checkout.paddle.com/api';
        $this->paddle_vendors_url = (config('wave.paddle.env') == 'sandbox') ? 'https://sandbox-vendors.paddle.com/api' : 'https://vendors.paddle.com/api';
        $this->paddle_api_base_url = (config('wave.paddle.env') == 'sandbox') ? 'https://sandbox-api.paddle.com/' : 'https://api.paddle.com/';
    }


    public function webhook(Request $request)
    {

        // Which alert/event is this request for?
        $alert_name = $request->alert_name;
        $subscription_id = $request->subscription_id;
        $status = $request->status;


        // Respond appropriately to this request.
        switch ($alert_name) {

            case 'subscription_created':
                break;
            case 'subscription_updated':
                break;
            case 'subscription_cancelled':
                $this->cancelSubscription($subscription_id);
                return response()->json(['status' => 1]);
                break;
            case 'subscription_payment_succeeded':
                break;
            case 'subscription_payment_failed':
                $this->cancelSubscription($subscription_id);
                return response()->json(['status' => 1]);
                break;
        }
    }

    public function cancel(Request $request)
    {
        $this->cancelSubscription($request->id);
        return response()->json(['status' => 1]);
    }

    private function cancelSubscription($subscription_id)
    {
        $subscription = PaddleSubscription::where('subscription_id', $subscription_id)->first();
        $subscription->cancelled_at = Carbon::now();
        $subscription->status = 'cancelled';
        $subscription->save();
        $user = User::find($subscription->user_id);
        $cancelledRole = Role::where('name', '=', 'cancelled')->first();
        $user->role_id = $cancelledRole->id;
        $user->save();
    }

    public function checkout(Request $request)
    {
        sleep(3);
        //PaddleSubscriptions
        $transaction_id = $request->get('transaction_id');

        $url = $this->paddle_api_base_url . "transactions/$transaction_id?include=customer";
        $response = Http::withToken($this->vendor_auth_code)->get($url);
        //$response = Http::get($this->paddle_checkout_url . '/1.0/order?checkout_id=' . $request->checkout_id);
        $status = 0;
        $message = '';
        $guest = (auth()->guest()) ? 1 : 0;

        if ($response->successful()) {
            $resBody = json_decode($response->body());
            if (isset($resBody->data) && isset($resBody->data->items[0])) {
                $data = $resBody->data;
                $transactionItem = $resBody->data->items[0];
                $plans = Plan::all();
                $subscriptionId = $data->subscription_id;
                if ($subscriptionId && $plans->contains('plan_id', $transactionItem->price->id)) {
                    $customer = $data->customer;
                    $subscription = Http::withToken($this->vendor_auth_code)->get($this->paddle_api_base_url . "subscriptions/$subscriptionId?include=next_transaction,recurring_transaction_details");
                    $subscription = json_decode($subscription->body());

                    if ($customer && $subscription) {

                        if (auth()->guest()) {

                            if (User::where('email', $customer->email)->exists()) {
                                $user = User::where('email', $customer->email)->first();
                            } else {
                                // create a new user
                                $registration = new \Wave\Http\Controllers\Auth\RegisterController;

                                $user_data = [
                                    'name' => '',
                                    'email' => $customer->email,
                                    'password' => Hash::make(uniqid())
                                ];

                                $user = $registration->create($user_data);

                                Auth::login($user);
                            }
                        } else {
                            $user = auth()->user();
                        }

                        $plan = Plan::where('plan_id', $transactionItem->price->id)->first();

                        // add associated role to user
                        $user->role_id = $plan->role_id;
                        $user->save();

                        $subscription = PaddleSubscription::create([
                            'subscription_id' => $subscriptionId,
                            'plan_id' => $transactionItem->price->id,
                            'user_id' => $user->id,
                            'status' => 'active', // https://developer.paddle.com/reference/ZG9jOjI1MzU0MDI2-subscription-status-reference
                            'last_payment_at' => $subscription->data->items[0]->previously_billed_at,
                            'next_payment_at' => $subscription->data->items[0]->next_billed_at,
                            'cancel_url' => $subscription->data->management_urls->cancel,
                            'update_url' => $subscription->data->management_urls->update_payment_method
                        ]);

                        $status = 1;
                    } else {
                        $message = 'Error locating that customer id or subscription. Please contact us if you think this is incorrect.';
                    }
                } else {

                    $message = 'Error locating that subscription price id. Please contact us if you think this is incorrect.';
                }
            } else {

                $message = 'Error locating that transaction. Please contact us if you think this is incorrect.';
            }
        } else {
            $message = $response->serverError();
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'guest' => $guest
        ]);
    }

    public function invoices(User $user)
    {

        $invoices = [];

        if (isset($user->subscription->subscription_id)) {
            $response = Http::post($this->paddle_vendors_url . '/2.0/subscription/payments', [
                'vendor_id' => $this->vendor_id,
                'vendor_auth_code' => $this->vendor_auth_code,
                'subscription_id' => $user->subscription->subscription_id,
                'is_paid' => 1
            ]);

            $invoices = json_decode($response->body());
        }

        return $invoices;
    }

    public function switchPlans(Request $request)
    {
        $plan = Plan::where('plan_id', $request->plan_id)->first();

        if (isset($plan->id)) {
            $subscription_id = $request->user()->subscription->subscription_id;
            $url = $this->paddle_api_base_url . "subscriptions/" . $subscription_id;
            // Update the user plan with Paddle
            $response = Http::withToken($this->vendor_auth_code)->patch($url, [
                'proration_billing_mode' => 'prorated_immediately',
                'items' => [
                    [
                        'price_id' => $request->plan_id,
                        'quantity' => 1
                    ]
                ]
            ]);

            if ($response->successful()) {
                $body = $response->json();

                if ($body['data']) {
                    // Next, update the user role associated with the updated plan
                    $request->user()->forceFill([
                        'role_id' => $plan->role_id
                    ])->save();

                    // And, update the subscription with the updated plan.
                    $request->user()->subscription()->update([
                        'plan_id' => $request->plan_id
                    ]);

                    return back()->with(['message' => 'Successfully switched to the ' . $plan->name . ' plan.', 'message_type' => 'success']);
                }
            }
        }

        return back()->with(['message' => 'Sorry, there was an issue updating your plan.', 'message_type' => 'danger']);
    }
}
