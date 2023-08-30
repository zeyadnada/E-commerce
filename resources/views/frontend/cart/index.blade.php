@if (session('cart'))
    <table class="table">
        <thead class="table-warning">
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">SubTotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ((array) session('cart') as $id => $details)
                <tr>
                    <td><img src="{{ asset('images/' . $details['picture']) }}" alt=""
                            style="max-width: 100px; max-height: 120px; margin-right:25px">{{ $details['itemName'] }}
                    </td>
                    <td>{{ $details['price'] }}$</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>{{ $details['quantity'] * $details['price'] }}$</td>

                    <td>
                        <form action="{{ route('cart.destroy', $id) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class=" btn btn-danger"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Total: {{ $total }}$</h1>
    <div class="container mt-5">
        <form action="{{ route('cart.checkout', $total) }}" method="post" class="d-inline">
            @csrf
            <button class="btn btn-success"> Checkout </button>
        </form>
        <a href="{{ route('shop.index') }}" class="btn btn-dark">Continue Shopping</a>
    </div>
@else
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="alert alert-info">
                <p class="mb-0">No products in cart yet.</p>
            </div>
            <a href="{{ route('shop.index') }}" class="btn btn-primary">Go to Shop</a>
        </div>
    </div>

@endif



@vite(['resources/sass/app.scss', 'resources/js/app.js'])
