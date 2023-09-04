@extends('main')

@section('content')
    <!-- About Start -->


    <!-- Carousel End -->


    <div class="container-xxl py-5">
        <!-- Carousel Start -->
        <div class="container-fluid px-0 mb-5">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <div class="carousel-inner">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php for ($i = 0; $i < count($camiler[0]['Photos']); $i++) {
            ?>
                            <div class="carousel-item <?php if ($i === 0) {
                                echo 'active';
                            } ?>">

                                @if (!empty($camiler[0]['Photos'][$i]['Base64']))
                                    <img class="w-100"
                                        src="data:image/jpg;base64,{{ $camiler[0]['Photos'][$i]['Base64'] }}"
                                        alt="Image">
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
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">onceki</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">sonraki</span>
                        </a>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->

        <div class="container">

            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h1 class="display-6">{{ $camiler[0]['Title'] }}</h1>
            </div>

            <div class="row g-5">

                <div class="col-lg-6">

                    <div class="row g-3 mb-4">
                        <h5>Cami hakkinda</h5>
                        <p class="mb-0">{{ $camiler[0]['Description'] }}</p>
                    </div>

                </div>

                <div class="col-lg-6">
                    <h5>Konum</h5>

                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgoOYl7S6Q4ptJRlRm76lCMQImdNenAoU"></script>

                    <div id="harita" style="width: 300px; height: 300px;"></div>
                    <?php $koordinatlar = $camiler[0]['Coordinate'];

                    $koordinatlar_parcalari = explode(',', $koordinatlar);

                    $ilk_sayi = floatval($koordinatlar_parcalari[0]);
                    $ikinci_sayi = floatval($koordinatlar_parcalari[1]);

                    ?>
                    <script>
                        var ilkSayi = <?php echo $ilk_sayi; ?>;
                        var ikinciSayi = <?php echo $ikinci_sayi; ?>;


                        var map = new google.maps.Map(document.getElementById('harita'), {
                            center: {
                                lat: ilkSayi,
                                lng: ikinciSayi
                            },
                            zoom: 15
                        });


                        var marker = new google.maps.Marker({
                            position: {
                                lat: ilkSayi,
                                lng: ikinciSayi
                            },
                            map: map,
                            title: 'Camii Konumu'
                        });
                    </script>
                </div>
            </div>
        </div>
    @endsection
