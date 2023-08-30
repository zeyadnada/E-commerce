@extends('backend.layouts.parent')

@section('title', 'Edit Product')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-6">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" id="product_name"
                            class="@error('product_name') is-invalid @enderror  form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $product->product_name }}">
                        @error('product_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="product_price">Price</label>
                        <input type="number" name="product_price" id="product_price"
                            class="@error('product_price') is-invalid @enderror  form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $product->product_price }}">
                        @error('product_price')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="form-row">

                    <div class="col-6">
                        <label for="product_quantity">Quantity</label>
                        <input type="number" name="product_quantity" id="product_quantity"
                            class="@error('product_quantity') is-invalid @enderror  form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $product->product_quantity }}">
                        @error('product_quantity')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="category_id">Categories</label>
                        <select name="category_id" id="category_id" class="@error('category_id') is-invalid @enderror form-control">
                            @foreach ($categories as $category)
                                <option {{ $product->category_id == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12">
                        <label for="image">Image</label>
                        <input type="file" name="product_picture" value="{{ $product->product_picture }}"
                            class="@error('product_picture') is-invalid @enderror form-control custom-file">
                        @error('product_picture')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12">
                        <label for="product_description">Desciption</label>
                        <textarea class="form-control @error('product_description') is-invalid @enderror form-control custom-file"
                            id="product_description" name="product_description" rows="3">{{ $product->product_description }}</textarea>
                        @error('product_description')
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
