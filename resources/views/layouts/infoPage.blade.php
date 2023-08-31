@extends('main')

@section('content')



    <!-- About Start -->
<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <div class="carousel-inner">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php for ($i = 0; $i < count($camiler[0]['Photos']); $i++) {


            ?>
            <div class="carousel-item <?php if ($i === 0) echo 'active'; ?>">

            @if(!empty($camiler[0]['Photos'][$i]['Base64']))

                <img  class="w-100" src="data:image/jpg;base64,{{ $camiler[0]['Photos'][$i]['Base64'] }}" alt="Image">
            @endif
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 text-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">onceki</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">sonraki</span>
    </a>
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
    <!-- Carousel End -->

    <!-- Carousel End -->


            <div class="row g-12">

                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Camii Hakkinda</p>
                        <h1 class="display-6">{{$camiler[0]['Title']}}</h1>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <h5>Cami hakkinda</h5>
                            <p class="mb-0">{{$camiler[0]['Description']}}</p>
                        </div>

                    </div>

                    <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Konum</h5>
                            <p class="mb-0">{{$camiler[0]['Address']}}</p>                        </div>
                        <div class="col-sm-4">

                        </div>
                </div>

            </div>
        </div>
    </div>

@endsection
