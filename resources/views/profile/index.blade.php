@extends('frontend.layouts.parent')



@section('content')
    <div class="container">
        <div class="card mb-3 my-5 mx-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ url('images/' . Auth::user()->avatar) }}" class="img-fluid rounded-start"
                        alt="Profile Picture" style="max-height: 400px;">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h1 class="card-title">NAME: {{ Auth::user()->name }}</h1>
                        <hr>
                        <h3 class="card-title">PHONE: {{ Auth::user()->phone }}</h3>
                        <h3 class="card-title">EMAIL: {{ Auth::user()->email }}</h3>
                        <hr>
                        <h4 class="card-title">CREATED AT: {{ Auth::user()->created_at }}</h4>
                        <h4 class="card-title">UPDATED AT: {{ Auth::user()->updated_at }}</h4>
                    </div>

                    <a class="btn btn-success" href="{{ route('profile.edit', Auth::user()->id) }}">EDIT</a>
                    <form action="{{ route('profile.destroy', Auth::user()->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class=" btn btn-danger"> Delete </button>
                    </form>
                </div>
            </div>
        </div>



        <br>
        <hr>
        <br>

        <table class="table">
            <thead class="table-warning">
                <tr>
                    <th scope="col">CART ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">TOTAL PRICE</th>
                    <th>DETAILS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->id }}</td>
                        <td>{{ $cart->created_at }}</td>
                        <td>{{ $cart->total_price }} $</td>
                        <td><a class="btn btn-info" href="{{ route('cart.show', $cart->id) }}">Info</a></td>
                    <tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

