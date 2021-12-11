@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
                <h2 class="display-4 text-center heading_txt">Place Order

{{--                    <i--}}
{{--                        style="text-align: center !important; font-size: 14px;"--}}
{{--                        data-bs-container="body" data-bs-toggle="popover"--}}
{{--                        data-bs-placement="top" data-bs-content="This is how Agents and Buyers can add a Property to their Scorng account and to a Score Page. On A Score Page, simply click the “Add Property” button and open the page to enter in the Property Address, the Listing Link and any notes or files that you want to add." class="fas fa-info-circle"></i>--}}

                </h2>

                <p style="margin-top: -1px;" class="fs-4 text-center heading_txt">Your order will be sent to the Same Daylivery storage center in the selected metro area. </p>
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
                    <form action="{{ route('business.place.order.post') }}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <input required type="hidden" name="metro_id" value="{{ $metro->id }}">
                            <input required type="hidden" name="prod_id" value="{{ $prod->id }}">
                            <select class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" style="font-weight: bold;">
                                @foreach($dropdown as $d)
                                <option
                                    value="{{ $d }}" {{ (old("delivery_time") == $d ? "selected" : "") }}>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" required name="c_name" class="form-control" placeholder="Customer Name">
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" required name="c_addr" class="form-control" placeholder="Customer's Street Address">
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" required name="c_zip" class="form-control" placeholder="Customer's Zip Code">
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" required name="c_ph" class="form-control" placeholder="Customer's Phone Number">
                        </div>

                        <div class="form-group mb-4">
                            <input type="email" required name="c_email" class="form-control" placeholder="Customer's Email Address">
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

