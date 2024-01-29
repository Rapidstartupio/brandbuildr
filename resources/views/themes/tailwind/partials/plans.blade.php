<div class="flex flex-wrap mx-auto mt-12 px-4 px-32 max-w-8xl prices-block">
    @foreach(Wave\Plan::all() as $plan)
    @php $features = explode(',', $plan->features); @endphp

    <div class="w-full max-w-md px-0 mx-auto mb-6 lg:w-1/4 lg:px-3 lg:mb-0 pricing-table">
        <div class="relative flex flex-col h-full mb-10 bg-white dark:bg-brand-950 bg-opacity-15 border @if($plan->default){{ 'border-wave-700' }}@else{{ 'border-none' }}@endif rounded-2xl shadow-xl border-b-none sm:mb-0">
            <div class="@if($plan->default){{ 'border-wave-700' }}@else{{ 'px-4 pt-7' }}@endif">
                <div> <!-- class="absolute right-0 inline-block transform">-->
                    <h2 class="relative z-20 w-full h-full px-2 py-1 text-xs leading-tight tracking-wide text-center uppercase border-2 @if($plan->default){{ 'border-none rounded-t-2xl dark:text-white bg-wave-700' }}@else{{ 'hidden border-gray-900 text-gray-800' }}@endif rounded-t">Best value</h2>
                    <!--<span class="absolute -top-7 left-1 w-4 h-4 bg-indigo-700 transform p-2" style="z-index: -1;"></span>
                        <span class="absolute -bottom-7 right-1 w-5 h-4 bg-indigo-700 transform" style="z-index: -1;"></span>-->
                </div>
            </div>

            <div class="px-5 mt-2">
                <span class="plan-name font-hairline dark:text-white text-2xl font-bold">{{ $plan->name }}</span>
            </div>

            <div class="px-5 mt-3 pb-7" style="min-height:110px">
                <p class="plan-description text-md leading-7 text-gray-300">{!! $plan->description !!}</p>
            </div>

            <div class="px-5 mt-5">
                <span class="plan-price font-hairline dark:text-white text-5xl font-medium">${{ $plan->price }}</span>
                <span class="per-month text-md font-bold text-gray-500"></span>
            </div>

            <div class="relative inline-flex">
                <div data-plan="{{ $plan->plan_id }}" class="mt-6 inline-flex items-center justify-center mx-auto w-3/4 px-4 py-2 text-base font-semibold dark:text-white transition duration-150 ease-in-out @if($plan->default){{ ' bg-gradient-to-r from-wave-600 to-wave-500 hover:from-wave-500 hover:to-wave-500' }}@else{{ 'bg-none hover:bg-wave-600 active:bg-none border-wave-700 focus:border-none focus:shadow-outline-gray' }}@endif border cursor-pointer rounded-md checkout focus:outline-none disabled:opacity-25">
                    @subscribed($plan->slug)
                    You are subscribed to this plan
                    @notsubscribed
                    @subscriber
                    Switch Plans
                    @notsubscriber
                    Get Started
                    @endsubscriber
                    @endsubscribed
                </div>
            </div>

            <div class="relative mt-6 px-4 pt-0 pb-12 text-gray-700 rounded-b-lg">

                <ul class="flex flex-col space-y-4">
                    @foreach($features as $feature)
                    <li class="relative">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3 dark:text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"></path>
                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" transform="translate(6, -1)"></path>
                            </svg>
                            <span class="text-md dark:text-gray-300">
                                {{ $feature }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--<div class="checkout-container hidden"></div>-->
@if(config('wave.paddle.env') == 'sandbox')
<div class="px-2 mx-auto mt-12 max-w-7xl">
    <div class="w-full p-10 text-gray-600 bg-blue-50 rounded-xl">
        <div class="flex items-center pb-4">
            <svg class="mr-2 w-14 h-14 text-wave-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
            </svg>
            <div class="relative">
                <h2 class="text-base font-bold text-wave-500">Sandbox Mode</h2>
                <p class="text-sm text-blue-400">Application billing is in sandbox mode, which means you can test the checkout process using the following credentials:</p>
            </div>
        </div>
        <div class="pt-2 text-sm font-bold text-gray-500">
            Credit Card Number: <span class="ml-2 font-hairline text-green-500">4242 4242 4242 4242</span>
        </div>
        <div class="pt-2 text-sm font-bold text-gray-500">
            Expiration Date: <span class="ml-2 font-hairline text-green-500">Any future date</span>
        </div>
        <div class="pt-2 text-sm font-bold text-gray-500">
            Security Code: <span class="ml-2 font-hairline text-green-500">Any 3 digits</span>
        </div>
    </div>
</div>
@endif
