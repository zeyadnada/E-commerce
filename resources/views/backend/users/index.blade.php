@extends('backend.layouts.parent')

@section('title', 'All Users')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection



@section('search')
    <form action="{{ route('search') }}" method="GET">
        <div class="input-group">
            <input type="hidden" name="search_section" value="user">
            <select name="search_by" class="form-select form-select-sm" style="max-width: 140px" aria-label="Dropdown">
                <option value="name">User Name</option>
                <option value="phone">User Phone</option>
                <option value="email">User Email</option>
            </select>
            <input type="text" class="form-control" placeholder="Search" name="search_for">
            <button name="submit" type="submit" class="btn btn-warning">Search</button>
        </div>
    </form>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">

            @if (session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>user Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-success">Details</a>

                                <form action="{{ route('user.update', $user->id) }}" method="post" class="d-inline">
                                    @method('PUT')
                                    @csrf
                                    <button class=" btn btn-secondary"> Make Admin </button>
                                </form>

                                <form action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class=" btn btn-danger"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h3>Nothing to Show...</h3>
                    @endforelse
                </tbody>
            </table>
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
    {{-- <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script> --}}
@endsection
