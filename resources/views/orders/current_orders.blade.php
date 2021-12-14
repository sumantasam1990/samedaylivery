@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')

    <div class="row">

        <div class="col-12">

            <h2 class="fw-bold mb-4">Current Orders: <span>{{ $product->name }}</span></h2>


            @if(count($orders) > 0)
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Order No.</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Customer Email Id</th>
                    <th>Customer Address</th>
                    <th>Customer Zip Code</th>
                    @if(auth()->user()->user_type == 'retailer')
                    <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @php
                $i = 1;
                @endphp
                @foreach($orders as $order)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->zip }}</td>
                    @if(auth()->user()->user_type == 'retailer')
                    <td>
                        <form onsubmit="return confirmbox()" action="{{ route('retailer.order.delivered') }}" method="post">
                            @csrf
                            <input type="hidden" name="ord" value="{{ $order->order_no }}">
                            <button type="submit" class="btn btn-success btn-sm">Mark As Delivered</button>
                        </form>
                    </td>
                    @endif
                </tr>
                    @php
                    $i++
                    @endphp
                @endforeach
                </tbody>
            </table>
            @else
                <p>No orders found.</p>
            @endif




        </div>

    </div>
</div>



@include('layouts.footer')

<script>
    function confirmbox()
    {
        var conf = window.confirm('Are you sure?');

        if(conf) {
            return true;
        } else {
            return false;
        }
    }
</script>
