<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require('../src/config.php');
include('./layout/header.php');

// Uppdatera objekt

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>"; 

$error1   = "";
$error2   = "";
$error3   = "";
$error4   = "";
$error5   = "";
$error6   = "";
$error7   = "";
$error8   = "";
$error9   = "";
$error    = "";
$success  = "";

if (isset($_POST['updateBtn'])) {
    $address        = trim($_POST['address']);
    $zone           = trim($_POST['zone']);  
    $city           = trim($_POST['city']);
    $description    = trim($_POST['description']);
    $type           = trim($_POST['type']);
    $tenure         = trim($_POST['tenure']);
    $rooms          = trim($_POST['rooms']);
    $size           = trim($_POST['size']);
    $floor          = trim($_POST['floor']);
    $totalfloor     = trim($_POST['totalfloor']);
    $year           = trim($_POST['year']);
    $cooperative    = trim($_POST['cooperative']);
    $monthly        = trim($_POST['monthly']);
    $price          = trim($_POST['price']);
    $img            = trim($_POST['img']);
    $img1           = trim($_POST['img1']);
    $img2           = trim($_POST['img2']);
    $img3           = trim($_POST['img3']);
    $img4           = trim($_POST['img4']);
    $floorplan      = trim($_POST['floorplan']);
    $map            = trim($_POST['map']);
        
    // Validering om formulär fylls i
    
    if(empty($_POST['address'])){
        $error1 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i en adress. 
                    </div>';
    }
    
    if(empty($_POST['zone'])){
        $error2 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i området. 
                    </div>';
    }

    if(empty($_POST['city'])){
        $error3 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i orten. 
                    </div>';
    }

    if(empty($_POST['description'])){
        $error4 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i beskrivningen. 
                    </div>';
    }

    if(empty($_POST['type'])){
        $error5 = '<div class="alert alert-danger" role="alert">
                    Du måste välja en typ.
                    </div>';
    }

    if(empty($_POST['tenure'])){
        $error6 = '<div class="alert alert-danger" role="alert">
                    Du måste välja en upplåtelseform.
                    </div>';
    }

    if(empty($_POST['rooms'])){
        $error7 = '<div class="alert alert-danger" role="alert">
                    Du måste välja antal rum.
                    </div>';
    }

    if(empty($_POST['size'])){
        $error8 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i storleken på objektet.
                    </div>';
    }

    if(empty($_POST['year'])){
        $error9 = '<div class="alert alert-danger" role="alert">
                    Du måste fylla i byggnadsår.
                    </div>';
    }

    else if(empty($error)){
    
        $objectDbHandler->UpdateObject($address, $zone, $city, $description, $type, $tenure, $rooms, $size, $floor, $totalfloor, $year, $cooperative, $monthly, $price, $img, $img1, $img2, $img3, $img4, $floorplan, $map);

        $success = '<div class="alert alert-success" role="alert">
                        Objektet har uppdaterats.
                        </div>';
    }
}

    $object = $objectDbHandler->FetchObject();

?>

<!DOCTYPE html>
<html>
<head>
<title>Mina objekt</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .mySlides {display: none}
</style>
</head>


