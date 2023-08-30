@extends('frontend.layouts.parent')


@section('css')
    <link rel="stylesheet" href="{{ url('/style/shop.css') }}">
    <link rel="stylesheet" href="{{ url('/style/style.css') }}" />
@endsection


@section('content')
    <section class="categories_content">
        <div class="head-title">
            <h1>Here is Your Results.</h1>
        </div>
        <div class="cards">

            @forelse ($products as $product)
                <a class="card" href="{{ route('shop.product.show', $product->id) }}">
                    <img src="{{ url('images/' . $product->product_picture) }}" alt="">
                    <div class="category_name">
                        <h1>{{ $product->product_name }}</h1>
                    </div>
                </a>
            @empty
                <h3>Nothing to Show...</h3>
            @endforelse

        </div>

    </section>
@endsection
