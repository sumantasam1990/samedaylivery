@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')

    <div class="row">

        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mx-auto">

            {{--            ----------------------------}}

            <div class="row">
                <div class="col-6">
                    <h2 class="fw-bold">{{ $business->name }}</h2>
                    <h4>Dashboard</h4>
                </div>
                <div class="col-6">
                    <a class="btn btn-success btn-sm" href="">Add Metro Area</a>
                </div>
            </div>

            <div class="row">
                @if(count($metros) > 0)
                    @foreach($metros as $metro)
                        <div class="col-md-4">
                            <div class="box text-center">
                                <a class="text-success fw-bold" href="{{ route('retailer.dashboard.product', [$business->slug, $metro->slug]) }}">{{ $metro->name }}</a>
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
