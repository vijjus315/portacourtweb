@extends('web.utils.master')
@section('content')
@section('head')
<title>Track My Orders | PortaCourts</title>
<meta name="description" content="Track your PortaCourts orders easily with our order tracking tool. Get real-time updates and delivery information for all your purchases.">
<link rel="canonical" href="https://www.portacourts.com/track-orders" />
@endsection
<style>
  .trackinput {
    width: 50%;
    text-align: center;
    display: flex;
    margin: auto;
    justify-content: center;
    align-items: center;
}

    .track-order-btn:hover i {
        margin-left: 10px;
    }

    @media (max-width:768px) {
        .trackinput {
            width: 100%;
        }
    }
</style>
<section class="trackorder-wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-center text-decoration-underline">Track Your Order</h2>
                <!-- <p class="fw-500 f18">To track your order please enter your Order ID in the box below and click the "Track" button. This was given to you on your receipt and in the confirmation email you should have received, or you can get your order ID from your user dashboard.</p> -->
                <p class="fw-500 f18">Enter your Order Number to view the current status of your order.</p>
                <form action="{{ route('order.track') }}" method="POST">
                    @csrf
                    <input class="trackinput form-control common-input" type="text" name="order_number" placeholder="Enter your Order Number" required>
                    @if(session('error'))
                        <p class="error-msg mt-2 mb-0 text-danger fw-500">{{ session('error') }}</p>
                    @endif
                    <button type="submit" class="black-btn mt-4 track-order-btn w-25">Track Order <i class="fa fa-arrow-right me-1" aria-hidden="true"></i>
                    </button>
                </form>
               
                <div class="text-center mt-5">
                    <h3 class="mb-3">Need Help with Your Order?</h3>
                    <p>Email: <a href="mailto:support@portacourts.com">support@portacourts.com</a></p>
                    <p>Phone: <a href="tel:+18005551234">+1 (800) 272-9717</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 

<div class="container my-5">

    <div class="text-center mb-4">
        <h1 class="display-4 fw-bold">Track Your Order</h1>
        <p class="lead">Eagerly waiting? See where your court is now!</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="card p-4 ">
                <p class="mb-3">Enter your Order Number to view the current status of your order.</p>
                <form id="trackOrderForm">
                    <div class="mb-3">
                        <input type="text" class=" form-control common-input" id="orderNumber" placeholder="Enter your Order Number">
                        <small id="errorText" class="form-text text-danger d-none">Please enter a valid order number.</small>
                    </div>
                    <button type="button" class="btn btn-primary w-100" onclick="trackOrder()">
                        <i class="bi bi-arrow-right"></i> Track Order
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h2 class="h5">Need Help with Your Order?</h2>
        <p>Email: <a href="mailto:support@portacourts.com">support@portacourts.com</a></p>
        <p>Phone: <a href="tel:+18005551234">+1 800-555-1234</a></p>
    </div>

</div> -->






<!-- <script>
    function trackOrder() {
        const orderNumber = document.getElementById('orderNumber').value;
        const errorText = document.getElementById('errorText');

        // Simple validation check
        if (orderNumber.trim() === '') {
            errorText.classList.remove('d-none');
        } else {
            errorText.classList.add('d-none');
            // Logic to track order would go here (e.g., AJAX call)
            alert('Tracking order: ' + orderNumber);
        }
    }
</script> -->


@endsection