<?php 
require('../src/config.php');
include('./layout/header.php'); 

	$pageTitle = "HittaHem";
  $pageId    = "hittahem";

$objects = $objectDbHandler->FetchAllObjects();

// echo "<pre>";
// print_r($objects);
// echo "</pre>";

?>

<!DOCTYPE html>
<html>
<head>
<title>Hitta Hem</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .mySlides {display: none}
</style>
</head>
<body class="w3-light-grey">

<!-- Hero -->

<header class="w3-display-container w3-content" style="max-width:1500px;">
  <img class="w3-image" src="img/hh-hero-bild.jpg" style="min-width:100px" width="100%">
  <div class="w3-display-left w3-padding w3-col l6 m8">
    <div class="w3-container w3-text-white">
      <h2>Hitta stället du vill komma hem till hos oss</h2>
    </div>
    <div class="w3-container w3-padding-16">
      <form action="objects.php">        
        <button class="w3-button w3-black" type="submit"><i class="fa fa-igloo w3-margin-right"></i> Se alla objekt</button>
      </form>
    </div>
  </div>
</header>

<div class="w3-content" style="max: width 1532px;">

<!-- Sökfunktion eller bar -->

    <div class="w3-container w3-margin-top" id="search-obj">
      <h3>Sök objekt</h3>
      <p>Vi samlar bostäder av alla former för att hjälpa dig hitta ditt nästa hem.</p>
    </div>
    
    <form action="search.php" method="POST" class="w3-row-padding"  enctype="multipart/form-data">
      <div class="w3-col m3">
        <label><i class="fa fa-house-chimney"></i> Bostadstyp</label>
        <select name="type" class="w3-input w3-border input">
            <option value="Lägenhet">Lägenhet</option>
            <option value="Villa">Villa</option>
            <option value="Fritidsboende">Fritidsboende</option>
        </select>
      </div>
      <div class="w3-col m3">
        <label><i class="fa-solid fa-city"></i> Ort</label>
        <select name="city" required class="w3-input w3-border input">
            <option value="Östersund">Östersund</option>
            <option value="Åre">Åre</option>
        </select>
      </div>
      <div class="w3-col m2">
        <label><i class="fa-solid fa-tree-city"></i> Upplåtelseform</label>
        <select name="tenure" required class="w3-input w3-border input">
            <option value="Hyresrätt">Hyresrätt</option>
            <option value="Bostadsrätt">Bostadsrätt</option>
            <option value="Äganderätt">Äganderätt</option>
        </select>
      </div>
      <div class="w3-col m2">
        <label><i class="fa-solid fa-person-shelter"></i> Antal rum</label>
        <input type="number" name="rooms" min="1" max="50" maxlength="10" placeholder="0" class="w3-input w3-border input">
      </div>
      <div class="w3-col m2">
        <label><i class="fa fa-search"></i> Sök</label>
          <input class="w3-button w3-block w3-black button" type="submit" name="searchObj" value="Sök">
        </form>
      </div>
</form>

  <!-- Några objekt -->

  <div class="w3-container w3-margin-top">
      <h3>Nya objekt</h3>
  </div>

  <div class="w3-row-padding w3-padding-16">
    
    <div class="w3-third w3-margin-bottom">
      <img src="img/featureone.jpeg" alt="featureOne" style="width:100%; height:70%;">
      <div class="w3-container w3-white">
        <h3>Mällbyvägen 24</h3>
        <h6 class="w3-opacity">6 795 000 kr</h6>
        <p>Äganderätt</p>
        <p>192m<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
        <button class="w3-button w3-block w3-black w3-margin-bottom">Läs Mer</button>
      </div>
    </div>


    <div class="w3-third w3-margin-bottom">
      <img src="img/featuretwo.jpeg" alt="featureTwo" style="width:100%; height:70%;">
      <div class="w3-container w3-white">
        <h3>Bangårdsgatan 50</h3>
        <h6 class="w3-opacity">2 200 000 kr</h6>
        <p>Bostadsrätt</p>
        <p>61m<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
        <button class="w3-button w3-block w3-black w3-margin-bottom">Läs Mer</button>
      </div>
    </div>


    <div class="w3-third w3-margin-bottom">
      <img src="img/featurethree.png" alt="featureThree" style="width:100%; height:70%;">
      <div class="w3-container w3-white">
        <h3>Färgargränd 22</h3>
        <h6 class="w3-opacity">6 599 kr/mån</h6>
        <p>Hyresrätt</p>
        <p>89m<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-glass"></i> <i class="fa fa-cutlery"></i></p>
        <button class="w3-button w3-block w3-black w3-margin-bottom">Läs Mer</button>
      </div>
    </div>

    <a href="objects.php"><button type="button" class="w3-button w3-green w3-margin-top" style="margin:16px">Se alla objekt</button></a>

</div>

  <!-- Om oss -->

  <div class="w3-row-padding" id="hurfunkardet">
    <div class="w3-col l4 12">
      <h3>Hitta ditt drömhem</h3>
      <h6>Är du på jakt efter ny bostad? Eller har du en bostad du vill hyra/sälja? Vi samlar marknadens alla bostäder som motsvarar just dina önskemål. Anmäl ditt intresse redan idag så hjälper vi dig att hitta ditt drömhem. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.  </h6>
    </div>
    <div class="w3-col l8 12">
      <img src="img/omhittahem.jpeg" class="w3-image w3-greyscale" style="width:100%;">
    </div>
  </div>

  <!-- Kontaktuppgifter -->
  
  <div class="w3-row-padding w3-large w3-center" style="margin:32px 0">
    <div class="w3-third"><i class="fa fa-map-marker "></i> Storgatan 52, Östersund</div>
    <div class="w3-third"><i class="fa fa-phone "></i> Support: +46 63 363636</div>
    <div class="w3-third"><i class="fa fa-envelope "></i> Epost: mail@hittahem.com</div>
  </div>

  <!-- Viktig info -->

  <div class="w3-panel w3-dark-grey w3-leftbar w3-padding-32">
    <h6><i class="fa fa-info w3-text-white w3-padding w3-margin-right"></i> Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</h6>
  </div>

  <!-- Kategorier -->

  <div class="w3-container">
    <h3>Vårt utbud</h3>
    <h6>Bläddra mellan objekt av alla typ enligt kategori:</h6>
  </div>
  
  <div class="w3-row-padding w3-padding-16 w3-text-white w3-large">
    <div class="w3-half w3-margin-bottom">
      <div class="w3-display-container">
        <img src="img/hyresrätt.jpeg" alt="Hyresrätt" style="width:100%">
        <span class="w3-display-bottomleft w3-padding">Hyresrätt</span>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="img/bostadsrätt.jpeg" alt="Bostadsrätt" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Bostadsrätt</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="img/äganderätt.jpeg" alt="Äganderätt" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Äganderätt</span>
          </div>
        </div>
      </div>
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="img/stuga.png" alt="Stuga" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Stuga</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="img/studentlya.png" alt="Studentlya" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Studentlya</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Nyhetsbrev -->

  <div class="w3-container w3-padding-32 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin:32px 0;">
    <h2>Full koll på bostadsmarknaden</h2>
    <p>Häng med på vårt nyhetsbrev.</p>
    <label>E-post</label>
    <input class="w3-input w3-border" type="text" placeholder="Din e-postadress här">
    <button type="button" class="w3-button w3-green w3-margin-top">Prenumerera</button>
  </div>

</div>

<?php include('layout/footer.php'); ?>

<script>
    if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script>
</body>
</html>
