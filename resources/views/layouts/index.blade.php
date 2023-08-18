@extends('main')

@section('content')
     <!-- Carousel Start -->




     <div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php $i=0;?>
        @if($camiler!=null)    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($camiler as $index => $cami)

                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img  src="data:image/jpg;base64,{{ $cami['foto1'] }}" alt="Decoded Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i=$index+1;?>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>@else

@endif
        </div>
    </div>
     </div>




    <!-- Carousel End -->

    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Camiler</p>
            </div>



<div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

    <form  action="/filitre" method="get">
        @csrf

        <select  id="il" name="il" >
          <option value="">İl seçin</option>
          <?php
          use Illuminate\Support\Facades\DB;

          $il = DB::table('il')->select('*')->get();
          $ilArrayIsim = $il->pluck('isim')->toArray();
          $ilArrayId = $il->pluck('il_no')->toArray();
          ?>

          <?php foreach ($ilArrayIsim as $ilName): ?>
            <option value="<?php echo $ilName; ?>"><?php echo $ilName; ?></option>
          <?php endforeach; ?>
        </select>


        <select id="ilce" name="ilce" >
          <option value="">İlçe seçin</option>
        </select>


        <input type="text" id="ad" name="ad" placeholder="cami adi giriniz" ><br>

        <button type="submit">Gönder</button>
      </form>

    <p style="margin-left: -10px;" class="fs-5 fw-medium fst-italic text-primary">
        @if($i==0)
               <?php echo  "Hic sonuc bulunamadi "; ?>
        @else

            <?php echo $i . " &nbsp;" . "cami siralandi"; ?>

        @endif

        </p>
</div>








            <div class="row g-4">
    <?php for ($i = 0; $i < count($camiler); $i++) { ?>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="store-item position-relative text-center">
                <img style="height:600px;width: 400px;" src="data:image/jpg;base64,{{ $camiler[$i]['foto1'] }}" alt="Decoded Image">
                <div class="p-4">
                    <h4 class="mb-3"><?= $camiler[$i]['Name'] ?></h4>
                    <p><?= $camiler[$i]['Address'] ?></p>
                </div>
                <div class="store-overlay">
                    <a href="/ltf/<?= $camiler[$i]['Id']  ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    <?php } ?>


    <script>

const ilSelect = document.getElementById("il");
const ilceSelect = document.getElementById("ilce");



const ilceOptions = {
  <?php
  foreach ($ilArrayIsim as $index => $ilName) {

    $ilce = DB::table('İlceler')->where('cityid', $ilArrayId[$index])->select('name')->get();
    $ilceArray = $ilce->pluck('name')->toArray();

    echo "'$ilName': [";
    foreach ($ilceArray as $ilceName) {
      echo "'$ilceName', ";
    }
    echo "], ";
  }
  ?>}



function updateIlceOptions() {
  const selectedIl = ilSelect.value;
  const ilceOptionsForSelectedIl = ilceOptions[selectedIl];

  ilceSelect.innerHTML = "ilce secin";


  ilceOptionsForSelectedIl.forEach(function (ilceName) {
    const option = document.createElement("option");
    option.value = ilceName;
    option.textContent = ilceName;
    ilceSelect.appendChild(option);
  });
}

ilSelect.addEventListener("change", updateIlceOptions);

</script>



    <!-- Store End -->
@endsection
