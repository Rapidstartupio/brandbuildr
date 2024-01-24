@php
$planId = request()->route('plan_id');
@endphp

@extends('theme::layouts.app')

@section('content')

<div class="py-20 text-white">
    <div class="sm:mx-auto sm:w-full sm:max-w-5xl">
        <div class="checkout_paddle bg-brand-800 my-8 md:w-2/3 rounded-xl" style="min-height: 600px;margin: 0 auto;"></div>
    </div>

</div>


@endsection

@section('javascript')

<script src="https://cdn.paddle.com/paddle/v2/paddle.js"></script>
<script>
    window.vendor_id = parseInt('{{ config("wave.paddle.vendor") }}');
    window.client_side_token = '{{ config("wave.paddle.client_side_token") }}';

    if ("{{ config('wave.paddle.env') }}" == 'sandbox') {
        Paddle.Environment.set('sandbox');
    }

    if (vendor_id) {
        Paddle.Setup({
            //vendor: vendor_id
            token: client_side_token,
            pwCustomer: {
                id: '@if(!auth()->guest()){{ auth()->user()->id }}@endif',
                email: '@if(!auth()->guest()){{ auth()->user()->email }}@endif'
            },
            checkout: {
                settings: {
                    frameTarget: 'checkout_paddle',
                    frameInitialHeight: 500,
                    frameStyle: "position:inherit;width:100%;padding-top: 30px;padding-bottom: 30px;height: 700px;"
                },
            },
            eventCallback: function(res) {
                switch (res.name) {
                    case "checkout.loaded":
                        console.log("Checkout opened");
                        break;
                    case "checkout.customer.created":
                        console.log("Customer created");
                        break;
                    case "checkout.completed":
                        console.log("Checkout completed");
                        checkoutComplete(res);
                        break;
                    default:
                        console.log(res);
                }
            }
        });
    }

    function waveCheckout(plan_id) {
        if (vendor_id) {
            let product = parseInt(plan_id);
            var itemsList = [{
                priceId: plan_id,
                quantity: 1
            }];
            console.log(itemsList);
            Paddle.Checkout.open({
                settings: {
                    displayMode: "inline",
                    theme: "dark",
                    locale: "en",
                },
                items: itemsList,
            });
        } else {
            alert('Paddle Vendor ID is not set, please see the docs and learn how to setup billing.');
        }
    }
</script>

@if($planId)
<script>
    waveCheckout('{{$planId}}');
</script>
@endif
@endsection