@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
                <h2 class="display-4 text-center heading_txt">Send Inventory

                    {{--                    <i--}}
                    {{--                        style="text-align: center !important; font-size: 14px;"--}}
                    {{--                        data-bs-container="body" data-bs-toggle="popover"--}}
                    {{--                        data-bs-placement="top" data-bs-content="This is how Agents and Buyers can add a Property to their Scorng account and to a Score Page. On A Score Page, simply click the “Add Property” button and open the page to enter in the Property Address, the Listing Link and any notes or files that you want to add." class="fas fa-info-circle"></i>--}}

                </h2>

                <p style="margin-top: -1px;" class="fs-4 text-center heading_txt">Same Daylivery will be notified via email of the shippment.</p>
                <div class="box mt-4">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('business.send.inventory.post') }}" method="post">
                        @csrf

                        <input type="hidden" value="{{ $product->id }}" name="product">

                        <input type="hidden" id="alternate_datepicker" name="shipping" required>

                        <div class="form-group mb-4">
                            <input type="text" required name="units" class="form-control" placeholder="How Many Units Are You Sending">
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" required name="tracking" class="form-control" placeholder="Tracking Number">
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" required name="delivery" class="form-control" placeholder="Delivery Company Used">
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" required class="form-control" placeholder="Shipping Date" id="datepicker">
                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
    </div>
</div>


@include('layouts.footer')

<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            dateFormat: 'DD, d MM, yy',
            altField: "#alternate_datepicker",
            altFormat: "yy-mm-dd"
        });
    } );
</script>
