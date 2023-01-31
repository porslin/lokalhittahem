<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../src/config.php');
include('./layout/header.php'); 


$object = $objectDbHandler->FetchObjectObjectPage();

// echo "<pre>";
// print_r($object);
// echo "</pre>";

if (isset($object['userid'])) {
        $userid    = trim($object['userid']);
       
        $receiver = $userDbHandler->FetchUserByObject($userid);
}

// echo "<pre>";
// print_r($receiver);
// echo "</pre>";

include('./layout/object-options.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
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

<body class="w3-content w3-border-left w3-border-right w3-light-grey">

<div class="w3-main w3-white">

  <!-- Responsiveness -->

  <div class="w3-hide-large" style="margin-top:80px"></div>

  <!-- Titel -->

  <div class="w3-container" id="apartment">
  
    <div class="w3-row w3-large">
      <div class="w3-col s6">
        <h2 class="w3-text-green"><?=htmlentities($object['address'])?></h2>
        <h6 class="w3-text-grey"><?=htmlentities($object['zone'])?>, <?=htmlentities($object['city'])?></h6>
      </div>
      <div class="w3-col s6">
        <form action="#" method="POST">
          <p><input class="w3-input w3-border" type="hidden" name="objectid" value="<?=htmlentities($object['objectid'])?>"></p>

          <!-- <div id="form-messages-success" class="w3-right w3-cell-top">
            <?php echo $save_success?>
            <?php echo $unsave_success?>
            <?php echo $save_error?>
          </div> -->

          <?php
            $objectid =  trim($object['objectid']);
            $check_saved = $inquiryDbHandler->CheckSavedObject($objectid, $userid);
            if($check_saved ==1){
         ?>
         <button type="submit" name="saveBtn" class="w3-button w3-green w3-right save"><i class="fa-solid fa-heart"></i><span> sparad</span></button>
         <?php
            }else{ 
         ?>
         <button type="submit" name="saveBtn" class="w3-button w3-light-grey w3-right save"><i class="fa-regular fa-heart"></i><span> spara</span></button>
         <?php
            }
         ?>

        </form>
      </div>
    </div>

  <!-- Objektbilder stora -->

    <div class="w3-display-container mySlides">
    <img src="<?=htmlentities($object['img'])?>" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Vardagsrum</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="<?=htmlentities($object['img1'])?>" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Kök</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="<?=htmlentities($object['img2'])?>" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Sovrum</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="<?=htmlentities($object['img3'])?>" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Badrum</p>
      </div>
    </div>
  </div>

  <!-- Objektbilder thumbnails -->

  <div class="w3-row-padding w3-section">
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?=htmlentities($object['img'])?>" style="width:100%;cursor:pointer" onclick="currentDiv(1)" title="Vardagsrum">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?=htmlentities($object['img1'])?>" style="width:100%;cursor:pointer" onclick="currentDiv(2)" title="Kök">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?=htmlentities($object['img2'])?>" style="width:100%;cursor:pointer" onclick="currentDiv(3)" title="Sovrum">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?=htmlentities($object['img3'])?>" style="width:100%;cursor:pointer" onclick="currentDiv(4)" title="Badrum">
    </div>
  </div>

  <!-- Detaljer -->

  <div class="w3-container">


    <h4><strong>Detaljer</strong></h4>
    <div class="w3-row w3-large">
      <div class="w3-col s6">
        <p>Typ: <?=htmlentities($object['type'])?></p>
        <p>Upplåtelseform: <?=htmlentities($object['tenure'])?></p>
        <p>Rum: <?=htmlentities($object['rooms'])?></p>
        <p>Energiklass: <?=htmlentities($object['rooms'])?></p>
      </div>
      <div class="w3-col s6">
        <p>Boyta: <?=htmlentities($object['size'])?> m<sup>2</sup></p>
        <p>Våning: <?=htmlentities($object['floor'])?> av <?=htmlentities($object['totalfloor'])?></p>
        <p>Byggår: <?=htmlentities($object['year'])?></p>
        <p>Förening: <?=htmlentities($object['cooperative'])?></p>
      </div>
    </div>
    <hr>
    
    <!-- <h4><strong>Mera detaljer?</strong></h4> -->
    <div class="w3-row w3-large">
      <div class="w3-col s6">
        <p>Utgångspris: <?=htmlentities($object['price'])?></p>
        <p>Driftkostnad: <?=htmlentities($object['monthly'])?> kr/mån</p>
      </div>
      <div class="w3-col s6">
        <p>Driftkostnad: <?=htmlentities($object['monthly'])?> kr/år</p>
        <p>Pris/m<sup>2</sup>: <?=htmlentities($object['monthly'])?> kr/m<sup>2</sup></p>
      </div>
    </div>
    <hr>
    
    <h4><strong>Beskrivning</strong></h4>
    <p><?=htmlentities($object['description'])?></p>
    
    <hr>
    
    <div class="w3-row w3-large">
      <div class="w3-col s6">
        <p>Planlösning</p>
        <div class="w3-display-container">
          <img src="<?=htmlentities($object['floorplan'])?>" style="width:100%;margin-bottom:-6px">
      </div>
      <div class="w3-col s6">
        <p>Karta</p>
        <div class="w3-display-container">
          <img src="<?=htmlentities($object['map'])?>" style="width:100%;margin-bottom:-6px">
      </div>
      </div>
    </div>

  </div>
  <hr>
  
  <!-- Förfrågan -->

  <div class="w3-container" id="contact">
    <h2>Förfrågan</h2>
    <i class="fa fa-envelope" style="width:30px"></i> 
    <?php
    if (isset($object['userid'])) {
        $userid    = trim($object['userid']);
       
        $receiver = $userDbHandler->FetchUserByObject($userid);
}       echo $receiver['username']
    
    ?><br>
    <p>Är du intresserad? Skicka ett meddelande till säljaren med en klick:</p>
    <form action="#" method="POST">
      <p><input class="w3-input w3-border" type="text" placeholder="Meddelande" name="mail" required></p>

      <div id="form-messages-success">
        <?php echo $inquiry_success?>
        <?php echo $inquiry_error?>
      </div>

    <input type="submit" class="w3-button w3-green w3-third btn" value="Skicka förfrågan" name="inquiryBtn"></button>
    </form>
  </div>

</div>

<?php include('layout/footer.php'); ?>

<script>

// object gallery slides
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script>

</body>
</html>