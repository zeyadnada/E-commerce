    @extends('frontend.layouts.parent')


    @section('content')
        <!-- start header -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <header>
            <div class="containers">
                <div class="contents">
                    <div class="left_header_content">
                        <h1>
                            Now Shopping Is Easy With Us
                        </h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptatum aut tempore, id quidem
                            voluptatibus asperiores mollitia repellat dicta blanditiis.
                        </p>
                        <div class="header_links">
                            <a href="{{ route('shop.index') }}" class="shop_now">Shop Now</a>
                        </div>
                    </div>
                    <div class="right_header_content">
                        <img src="{{ url('/project_images/couch.png') }}" alt="couch">
                    </div>


                </div>
            </div>
        </header>

        <!-- end header -->

        <!-- start choose_us section -->
        <section class="choose_us" id="choose_us">
            <div class="containers">
                <div class="choose_us_content">
                    <div class="left_choose_content">
                        <h1>Why Choose Us</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum voluptas mollitia possimus,
                            molestias accusantium cupiditate! Veniam, laudantium eligendi?</p>
                        <div class="choose_us_icon_cards">
                            <div class="choose_us_icon_card">
                                <div class="choose_us_icon_card_img">
                                    <img src="{{ url('/project_images/truck.svg') }}" alt="truck">

                                </div>
                                <h5>Fast & Free Shipping</h5>
                                <p>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Ipsum veniam quis earum
                                    harum <br> est at molestias.</p>
                            </div>
                            <div class="choose_us_icon_card">
                                <div class="choose_us_icon_card_img">
                                    <img src="{{ url('/project_images/bag.svg') }}" alt="truck">

                                </div>
                                <h5>Fast & Free Shipping</h5>
                                <p>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Ipsum veniam quis earum
                                    harum <br> est at molestias.</p>
                            </div>
                            <div class="choose_us_icon_card">
                                <div class="choose_us_icon_card_img">
                                    <img src="{{ url('/project_images/support.svg') }}" alt="truck">

                                </div>
                                <h5>Fast & Free Shipping</h5>
                                <p>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Ipsum veniam quis earum
                                    harum <br> est at molestias.</p>
                            </div>
                            <div class="choose_us_icon_card">
                                <div class="choose_us_icon_card_img">
                                    <img src="{{ url('/project_images/return.svg') }}" alt="truck">
                                </div>
                                <h5>Fast & Free Shipping</h5>
                                <p>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Ipsum veniam quis earum
                                    harum <br> est at molestias.</p>
                            </div>
                        </div>


                    </div>
                    <div class="right_choose_content">
                        <img src="{{ url('/project_images/dots-yellow.svg') }}" alt="" class="dots">

                        <img class="core_img" src="{{ url('/project_images/why-choose-us-img.jpg') }}" alt="">
                    </div>

                </div>

            </div>

        </section>
        <!-- end choose_us section -->


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
