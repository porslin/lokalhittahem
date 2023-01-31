<?php

$save_error    = "";
$save_success  = "";
$unsave_success = "";
$inquiry_error    = "";
$inquiry_success  = "";

// Spara objekt

if(isset($_POST['saveBtn'])){
   if(isset($_SESSION['userid']) != ''){

      $objectid =  trim($object['objectid']);

      $check_saved = $inquiryDbHandler->CheckSavedObject($objectid, $userid);

      if($check_saved ==1){
         $remove_saved = $inquiryDbHandler->RemoveSavedObject($objectid, $userid);
         $unsave_success = '<div class="alert alert-success" role="alert">
                              Objekt är nu ej sparad.
                            </div>';
      }
      else{
         $insert_saved = $inquiryDbHandler->CreateSavedObject($objectid, $userid);
         $save_success = '<div class="alert alert-success" role="alert">
                              Objekt sparades.
                          </div>';
      }
   }
   else{
      $save_error = '<div class="alert alert-danger" role="alert">
                  Du måste vara inloggad för att kunna spara objekt.
                </div>';
   }
}


// Skicka förfrågan 

if(isset($_POST['inquiryBtn'])){
   if(isset($_SESSION['userid']) != ''){

      $objectid =  trim($object['objectid']);
      $sender =  trim($_SESSION['userid']);
      $receiver =  trim($userid);
      $mail = trim($_POST['mail']);
      echo '<br>Mail:  '.$mail;


      $inquirys = $inquiryDbHandler->CreateInquiry($objectid, $sender, $receiver, $mail);

      $inquiry_success = '<div class="alert alert-success" role="alert">
                    Förfrågan skickades
                  </div>';
   }
   else{
      $inquiry_error = '<div class="alert alert-danger" role="alert">
                  Du måste vara inloggad för att kunna skicka meddelande. Logga in <a href="login.php">här</a>.
                </div>';
   }
}

?>