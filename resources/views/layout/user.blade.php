<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->

@php
    use App\Models\Category;
    $data = Category::query()->get();
    $totalQuantity = 0;
@endphp
@if (session('cart'))
    @foreach (session('cart') as $item)
        @php
            $totalQuantity += $item['quantity'];
        @endphp
    @endforeach
@endif
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/scss/style.scss') }}">
    <title>BonneyShop</title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="/">BonneyShop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu bg-body">
                            @foreach ($data as $item)
                                <li><a class="dropdown-item bg-success"
                                        href="{{ route('user.category', $item->id) }}">{{ $item->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="nav-link" href="about.html">About us</a></li>
                    {{-- <li><a class="nav-link" href="services.html">Services</a></li> --}}
                    {{-- <li><a class="nav-link" href="blog.html">Blog</a></li> --}}
                    <li><a class="nav-link" href="contact.html">Contact us</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href=""><img src="{{ asset('user/images/user.svg') }}"></a></li>
                    <li>
                        <a class="nav-link" href="{{ route('user.cart') }}"><img
                                src="{{ asset('user/images/cart.svg') }}"></i></a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    @yield('content');

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash;
                            Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a
                                hreff="https://themewagon.com">ThemeWagon</a>
                            <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>

</html>