<body>
   <div class="blog-container">
    <h1>Uppdatera Objekt</h1>
        </div>
    
        <div id="container-form">

        <form id="create-blog-form" method="POST" action="#" enctype="multipart/form-data">

        <div>
            <img src="<?=$object['img']?>"height="200" width="350">
        </div>
            
            <br>
            
            <label for="">Adress:</label>
            <input type="text" name="address" id="address-textarea" value= "<?=htmlentities($object['address']) ?>" maxlength="50">
            <div id="form-messages-address">
            <?php echo $error1?>
            </div>

            <label for="">Område:</label>
            <input type="text" name="zone" id="zone-textarea" value= "<?=htmlentities($object['zone']) ?>" maxlength="50">
            <div id="form-messages-zone">
            <?php echo $error2?>
            </div>
           
            <label for="">Ort:</label>
            <input type="text" name="city" id="city-textarea" value= "<?=htmlentities($object['city']) ?>" maxlength="50">
            <div id="form-messages-city">
            <?php echo $error3?>
            </div>
            
            <label for="">Beskrivning:</label>
            <textarea name="description" id="description-textarea" ><?=htmlentities($object['description']) ?></textarea>
            <div id="form-messages-description">
            <?php echo $error4?>
            </div>

            <label for="">Typ:</label>
            <input type="text" name="type" id="type-textarea" value= "<?=htmlentities($object['type']) ?>" maxlength="50">
            <div id="form-messages-type">
            <?php echo $error5?>
            </div>

            <label for="">Upplåtelseform:</label>
            <input type="text" name="tenure" id="tenure-textarea" value= "<?=htmlentities($object['tenure']) ?>" maxlength="50">
            <div id="form-messages-tenure">
            <?php echo $error6?>
            </div>

            <label for="">Antal rum:</label>
            <input type="text" name="rooms" id="rooms-textarea" value= "<?=htmlentities($object['rooms']) ?>" maxlength="50">
            <div id="form-messages-room">
            <?php echo $error7?>
            </div>

            <label for="">Boyta:</label>
            <input type="text" name="size" id="size-textarea" value= "<?=htmlentities($object['size']) ?>" maxlength="50">
            <div id="form-messages-size">
            <?php echo $error8?>
            </div>

            <label for="">Våning:</label>
            <input type="text" name="floor" id="floor-textarea" value= "<?=htmlentities($object['floor']) ?>" maxlength="50">
            <div id="form-messages-floor">
            
            </div>

            <label for="">Antal våningar:</label>
            <input type="text" name="totalfloor" id="totalfloor-textarea" value= "<?=htmlentities($object['totalfloor']) ?>" maxlength="50">
            <div id="form-messages-totalfloor">
            
            </div>

            <label for="">Byggår:</label>
            <input type="text" name="year" id="year-textarea" value= "<?=htmlentities($object['year']) ?>" maxlength="50">
            <div id="form-messages-year">
            <?php echo $error9?>
            </div>

            <label for="">Förening:</label>
            <input type="text" name="cooperative" id="cooperative-textarea" value= "<?=htmlentities($object['cooperative']) ?>" maxlength="50">
            <div id="form-messages-cooperative">
            
            </div>

            <label for="">Månadskostnad (kr/mån):</label>
            <input type="text" name="monthly" id="monthly-textarea" value= "<?=htmlentities($object['monthly']) ?>" maxlength="50">
            <div id="form-messages-monthly">
            
            </div>

            <label for="">Pris (kr):</label>
            <input type="text" name="price" id="price-textarea" value= "<?=htmlentities($object['price']) ?>" maxlength="50">
            <div id="form-messages-price">
            
            </div>
            
            <label>URL till Visningsbild:</label> 
		    <input type="text" name="img" id="img-textarea" value= "<?=htmlentities($object['img'])?>">
            <div id="form-messages-img">
          
            </div>

            <label>URL till Bild1:</label> 
		    <input type="text" name="img1" id="img1-textarea" value= "<?=htmlentities($object['img'])?>">
            <div id="form-messages-img1">
          
            </div>

            <label>URL till Bild2:</label> 
		    <input type="text" name="img2" id="img2-textarea" value= "<?=htmlentities($object['img1'])?>">
            <div id="form-messages-img2">
          
            </div>

            <label>URL till Bild3:</label> 
		    <input type="text" name="img3" id="img3-textarea" value= "<?=htmlentities($object['img2'])?>">
            <div id="form-messages-img3">
          
            </div>

            <label>URL till Bild4:</label> 
		    <input type="text" name="img4" id="img4-textarea" value= "<?=htmlentities($object['img3'])?>">
            <div id="form-messages-img4">
          
            </div>

            <label>URL till planlösning:</label> 
		    <input type="text" name="floorplan" id="floorplan-textarea" value= "<?=htmlentities($object['floorplan'])?>">
            <div id="form-messages-floorplan">
          
            </div>

            <label for="">URL till Kartan:</label>
            <input type="text" name="map" id="map-textarea" value= "<?=htmlentities($object['map']) ?>" >
            <div id="form-messages-map">
            
            </div>

            <br>

            <div id="form-messages-success">
            <?php echo $success?>
            </div>
          

            <input class= "button" name= "updateBtn" type="submit" value="Update">
            <a href="myobjects.php">&#x2190; back</a>
        </fieldset>
        
        </form>
    </div>
     <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <!-- Custom JS -->
    <!-- <script src="js/update.js"></script> -->
</body>
</html>