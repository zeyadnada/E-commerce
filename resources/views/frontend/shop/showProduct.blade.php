@extends('frontend.layouts.parent')

@section('content')
    <div class="card mb-3 my-5 mx-3">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ url('images/' . $product->product_picture) }}" class="img-fluid rounded-start"
                    alt="Product image">
            </div>
            <div class="col-md-6">
                <div class="card-body p-5">
                    <h1 class="card-title">{{ $product->product_name }}</h1>
                    <h3 class="card-title">Price: {{ $product->product_price }}</h3>
                    <h4 class="card-title">Description: {{ $product->product_description }}</h4>

                    <br>
                    <br>

                    <form method="post" class="row gy-2 gx-3 align-items-center"
                        action="{{ route('addToCart', $product->id) }}">
                        @csrf
                        <div class="col-auto">
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                name="quantity" placeholder="Quantity">
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





@section('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection
