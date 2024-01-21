@php
$planId = request()->route('plan_id');
@endphp

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



    let checkoutBtns = document.getElementsByClassName("checkout");
    for (var i = 0; i < checkoutBtns.length; i++) {
        checkoutBtns[i].addEventListener('click', function() {
            waveCheckout(this.dataset.plan)
        }, false);
    }

    let updateBtns = document.getElementsByClassName("checkout-update");
    for (var i = 0; i < updateBtns.length; i++) {
        updateBtns[i].addEventListener('click', waveUpdate, false);
    }

    let cancelBtns = document.getElementsByClassName("checkout-cancel");
    for (var i = 0; i < cancelBtns.length; i++) {
        cancelBtns[i].addEventListener('click', waveCancel, false);
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
                    displayMode: "overlay",
                    theme: "light",
                    locale: "en"
                },
                items: itemsList,
                customer: {
                    email: "@if(!auth()->guest()){{ auth()->user()->email }}@endif",
                }
            });
            // Paddle.Checkout.open({
            //     product: product,
            //     email: '@if(!auth()->guest()){{ auth()->user()->email }}@endif',
            //     successCallback: "checkoutComplete",
            // });
        } else {
            alert('Paddle Vendor ID is not set, please see the docs and learn how to setup billing.');
        }
    }

    function waveUpdate() {
        Paddle.Checkout.open({
            override: this.dataset.url,
            successCallback: "checkoutUpdate",
        });
    }

    function waveCancel() {
        Paddle.Checkout.open({
            override: this.dataset.url,
            successCallback: "checkoutCancel",
        });
    }
</script>

@if($planId)
<script>
    console.log('{{$planId}}');
    waveCheckout('{{$planId}}');
</script>
@endif
@if(isset(auth()->user()->subscription->transaction_id))
<script>
    function updateUserCheckout() {
        console.log("{{auth()->user()->paddle_customer_id}}");
        Paddle.Checkout.open({
            transactionId: "{{auth()->user()->subscription->transaction_id}}",
            customer: {
                id: "{{auth()->user()->paddle_customer_id}}"
            }
        });
    }
</script>
@endif