@extends('layouts.website')

@section('content')

<style>
    .razorpay-payment-page {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 15px;
        background: #f8f8f8;
    }

    .razorpay-payment-card {
        width: 100%;
        max-width: 520px;
        padding: 35px;
        background: #ffffff;
        border: 1px solid #eeeeee;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        text-align: center;
    }

    .razorpay-payment-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #f8f2e7;
        color: #c89b3c;
        font-size: 28px;
    }

    .razorpay-payment-card h2 {
        margin: 0 0 8px;
        color: #222;
        font-size: 25px;
        font-weight: 600;
    }

    .razorpay-payment-card .payment-desc {
        margin: 0 0 25px;
        color: #777;
        font-size: 14px;
        line-height: 1.6;
    }

    .razorpay-order-details {
        margin-bottom: 25px;
        padding: 18px;
        border-radius: 10px;
        background: #fafafa;
        text-align: left;
    }

    .razorpay-detail-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 9px 0;
        border-bottom: 1px solid #eeeeee;
        font-size: 13px;
    }

    .razorpay-detail-row:last-child {
        border-bottom: none;
    }

    .razorpay-detail-row span {
        color: #777;
    }

    .razorpay-detail-row strong {
        color: #222;
        text-align: right;
    }

    .razorpay-total {
        font-size: 18px !important;
        color: #c89b3c !important;
    }

    .razorpay-pay-btn {
        width: 100%;
        min-height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        border: none;
        border-radius: 8px;
        background: #222;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
    }

    .razorpay-pay-btn:hover {
        background: #c89b3c;
    }

    .razorpay-pay-btn:disabled {
        opacity: .7;
        cursor: not-allowed;
    }

    .razorpay-secure {
        margin-top: 14px;
        color: #888;
        font-size: 11px;
    }

    .razorpay-secure i {
        margin-right: 5px;
        color: #198754;
    }

    @media (max-width: 576px) {
        .razorpay-payment-page {
            padding: 35px 12px;
        }

        .razorpay-payment-card {
            padding: 25px 18px;
            border-radius: 12px;
        }

        .razorpay-payment-card h2 {
            font-size: 21px;
        }
    }
</style>


<section class="razorpay-payment-page">

    <div class="razorpay-payment-card">

        <div class="razorpay-payment-icon">
            <i class="fa-solid fa-credit-card"></i>
        </div>

        <h2>Complete Your Payment</h2>

        <p class="payment-desc">
            Your order has been created. Complete the secure payment
            to confirm your order.
        </p>


        <div class="razorpay-order-details">

            <div class="razorpay-detail-row">
                <span>Order ID</span>

                <strong>
                    {{ $order->invoice_id }}
                </strong>
            </div>


            <div class="razorpay-detail-row">
                <span>Customer</span>

                <strong>
                    {{ $user->name }}
                </strong>
            </div>


            <div class="razorpay-detail-row">
                <span>Payment Method</span>

                <strong>
                    Online Payment
                </strong>
            </div>


            <div class="razorpay-detail-row">
                <span>Amount Payable</span>

                <strong class="razorpay-total">
                    ₹{{ number_format($grandTotal, 2) }}
                </strong>
            </div>

        </div>


        <button
            type="button"
            id="razorpayPayButton"
            class="razorpay-pay-btn"
        >
            <i class="fa-solid fa-lock"></i>

            Pay ₹{{ number_format($grandTotal, 2) }}
        </button>


        <div class="razorpay-secure">
            <i class="fa-solid fa-shield-halved"></i>
            Secure payment powered by Razorpay
        </div>

    </div>

</section>


{{-- Razorpay Checkout --}}
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const payButton =
        document.getElementById('razorpayPayButton');


    if (!payButton) {
        return;
    }


    const options = {

        key: @json(env('RAZORPAY_KEY')),

        amount: @json((int) round($grandTotal * 100)),

        currency: 'INR',

        name: @json(config('app.name')),

        description: 'Order Payment',

        order_id: @json($razorpayOrder['id']),

        prefill: {

            name: @json($user->name ?? ''),

            email: @json($user->email ?? ''),

            contact: @json($user->mobile ?? '')

        },

        theme: {
            color: '#222222'
        },


        handler: function (response) {

            payButton.disabled = true;

            payButton.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin"></i> Verifying Payment...';


            fetch(
                "{{ route('customer.payment.success') }}",
                {
                    method: 'POST',

                    headers: {

                        'Content-Type':
                            'application/json',

                        'Accept':
                            'application/json',

                        'X-Requested-With':
                            'XMLHttpRequest',

                        'X-CSRF-TOKEN':
                            "{{ csrf_token() }}"

                    },

                    body: JSON.stringify({

                        order_id:
                            @json($order->id),

                        razorpay_payment_id:
                            response.razorpay_payment_id,

                        razorpay_order_id:
                            response.razorpay_order_id,

                        razorpay_signature:
                            response.razorpay_signature

                    })

                }
            )
            .then(async function (res) {

                const data =
                    await res.json();

                if (!res.ok) {

                    throw new Error(
                        data.message ||
                        'Payment verification failed.'
                    );

                }

                return data;

            })
            .then(function (data) {

                if (data.success) {

                    window.location.href =
                        data.redirect_url ||
                        "{{ route('customer.orders') }}";

                    return;
                }


                throw new Error(
                    data.message ||
                    'Payment verification failed.'
                );

            })
            .catch(function (error) {

                console.error(
                    'Payment verification error:',
                    error
                );


                payButton.disabled = false;

                payButton.innerHTML =
                    '<i class="fa-solid fa-lock"></i> Pay ₹{{ number_format($grandTotal, 2) }}';


                alert(
                    error.message ||
                    'Unable to verify payment. Please contact support.'
                );

            });

        },


        modal: {

            ondismiss: function () {

                console.log(
                    'Razorpay payment window closed.'
                );

            }

        }

    };


    const razorpay =
        new Razorpay(options);


    payButton.addEventListener(
        'click',
        function () {

            razorpay.open();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | AUTO OPEN RAZORPAY
    |--------------------------------------------------------------------------
    |
    | Since customer selected "Online Payment" on checkout,
    | automatically open Razorpay.
    |
    */

    setTimeout(function () {

        razorpay.open();

    }, 500);

});
</script>

@endsection