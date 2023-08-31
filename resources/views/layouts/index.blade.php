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

@if(!empty($cami['Photos'][0]['Base64']))
                    <img  src="data:image/jpg;base64,{{ $cami['Photos'][0]['Base64'] }}" alt="Decoded Image">@endif
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
    @foreach ($camiler as $cami)
        <div id="frkn" class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="store-item position-relative text-center">

                @if (!empty($cami['Photos'][0]['Base64']))
                    <img style="width: 350px; height: 400px;" src="data:image/jpg;base64,{{ $cami['Photos'][0]['Base64'] }}" alt="Decoded Image">
                @endif

                <div class="p-4">
                    <h4 class="mb-3">{{ $cami['Name'] }}</h4>
                    <p>{{ $cami['Address'] }}</p>
                </div>
                <div class="store-overlay">
                    <a href="/ltf/{{ $cami['Id'] }}" class="btn btn-primary rounded-pill py-2 px-4 m-2">Daha fazla Detay <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>


    <script>

const ilSelect = document.getElementById("il");
const ilceSelect = document.getElementById("ilce");



const ilceOptions = {
  <?php
  foreach ($ilArrayIsim as $index => $ilName) {

    $ilce = DB::table('İlceler')->where('cityid', $ilArrayId[$index])->select('name')->get();
    $ilceArray = $ilce->pluck('name')->toArray();

    echo "'$ilName': [";
    echo"' ilce secin',";
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
document.addEventListener('DOMContentLoaded', function() {
  var adInput = document.getElementById('ad');
  var submitButton = document.querySelector('button[type="submit"]');
  var errorMessage = document.getElementById('error-message'); // Add an element for the error message

  adInput.addEventListener('input', function() {
    var inputValue = adInput.value;
    var regex = /^[A-Za-z\s]+$/;

    if (!regex.test(inputValue)) {
      adInput.style.borderColor = 'red';
      submitButton.disabled = true;
      errorMessage.textContent = 'Yalnızca harf ve boşluk karakterleri kullanabilirsiniz.'; // Set the error message
    } else {
      adInput.style.borderColor = '';
      submitButton.disabled = false;
      errorMessage.textContent = ''; // Clear the error message
    }
  });
});

</script>



    <!-- Store End -->
@endsection
