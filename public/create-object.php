<?php  
require('../src/config.php');
include('./layout/header.php'); 

    $pageTitle = "Skapa objekt";
    $pageId    = "skapa_objekt";

if(isset($_SESSION['userid'])){
   $userid = $_SESSION['userid'];
}else{
   $userid = '';
   header('location:login.php?mustLogin');
   exit;
}

if(isset($_POST['createObj'])){

   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $zone = $_POST['zone'];
   $zone = filter_var($zone, FILTER_SANITIZE_STRING);
   $city = $_POST['city'];
   $city = filter_var($city, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $tenure = $_POST['tenure'];
   $tenure = filter_var($tenure, FILTER_SANITIZE_STRING);
   $rooms = $_POST['rooms'];
   $rooms = filter_var($rooms, FILTER_SANITIZE_STRING);
   $size = $_POST['size'];
   $size = filter_var($size, FILTER_SANITIZE_STRING);
   $floor = $_POST['floor'];
   $floor = filter_var($floor, FILTER_SANITIZE_STRING);
   $totalfloor = $_POST['totalfloor'];
   $totalfloor = filter_var($totalfloor, FILTER_SANITIZE_STRING);
   $year = $_POST['year'];
   $year = filter_var($year, FILTER_SANITIZE_STRING);
   $cooperative = $_POST['cooperative'];
   $cooperative = filter_var($cooperative, FILTER_SANITIZE_STRING);
   $monthly = $_POST['monthly'];
   $monthly = filter_var($monthly, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $img = $_POST['img'];
   $img = filter_var($img, FILTER_SANITIZE_STRING);
   $img1 = $_POST['img1'];
   $img1 = filter_var($img1, FILTER_SANITIZE_STRING);
   $img2 = $_POST['img2'];
   $img2 = filter_var($img2, FILTER_SANITIZE_STRING);
   $img3 = $_POST['img3'];
   $img3 = filter_var($img3, FILTER_SANITIZE_STRING);
   $img4 = $_POST['img4'];
   $img4 = filter_var($img4, FILTER_SANITIZE_STRING);
   $floorplan = $_POST['floorplan'];
   $floorplan = filter_var($floorplan, FILTER_SANITIZE_STRING);
   $map = $_POST['map'];
   $map = filter_var($map, FILTER_SANITIZE_STRING);

   $objectDbHandler->CreateObject($address, $zone, $city, $description, $type, $tenure, $rooms, $size, $floor, $totalfloor, $year, $cooperative, $monthly, $price, $img, $img1, $img2, $img3, $img4, $floorplan, $map, $userid);

   $success = '<div class="alert alert-success" role="alert">
                        Produkten har lagts till.
                        </div>';
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Skapa Objekt</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<section class="object-form">

   <form action="objects.php" method="POST" enctype="multipart/form-data">
      <h3>Lägg upp ett nytt objekt</h3>
      <div class="box">
         <p>Adress: <span>*</span></p>
         <input type="text" name="address" required maxlength="100" class="input">
      </div>
      <div class="flex">
         <div class="box">
            <p>Område: <span>*</span></p>
            <input type="text" name="zone" required maxlength="100" class="input">
         </div>
         <div class="box">
            <p>Ort: <span>*</span></p>
            <input type="text" name="city" required maxlength="100" class="input">
         </div>
         <div class="box">
            <p>Beskrivning: <span>*</span></p>
            <input type="text" name="description" required class="input">
         </div>
         <div class="box">
            <p>Typ: <span>*</span></p>
            <select name="type" required class="input">
               <option value="Lägenhet">Lägenhet</option>
               <option value="Villa">Villa</option>
               <option value="Fritidsboende">Fritidsboende</option>
            </select>
         </div>
         <div class="box">
            <p>Upplåtelseform: <span>*</span></p>
            <select name="tenure" required class="input">
               <option value="Hyresrätt">Hyresrätt</option>
               <option value="Bostadsrätt">Bostadsrätt</option>
               <option value="Äganderätt">Äganderätt</option>
            </select>
         </div>
         <div class="box">
            <p>Antal rum: <span>*</span></p>
            <input type="number" name="rooms" required min="0" max="50" maxlength="10" class="input">
         </div>
         <div class="box">
            <p>Boyta: <span>*</span></p>
            <input type="number" name="size" required min="0" maxlength="10" class="input">
         </div>
         <div class="box">
            <p>Våning: <span>*</span></p>
            <input type="number" name="floor" required min="0" max="50" maxlength="10" class="input">
         </div>
         <div class="box">
            <p>Antal våningar: <span>*</span></p>
            <input type="number" name="totalfloor" required min="0" max="50" maxlength="10" class="input">
         </div>
         <div class="box">
            <p>Byggår: <span>*</span></p>
            <input type="number" name="year" required min="1700" minlength="4" maxlength="4" class="input">
         </div>
         <div class="box">
            <p>Förening: </p>
            <input type="text" name="cooperative" maxlength="100" class="input">
         </div>
         <div class="box">
            <p>Månadsavgift: </p>
            <input type="number" name="monthly" min="0" max="9999999999" maxlength="10" class="input">
         </div>
         <div class="box">
            <p>Pris: </p>
            <input type="number" name="price" min="0" max="9999999999" maxlength="10" class="input">
         </div>
        </div>
      <div class="flex"> 
         <div class="box">
            <p>URL till Visningsbild: <span>*</span></p>
            <input type="text" name="img" required class="input">
         </div>
         <div class="box">
            <p>URL till Bild1: <span>*</span></p>
            <input type="text" name="img1" required class="input">
         </div>
         <div class="box">
            <p>URL till Bild2: <span>*</span></p>
            <input type="text" name="img2" required class="input">
         </div>
         <div class="box">
            <p>URL till Bild3: <span>*</span></p>
            <input type="text" name="img3" required class="input">
         </div>
         <div class="box">
            <p>URL till Bild4: <span>*</span></p>
            <input type="text" name="img4" required class="input">
         </div>
         <div class="box">
            <p>URL till planlösning: <span>*</span></p>
            <input type="text" name="floorplan" class="input">
         </div>
         <div class="box">
            <p>URL till kartan: <span>*</span></p>
            <input type="text" name="map" class="input">
         </div>   
      </div>
      <input type="submit" value="Lägg upp objekt" class="btn" name="createObj">
   </form>

</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include('layout/footer.php'); ?>

<!-- custom js  -->

<script>
    document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
   inputNumber.oninput = () =>{
      if(inputNumber.value.length > inputNumber.maxLength) inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
   };
});

document.querySelectorAll('.faq .box-container .box h3').forEach(headings =>{
   headings.onclick = () =>{
      headings.parentElement.classList.toggle('active');
   }
});
</script>

<?php include 'layout/message.php'; ?>

</body>
</html>