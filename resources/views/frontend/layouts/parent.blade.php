@php
    use App\Models\Category;
    $categories = Category::select('id', 'name')->get();
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('/style/style.css') }}" />


    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        .small-width-input-group {
            max-width: 350px;
        }
    </style>

    @yield('css')
</head>

<body>
    <!-- Start Nav -->
    <nav>
        <div class="containers">
            <div class="contents">

                <div class="logos"> <a class=" text-light text-decoration-none" href="{{ '/home' }}">Eshop</a>
                </div>
                {{-- search part --}}

                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <select name="search_by" class="form-select form-select-sm" style="max-width: 140px"
                            aria-label="Dropdown">
                            <option selected hidden>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        <input type="text" class="form-control" placeholder="Search" name="search_for">
                        <button name="submit" type="submit" class="btn btn-warning">Search</button>
                    </div>
                </form>
                {{-- end search part --}}
                <div class="links">
                    <ul>
                        <li>
                            <a href="{{ '/home' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('shop.index') }}">Shop</a>
                        </li>
                        <li>
                            <a href="#footer">Contact us</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" href="#" class="nav-link dropdown-toggle" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('profile.index') }}" class="dropdown-item text-primary ">
                                    <i class="fa-solid fa-user"></i> My Profile</a>
                                <a href="{{ route('cart.index') }}" class="dropdown-item text-primary">
                                    <i class="fa-sharp fa-solid fa-cart-shopping"></i>My Cart</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>



                    </ul>



                </div>


            </div>
        </div>
    </nav>
    <!-- End Nav -->
    @yield('content')

</body>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@yield('js')

</html>
