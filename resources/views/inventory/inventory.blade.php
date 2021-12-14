@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')

    <div class="row">

        <div class="col-12">

            <h2 class="fw-bold mb-4">Inventory: <span>{{ $product->name }}</span></h2>


            @if(count($inventory) > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Units</th>
                        <th>Tracking Number</th>
                        <th>Delivery Company Used</th>
                        <th>Shipping Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($inventory as $inv)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $inv->units }}</td>
                            <td>{{ $inv->tracking }}</td>
                            <td>{{ $inv->delivery }}</td>
                            <td>{{ $inv->shipping }}</td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No inventory found.</p>
            @endif




        </div>

    </div>
</div>



@include('layouts.footer')
