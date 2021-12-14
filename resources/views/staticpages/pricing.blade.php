@include('layouts.header', ['title' => $title])

<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">Two Simple Price</h1>
            <h5>Week-to-Week. No long term commitment.</h5>
            <div class="row mt-4">
                <div class="col-md-1"></div>
                <div class="col-md-5 mb-3">
                    <div class="box-black text-center">
                        <h2 class="fw-bold fs-2">Same-day
                            GUARANTEED delivery</h2>
                        <h4 class="display-4 fw-bold">$250/wk</h4>
                        <p class="fw-bold">Per Metro</p>
                        <div class="m-0">
                            <p class="m-2 fw-bold fs-6 mb-4">Delivered between 5pm-10pm. 7 days a week including all holidays.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Choose how many metro areas you would like.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">7 days a week delivery, including holidays.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Unlimited products delivered per month.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">$1,000 insurance per unit of product.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Send unlimited inventory per metro per month.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Inventory received email alerts.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Order delivered to customer email alerts.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Interviewed, verified and background checked delivery drivers and associates.</p>
                        </div>
                        <a class="btn btn-dark mt-4" href="{{ route('subscribe') }}">Sign Up</a>
                    </div>
                </div>

                <div class="col-md-5 mb-3">
                    <div class="box-black text-center">
                        <h2 class="fw-bold fs-2">4-hour GUARANTEED delivery</h2>
                        <h4 class="display-4 fw-bold">$500/wk</h4>
                        <p class="fw-bold">Per Metro</p>
                        <div class="m-0">
                            <p class="m-2 fw-bold fs-6 mb-4">Delivered in 4 hours after order is sent by the business. 7 days a week including all holidays.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Choose how many metro areas you would like.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">7 days a week delivery, including holidays.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Unlimited products delivered per month.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">$1,000 insurance per unit of product.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Send unlimited inventory per metro per month.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Inventory received email alerts.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Order delivered to customer email alerts.</p>
                            <p class="m-2 fw-bold fs-6 mb-4">Interviewed, verified and background checked delivery drivers and associates.</p>
                        </div>

                        <a class="btn btn-dark mt-4" href="{{ route('subscribe') }}">Sign Up</a>

                    </div>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>






@include('layouts.footer')
