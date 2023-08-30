@extends('backend.layouts.parent')

@section('title', 'Edit My Profile')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-6">
                            <label for="name">User Name</label>
                            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" placeholder=""
                                aria-describedby="helpId" value="{{ Auth::user()->name }}">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="@error('phone') is-invalid @enderror form-control" placeholder=""
                                aria-describedby="helpId" value="{{ Auth::user()->phone }}">
                            @error('phone')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-6">
                            <label for="name">User Email</label>
                            <input type="text" name="email" id="email" class=" @error('email') is-invalid @enderror form-control" placeholder=""
                                aria-describedby="helpId" value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="name">Profile Image</label>
                            <input type="file" name="avatar" id="avatar" class="@error('avatar') is-invalid @enderror form-control" placeholder=""
                                aria-describedby="helpId" value="{{ Auth::user()->avatar }}">
                            @error('avatar')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="col-6">
                        <label for="picture">picture</label>
                        <input type="file" name="picture" value="{{ $category->picture }}"
                            class="@error('picture') is-invalid @enderror form-control custom-file">
                        @error('picture')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    </div>

                    <div class="form-row my-4">
                        <div class="col-2">
                            <input type="submit" value="UPDATE" class="btn btn-primary">
                            <a href="{{ route('profile.index') }}" class="btn btn-dark">
                                BACK
                            </a>

                        </div>

                    </div>
                </form>
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
