@extends('frontend.layouts.parent')


@section('css')
    <link rel="stylesheet" href="{{ url('/style/shop.css') }}">
    <link rel="stylesheet" href="{{ url('/style/style.css') }}" />

@endsection

@section('content')
    <header>
        <div class="containers">
            <div class="contents">
                <div class="left_header_content">
                    <h1>
                        {{ $category->name }}
                    </h1>
                    <h4>{{ $category->title }}</h4>
                </div>
                <div class="right_header_content">
                    <img src="{{ url('images/' . $category->picture) }}" alt="couch">
                </div>


            </div>

        </div>
    </header>

    <section class="categories_content">
        <div class="head-title">
            <h1>Products</h1>

        </div>


        <div class="cards">

            @foreach ($products as $product)
                <a class="card" href="{{ route('shop.product.show', $product->id) }}">
                    <img src="{{ url('images/' . $product->product_picture) }}" alt="">
                    <div class="category_name">
                        <h1>{{ $product->product_name }}</h1>
                    </div>

                </a>
            @endforeach

        </div>

    </section>
@endsection
