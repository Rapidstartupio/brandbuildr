<h3 class="text-xl" style="">
    Billings
</h3>
<p class="text-gray-400 py-4 text-sm">Pick a billing plan that suits you</p>
<hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />

@if(auth()->user()->subscriber() && isset(auth()->user()->subscription->plan_id))
@php $plan = Wave\Plan::where('plan_id',auth()->user()->subscription->plan_id)->first(); @endphp
@if($plan)
<div class="flex justify-between items-center">
    <h3 class="my-5 text-xl" style="">
        Your Plan
    </h3>
    <a href="/pricing" class="underline">Change Plan</a>
</div>
<div class="bg-wave-500 flex justify-between items-center py-8 px-6 rounded-lg ">
    <div>
        <h1 class="text-2xl">{{$plan->name}}</h1>
        <h3 class="text-base">{{$plan->description}}</h3>
    </div>
    <div class="text-xl">
        <h1><span class="text-6xl">$<span>{{$plan->price}}</span></span>/per month</h1>
    </div>
</div>
<hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />
@endif
@endif

<div class="">
    @if(auth()->user()->hasRole('admin'))
    <p>This user is an admin user and therefore does not need a subscription</p>
    @else
    @if(auth()->user()->subscriber())
    <!-- <div class="flex flex-col">
        <h3 class="my-5 text-xl">Modify Payment Information</h3>
        <p>Click the button below to update your default payment method</p>
        <button data-url="" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md  bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700" onclick="updateUserCheckout()">Update Payment Info</button>
    </div> -->

    <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />

    <div class="flex flex-col">
        <h3 class="my-5 text-xl">Danger Zone</h3>
        <p class="text-red-400">Click the button below to cancel your subscription.</p>
        <p class="text-xs">Note: Your account will be immediately downgraded.</p>
        <button onclick="cancelClicked()" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-red-500 active:bg-red-600">Cancel Subscription</button>
    </div>

    @include('theme::partials.cancel-modal')
    @else
    <p class="text-gray-600 dark:text-white">Please <a href="/pricing" class="underline">Subscribe to a Plan</a> in order to see your subscription information.</p>
    <a href="/pricing" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">View Plans</a>
    @endif
    @endif
</div>
<script>
    window.cancelClicked = function() {
        Alpine.store('confirmCancel').openModal();
    }
</script>