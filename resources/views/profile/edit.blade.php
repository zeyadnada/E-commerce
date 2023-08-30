@extends('frontend.layouts.parent')



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
                            <input type="text" name="name" id="name"
                                class="@error('name') is-invalid @enderror form-control" placeholder=""
                                aria-describedby="helpId" value="{{ Auth::user()->name }}">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone"
                                class="@error('phone') is-invalid @enderror form-control" placeholder=""
                                aria-describedby="helpId" value="{{ Auth::user()->phone }}">
                            @error('phone')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-6">
                            <label for="name">User Email</label>
                            <input type="text" name="email" id="email"
                                class="@error('email') is-invalid @enderror form-control" placeholder=""
                                aria-describedby="helpId" value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="name">Profile Image</label>
                            <input type="file" name="avatar" id="avatar"
                                class="@error('avatar') is-invalid @enderror form-control" placeholder=""
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

