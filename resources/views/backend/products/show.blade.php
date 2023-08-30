@extends('backend.layouts.parent')


@section('title', 'show product')

@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
@endsection



@section('content')

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="col-12">
                <img src="{{ url('images/' . $product->product_picture) }}" class="product-image" alt="Product Image">
            </div>

            <hr>
            <br>
            <br>
            <div class="col-12">
                <h2>Product Description</h2>
                <h6>{{ $product->product_description }}</h6>
            </div>

        </div>
        <div class="col-12 col-sm-6">
            <h1 class="my-3">#{{ $product->id }}</h1>
            <hr>

            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Product Name
                </h3>
                <h4 class="mt-0">
                    <small>{{ $product->product_name }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Product Price
                </h3>
                <h4 class="mt-0">
                    <small>{{ $product->product_price }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Product Quantity
                </h3>
                <h4 class="mt-0">
                    <small>{{ $product->product_quantity }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Category Name
                </h3>
                <h4 class="mt-0">
                    <small>{{ $product->category->name}}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Created_at
                </h3>
                <h4 class="mt-0">
                    <small>{{ $product->created_at }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Updated_at
                </h3>
                <h4 class="mt-0">
                    <small>{{ $product->updated_at }}</small>
                </h4>
            </div>

        </div>
    </div>

@endsection





@section('js')
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
@endsection
