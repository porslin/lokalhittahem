<?php

require('../src/config.php'); 

if(isset($_SESSION['userid'])){
   $userid = $_SESSION['userid'];
}else{
   $userid = '';
   header('location:login.php?mustLogin');
   exit;
}

    $address     = "";
    $zone        = "";
    $city        = "";
    $description = "";
    $type        = "";
    $tenure      = "";
    $rooms       = "";
    $size        = "";
    $floor       = "";
    $totalfloor  = "";
    $year        = "";
    $cooperative = "";
    $monthly     = "";
    $price       = "";
    $img         = "";
    $img1        = "";
    $img2        = "";
    $img3        = "";
    $img4        = "";
    $floorplan   = "";
    $map         = "";
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
    

    if (isset($_POST['createBtn'])) {
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
        
        $objectDbHandler->CreateObject($address, $zone, $city, $description, $type, $tenure, $rooms, $size, $floor, $totalfloor, $year, $cooperative, $monthly, $price, $img, $img1, $img2, $img3, $img4, $floorplan, $map);

            $success = '<div class="alert alert-success" role="alert">
                        Objektet har lagts till.
                        </div>';

    }
    
}

$objects = $objectDbHandler->FetchAllObjects();

$data = [
    'error1'       => $error1,
    'error2'      => $error2,
    'error3'      => $error3,
    'error4'      => $error4,
    'error5'      => $error5,
    'error6'      => $error6,
    'error7'      => $error7,
    'error8'      => $error8,
    'error9'      => $error9,
    'error'       => $error,
    'success'     => $success,
    'objects'    => $objects
];

echo json_encode($data);