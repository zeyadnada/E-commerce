@extends('backend.layouts.parent')

@section('title', 'Create Category')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-6">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name"
                            class="@error('name') is-invalid @enderror form-control" placeholder=""
                            aria-describedby="helpId" value="{{ old('name') }}">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="picture">Image</label>
                        <input type="file" name="picture"
                            class="@error('picture') is-invalid @enderror form-control custom-file">
                        @error('picture')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-12">
                        <label for="title">Category Title</label>
                        <textarea class="form-control @error('title') is-invalid @enderror form-control custom-file" id="title"
                            name="title" rows="3">{{ old('title') }}</textarea>
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row my-4">
                    <div class="col-2">
                        <input type="submit" class="btn btn-primary">
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
