@extends('backend.layouts.parent')


@section('title', 'show User')

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
                <img src="{{ url('images/' . $user->avatar) }}" class="product-image" alt="Product Image">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h1 class="my-3">#{{ $user->id }}</h1>
            <hr>

            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    User Name
                </h3>
                <h4 class="mt-0">
                    <small>{{ $user->name }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    User Phone
                </h3>
                <h4 class="mt-0">
                    <small>{{ $user->phone }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    User Email
                </h3>
                <h4 class="mt-0">
                    <small>{{ $user->email }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Is Admin
                </h3>
                <h4 class="mt-0">
                    <small>{{ $user->is_admin == 0 ? 'NO' : 'YES' }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Created_at
                </h3>
                <h4 class="mt-0">
                    <small>{{ $user->created_at }}</small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Updated_at
                </h3>
                <h4 class="mt-0">
                    <small>{{ $user->updated_at }}</small>
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
