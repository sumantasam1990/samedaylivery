@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')

    <div class="row">

        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mx-auto">

            {{--            ----------------------------}}

            <div class="row">
                <div class="col-6">
                    <h2 class="fw-bold">{{ $product->name }}</h2>
                    <h4>{{ $metro->name }}</h4>
                    <h4>{{ $business->name }}</h4>
                </div>
                <div class="col-6">
                    <a class="btn btn-success btn-sm" href="{{ route('business.place.order', [$metro->slug, $product->slug]) }}">Place Order</a>
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-6">
                    <p class="fw-bold fs-4"><a class="text-success" href="{{ route('business.inventory', [$metro->slug, $product->slug]) }}">Inventory ({{ count($inventory) }})</a> </p>

                    <p class="fw-bold fs-4"><a class="text-success" href="{{ route('business.order.current', [$product->slug]) }}">Current Orders ({{ count($orders_current) }})</a></p>

                    <p class="fw-bold fs-4"><a class="text-danger" href="{{ route('business.order.past', [$product->slug]) }}">Past Orders ({{ count($orders_past) }})</a></p>

                </div>
                <div class="col-6">
                    <p><a class="btn btn-success btn-sm " href="{{ route('business.send.inventory', [$metro->slug, $product->slug]) }}">Send Inventory</a></p>

                </div>
            </div>


        </div>

    </div>
</div>



@include('layouts.footer')
