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

                </div>
            </div>

            <div class="row mt-4">

                <div class="col-6">
                    <p class="fw-bold fs-4 text-success">Inventory ({{ count($inventory) }}) </p>
                    <p class="fw-bold fs-4"><a class="text-success" href="{{ route('retailer.order.past', [$product->slug]) }}">Past Orders ({{ count($orders_past) }})</a></p>
                    <p class="fw-bold fs-4"><a class="text-danger" href="{{ route('retailer.inventory', [$metro->slug, $product->slug]) }}">Inventory Sending ({{ count($inventory) }})</a></p>
                    <p class="fw-bold fs-4"><a class="text-danger" href="{{ route('retailer.order.current', [$product->slug]) }}">New Orders ({{ count($orders_current) }})</a></p>
                </div>
                <div class="col-6">
                    <p><a class="btn btn-success btn-sm " href="">Update Inventory</a></p>
                </div>
            </div>


        </div>

    </div>
</div>



@include('layouts.footer')
