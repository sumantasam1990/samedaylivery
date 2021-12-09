@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')

    <div class="row">

        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mx-auto">

{{--            ----------------------------}}

            <div class="row">
                <div class="col-6">
                    <h2 class="fw-bold">Company Inc.</h2>
                    <h4>Dashboard</h4>
                </div>
                <div class="col-6">
                    <a class="btn btn-success btn-sm" href="">Create Business</a>
                    <a class="btn btn-success btn-sm" href="">Message Room</a>
                </div>
            </div>

            <div class="row">
                @foreach($business as $bus)
                <div class="col-md-4">
                    <div class="box text-center">
                        <a class="text-success fw-bold" href="{{ route('retailer.dashboard.metro', $bus->slug) }}">{{ $bus->name }}</a>
                    </div>
                </div>
                @endforeach
            </div>


        </div>

    </div>
</div>



@include('layouts.footer')

<script>
    function selectPhoto() {
        $("#img").trigger('click');
    }

    function uploadProfilePhoto() {
        $('#quick_upload').trigger('click');
    }


</script>
