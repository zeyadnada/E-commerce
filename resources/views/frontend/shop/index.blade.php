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
                        Check What You Want
                    </h1>
                </div>
                <div class="right_header_content">
                    <img src="{{ url('/project_images/freestocks-_3Q3tsJ01nc-unsplash.jpg') }}" alt="couch">
                </div>
            </div>
        </div>
    </header>

    <section class="categories_content">
        <div class="head-title">
            <h1>Our Categories</h1>
        </div>


        <div class="cards">

            @foreach ($categories as $category)
                <div class="card">
                    <a class="card-link text-decoration-none" href="{{ route('shop.show', $category->id) }}">
                        <img src="{{ url('images/' . $category->picture) }}" alt="" class="card-img-top">
                        <div class="card-body bg-light ">
                            <h1 class="card-title text-dark">{{ $category->name }}</h1>
                            <h6 class="card-subtitle text-secondary">{{ $category->title }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

    </section>


    <!-- Start footer -->
    <footer id="footer">
        <div class="containers">
            <div class="footer_content">
                <h1 class="footer_furni">Furni</h1>
                <div class="footer_core_text">
                    <p>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Accusantium, fugiat ipsam, <br>
                        dolores hic sapiente eum perspiciatis consequuntur <br> enim facilis aperiam non ut, laborum
                        tenetur itaque <br> perspiciatis</p>
                    <nav class="footer_nav_1">
                        <a href="#">About Us</a> <br>
                        <a href="#">Services</a> <br>
                        <a href="#">Blog</a> <br>
                        <a href="#">Contact Us</a> <br>
                    </nav>
                    <nav class="footer_nav_2">
                        <a href="#">Supports</a> <br>
                        <a href="#">Knowledge base</a> <br>
                        <a href="#">Live chat</a> <br>
                    </nav>
                    <nav class="footer_nav_3">
                        <a href="#">Jobs</a> <br>
                        <a href="#">Our team</a> <br>
                        <a href="#">Leadership</a> <br>
                        <a href="#">Privact Policy</a> <br>
                    </nav>
                    <nav class="footer_nav_4">
                        <a href="#">Nordic Chair</a> <br>
                        <a href="#">Kruzo Aero</a> <br>
                        <a href="#">Ergonomic Chair</a> <br>
                    </nav>
                </div>
                <div class="footer_icons">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
                <hr>
                <div class="copyright">
                    <p>Copyright @ 2023.All Rights Reserved.-Designed with love by Untree.co</p>
                    <div>
                        <p>Terms & Conditions </p>
                        <p class="Privacy_policy">Privacy policy</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
@endsection


@section('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection
