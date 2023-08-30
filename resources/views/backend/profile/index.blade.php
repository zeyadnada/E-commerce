@extends('backend.layouts.parent')

@section('title', 'My Profile')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
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
                        <h1>NAME: {{ Auth::user()->name }}</h1>
                        <hr>
                        <h3>PHONE: {{ Auth::user()->phone }}</h3>

                        <h3>EMAIL: {{ Auth::user()->email }}</h3>
                        <hr>
                        <h4>CREATED AT: {{ Auth::user()->created_at }}</h4>
                        <h4>UPDATED AT: {{ Auth::user()->updated_at }}</h4>
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
    </div>
@endsection


@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


@endsection
