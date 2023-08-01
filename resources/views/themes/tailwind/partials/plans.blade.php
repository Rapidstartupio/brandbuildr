<div class="flex flex-wrap mx-auto mt-12 max-w-7xl">
    @foreach(Wave\Plan::all() as $plan)
        @php $features = explode(',', $plan->features); @endphp

        <div class="w-full max-w-md px-0 mx-auto mb-6 lg:w-1/4 lg:px-3 lg:mb-0">
            <div class="relative flex flex-col h-full mb-10 bg-white dark:bg-gray-800 bg-opacity-15 border @if($plan->default){{ 'border-indigo-700' }}@else{{ 'border-none' }}@endif rounded-lg shadow-xl border-b-none sm:mb-0">
                <div class="px-4 pt-7">
                    <div class="absolute right-0 inline-block transform">
                        <h2 class="relative z-20 w-full h-full px-2 py-1 text-xs leading-tight tracking-wide text-center uppercase border-2 @if($plan->default){{ 'border-none dark:text-white bg-indigo-700' }}@else{{ 'hidden border-gray-900 text-gray-800' }}@endif rounded transform rotate-45">Best value</h2>
                        <!--<span class="absolute -top-7 left-1 w-4 h-4 bg-indigo-700 transform p-2" style="z-index: -1;"></span>
                        <span class="absolute -bottom-7 right-1 w-5 h-4 bg-indigo-700 transform" style="z-index: -1;"></span>-->
                    </div>
                </div>

                <div class="px-4 mt-1">
                    <span class="plan-name font-mono dark:text-white text-md font-bold">{{ $plan->name }}</span>
                </div>

                <div class="px-4 mt-2 pb-7" style="min-height:110px">
                    <p class="plan-description text-sm leading-7 text-gray-500">{{ $plan->description }}</p>
                </div>

                <div class="px-4">
                    <span class="plan-price font-mono dark:text-white text-3xl font-bold">${{ $plan->price }}</span>
                    <span class="per-month text-md font-bold text-gray-500">per month</span>
                </div>

                <div class="relative inline-flex">
                        <div data-plan="{{ $plan->plan_id }}" class="mt-6 inline-flex items-center justify-center mx-auto w-3/4 px-4 py-2 text-base font-semibold text-white transition duration-150 ease-in-out @if($plan->default){{ ' bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400' }}@else{{ 'bg-none hover:bg-indigo-600 active:bg-none border-indigo-700 focus:border-none focus:shadow-outline-gray' }}@endif border cursor-pointer rounded-md checkout focus:outline-none disabled:opacity-25">
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

                    <ul class="flex flex-col space-y-2.5">
                        @foreach($features as $feature)
                            <li class="relative">
                                    <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"></path>
                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" transform="translate(4, 0)"></path>
                                    </svg>
                                    <span class="text-md text-white dark:text-gray-500">
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

@if(config('wave.paddle.env') == 'sandbox')
    <div class="px-2 mx-auto mt-12 max-w-7xl">
        <div class="w-full p-10 text-gray-600 bg-blue-50 rounded-xl">
            <div class="flex items-center pb-4">
                <svg class="mr-2 w-14 h-14 text-wave-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                <div class="relative">
                    <h2 class="text-base font-bold text-wave-500">Sandbox Mode</h2>
                    <p class="text-sm text-blue-400">Application billing is in sandbox mode, which means you can test the checkout process using the following credentials:</p>
                </div>
            </div>
            <div class="pt-2 text-sm font-bold text-gray-500">
                Credit Card Number: <span class="ml-2 font-mono text-green-500">4242 4242 4242 4242</span>
            </div>
            <div class="pt-2 text-sm font-bold text-gray-500">
                Expiration Date: <span class="ml-2 font-mono text-green-500">Any future date</span>
            </div>
            <div class="pt-2 text-sm font-bold text-gray-500">
                Security Code: <span class="ml-2 font-mono text-green-500">Any 3 digits</span>
            </div>
        </div>
    </div>
@endif
