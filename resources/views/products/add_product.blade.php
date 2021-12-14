@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
                <h2 class="display-4 text-center heading_txt">Add Products: <span>{{ $metro->name }}</span>

                    {{--                    <i--}}
                    {{--                        style="text-align: center !important; font-size: 14px;"--}}
                    {{--                        data-bs-container="body" data-bs-toggle="popover"--}}
                    {{--                        data-bs-placement="top" data-bs-content="This is how Agents and Buyers can add a Property to their Scorng account and to a Score Page. On A Score Page, simply click the “Add Property” button and open the page to enter in the Property Address, the Listing Link and any notes or files that you want to add." class="fas fa-info-circle"></i>--}}

                </h2>

                <p style="margin-top: -1px;" class="fs-4 text-center heading_txt">These are the products that you will need delivered to customers in this metro area.</p>
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
                    <form action="{{ route('business.add.product.post') }}" method="post">
                        @csrf

                        <input type="hidden" value="{{ $metro->id }}" name="metro">

                        <div class="form-group mb-4">
                            <input type="text" required name="prod[]" class="form-control" placeholder="
Add Product (one color or one flavor counts as one individual product.">
                        </div>

                        <div id="more_input"></div>



                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" onclick="more_input()" class="btn btn-dark">Add Another Product</button>
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
    var i = 1;
    function more_input()
    {
        if(i < 10)
        {
            $("#more_input").append(`
            <div class="form-group mb-4">
                            <input type="text" required name="prod[]" class="form-control" placeholder="
Add Product (one color or one flavor counts as one individual product.">
                        </div>
        `);
        }
        else
        {
            alert('Max limit 10. You can not add more than 10 products at a time.');
        }

        i++;
    }
</script>
