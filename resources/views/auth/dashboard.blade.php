@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')



    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">

{{--            ----------------------------}}

            <div class="row">
                <div class="col-6">
                    <h2 class="fw-bold">Company Inc.</h2>
                    <h4>Dashboard</h4>
                </div>
                <div class="col-6">
                    <a class="btn btn-dark btn-sm" href="">Create Business</a>
                </div>
            </div>


        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
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
