@extends('main')

@section('content')
     <!-- Carousel Start -->
     <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('../assets/img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Cami İsmi</h1>
                                    <p class="fs-4 text-white animated zoomIn">Cami Bilgi İçeriği</strong></p>
                                    <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Daha Fazla Detay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('../assets/img/carousel-2.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Cami İsmi</h1>
                                    <p class="fs-4 text-white animated zoomIn">Cami Bilgi İçeriği</strong></p>
                                    <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Daha Fazla Detay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Online Store</p>
                <h1 class="display-6">Want to stay healthy? Choose tea taste</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="{{asset('../assets/img/store-product-1.jpg')}}" alt="">
                        <div class="p-4">
                            <h4 class="mb-3">Cami İsmi</h4>
                            <p>Cami İçeriği</p>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="{{asset('../assets/img/store-product-1.jpg')}}" alt="">
                        <div class="p-4">
                            <h4 class="mb-3">Cami İsmi</h4>
                            <p>Cami İçeriği</p>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="{{asset('../assets/img/store-product-1.jpg')}}" alt="">
                        <div class="p-4">
                            <h4 class="mb-3">Cami İsmi</h4>
                            <p>Cami İçeriği</p>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div><div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="{{asset('../assets/img/store-product-1.jpg')}}" alt="">
                        <div class="p-4">
                            <h4 class="mb-3">Cami İsmi</h4>
                            <p>Cami İçeriği</p>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div><div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="{{asset('../assets/img/store-product-1.jpg')}}" alt="">
                        <div class="p-4">
                            <h4 class="mb-3">Cami İsmi</h4>
                            <p>Cami İçeriği</p>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div><div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="{{asset('../assets/img/store-product-1.jpg')}}" alt="">
                        <div class="p-4">
                            <h4 class="mb-3">Cami İsmi</h4>
                            <p>Cami İçeriği</p>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Daha Fazla İçerik Yükle</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Store End -->
@endsection
