@extends('layout.user')
@section('content')
    <!-- Start Hero Section -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('user/images/banner1.png') }}" class="d-block w-100 object-fit-cover " alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('user/images/banner2.png') }}" class="d-block w-100 object-fit-cover " alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('user/images/banner3.png') }}" class="d-block w-100 object-fit-cover " alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($data as $item)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <a href="{{ route('user.detail', $item->id) }}" class="text-decoration-none">
                                    @if ($item->sale == 1)
                                        <div class="badge bg-dark text-white position-absolute"
                                            style="top: 0.5rem; right: 0.5rem">
                                            Sale
                                        </div>
                                    @endif
                                    <!-- Product image-->
                                    <img class="card-img-top " src="{{ Storage::url($item->image) }}" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $item->product_name }}</h5>
                                </a>
                                <!-- Product price-->
                                @if ($item->sale == 1)
                                    <span class="text-muted text-decoration-line-through ">{{ $item->price }}đ</span>
                                    {{ number_format($item->price - $item->price * (10 / 100), 0, ',', '.') }}VND
                                @else
                                    <span class="text-muted ">
                                        {{ number_format($item->price, 0, ',', '.') }}VND
                                    </span>
                                @endif
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill">{{ $item->description }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <form action="{{ route('user.addToCart', $item->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="product_name" value="{{ $item->product_name }}">
                            <input type="hidden" name="price" value="{{ $item->price }}">
                            <input type="hidden" name="image" value="{{ $item->image }}">
                            <input type="hidden" name="quantity" value="1">
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button type="submit" class="btn btn-outline-dark mt-auto">Add
                                        to cart</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
