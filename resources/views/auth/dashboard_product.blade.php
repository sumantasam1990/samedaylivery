@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')

    <div class="row">

        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mx-auto">

            {{--            ----------------------------}}

            <div class="row">
                <div class="col-6">
                    <h2 class="fw-bold">{{ $metro->name }}</h2>
                    <h4>{{ $business->name }}</h4>
                </div>
                <div class="col-6">

                </div>
            </div>

            <div class="row">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="box text-center">
                                <a class="text-success fw-bold" href="{{ route('retailer.product.info', [$product->slug, $metro->slug, $business->slug]) }}">{{ $product->name }}</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="fw-bold mt-4">No data found.</h4>
                @endif
            </div>


        </div>

    </div>
</div>



@include('layouts.footer')
