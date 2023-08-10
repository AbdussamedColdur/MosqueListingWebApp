@extends('main')

@section('content')
     <!-- Carousel Start -->



    <!-- Carousel End -->

    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Camiler</p>

    <form  action="/filitre" method="get">
  @csrf
  <label for="il">İl:</label>
  <select id="il" name="il" >
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
  </select><br>

  <label style="align:left ;" for="ilce">İlçe:</label>
  <select id="ilce" name="ilce" >
    <option value="">İlçe seçin</option>
  </select><br>

  <label for="ad">Ad:</label><br>
  <input type="text" id="ad" name="ad" ><br>

  <button type="submit">Gönder</button>
</form>






            </div>

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
