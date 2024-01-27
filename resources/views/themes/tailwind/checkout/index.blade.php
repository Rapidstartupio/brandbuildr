@extends('theme::layouts.app')

@section('content')

<div class="py-20 text-white">
    <div class="px-8 mx-auto xl:px-5 max-w-7xl">
        <div class="grid md:grid-cols-2 gap-6 rounded-xl  bg-brand-700">
            <div class="w-full px-0 mx-auto  lg:px-3 lg:mb-0 sm:p-8  bg-brand-700">
                <div class="">
                    <div class="@if($plan->default){{ 'border-indigo-700' }}@else{{ 'px-4 pt-7' }}@endif">
                        <div> <!-- class="absolute right-0 inline-block transform">-->
                            <h2 class="relative z-20 w-full h-full px-2 py-1 text-xs leading-tight tracking-wide text-center uppercase border-2 @if($plan->default){{ 'border-none dark:text-white bg-indigo-700' }}@else{{ 'hidden border-gray-900 text-gray-800' }}@endif rounded-t">Best value</h2>
                            <!--<span class="absolute -top-7 left-1 w-4 h-4 bg-indigo-700 transform p-2" style="z-index: -1;"></span>
                        <span class="absolute -bottom-7 right-1 w-5 h-4 bg-indigo-700 transform" style="z-index: -1;"></span>-->
                        </div>
                    </div>

                    <div class="px-5 mt-1">
                        <span class="plan-name font-hairline dark:text-white text-2xl font-bold">{{ $plan->name }}</span>
                    </div>

                    <div class="px-5 mt-2 pb-7">
                        <!-- style="min-height:110px" -->
                        <p class="plan-description text-md leading-7 text-gray-300">{!! $plan->description !!}</p>
                    </div>

                    <div class="px-5">
                        <span class="plan-price font-hairline dark:text-white text-4xl font-bold">${{ $plan->price }}</span>
                        <span class="per-month text-md font-bold text-gray-500"></span>
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
                    <div class="order-summary space-y-3">
                        <h1 class="text-2xl py-4">Order summary</h1>
                        <div class="sub-totals flex justify-between">
                            <div class="text-gray-300">Subtotal</div>
                            <div class="font-bold"><span id="summary-subtotal"></span> <span class="currency"></span></div>
                        </div>
                        <div class="sub-totals flex justify-between">
                            <div class="text-gray-300">Discount</div>
                            <div class="font-bold"><span id="summary-discount"></span> <span class="currency"></span></div>
                        </div>
                        <div>
                            <a href="javascript:;" class="underline text-wave-800" onclick="openDiscountPanel();">Add discount</a>
                            <div class="pt-2 pl-2 w-full flex justify-between space-x-2 hidden" id="add-discount-panel">
                                <input type="text" class="w-full dark:text-gray-400" id="discount-value" placeholder="Enter your coupon code">
                                <button class="btn bg-wave-500 rounded p-2" onclick="applyDiscount();">Apply</button>
                            </div>
                        </div>
                        <div class="sub-totals flex justify-between">
                            <div class="text-gray-300">Total</div>
                            <div class="font-bold"><span id="summary-total"></span> <span class="currency"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-details w-full px-4 sm:p-8  bg-brand-500 pt-7" style="margin: 0 auto;"></div>
            <!-- min-height: 600px; -->
        </div>
    </div>
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
                    frameTarget: 'checkout-details',
                    //frameInitialHeight: 500,
                    //frameStyle: "position:inherit;width:100%;padding-top: 30px;padding-bottom: 30px;height: 100vh;display: block;border:0;"
                    frameInitialHeight: "450",
                    frameStyle: "width: 100%;   background-color: transparent; border: none;"
                },
            },
            eventCallback: function(res) {
                switch (res.name) {
                    case "checkout.loaded":
                        console.log("Checkout opened");
                        initCheckoutSummary(res);
                        break;
                    case "checkout.customer.created":
                        console.log("Customer created");
                        break;
                    case "checkout.completed":
                        console.log("Checkout completed");
                        checkoutComplete(res);
                        break;
                    case "checkout.updated":
                        checkoutUpdated(res);
                        break;
                    default:
                        if (res.type && res.type == "checkout.error") {
                            setTimeout(function() {
                                popToast("danger", res.detail);
                            }, 10);
                        }
                        console.log(res);
                        if (res.data) {
                            initCheckoutSummary(res);
                        }
                        break;
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

    function initCheckoutSummary(res) {
        console.log(res);
        var summarySubtotal = document.getElementById('summary-subtotal');
        var summaryTotal = document.getElementById('summary-total');
        var summaryDiscount = document.getElementById('summary-discount');
        var currencies = document.querySelectorAll('.currency');


        if (res.data) {
            var data = res.data;
            if (data.totals) {
                summarySubtotal.textContent = data.totals.subtotal;
                summaryTotal.textContent = data.totals.total;
                summaryDiscount.textContent = data.totals.discount;
                currencies.forEach(function(currency) {
                    currency.textContent = data.currency_code;
                });
            }
        }

    }

    function openDiscountPanel() {
        var discountPanel = document.querySelector('#add-discount-panel');
        discountPanel.classList.remove('hidden');
    }

    function closeDiscountPanel() {
        var discountPanel = document.querySelector('#add-discount-panel');
        discountPanel.classList.add('hidden');
    }

    function applyDiscount() {
        var discountValue = document.querySelector('#discount-value').value;
        if (discountValue) {
            Paddle.Checkout.updateCheckout({
                discountCode: discountValue
            });
        }
        console.log(discountValue);

    }

    function checkoutUpdated(res) {
        initCheckoutSummary(res);
        closeDiscountPanel();
    }
</script>

@if($plan->plan_id)
<script>
    waveCheckout('{{$plan->plan_id}}');
</script>
@endif
@endsection