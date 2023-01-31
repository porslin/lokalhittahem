<?php
require('../src/config.php');
include('./layout/header.php'); 


if(isset($_POST['searchObj'])){

   $city    = $_POST['city'];
   $city    = filter_var($city, FILTER_SANITIZE_STRING);
   $type    = $_POST['type'];
   $type    = filter_var($type, FILTER_SANITIZE_STRING);
   $tenure  = $_POST['tenure'];
   $tenure  = filter_var($tenure, FILTER_SANITIZE_STRING);
   $rooms   = $_POST['rooms'];
   $rooms   = filter_var($rooms, FILTER_SANITIZE_STRING);
   
   $objectDbHandler->FetchFilteredObject($type, $city, $tenure, $rooms);
}
    $objects = $objectDbHandler->FetchFilteredObject($type, $city, $tenure, $rooms);

// echo "<pre>";
// print_r($objects);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<title>Sökta objekt</title>
	<style>
  		body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  		.mySlides {display: none}
	</style>
</head>

<body class="w3-light-grey">
	<div class="w3-content" style="max: width 1532px;">
		<div class="w3-container w3-margin-top">
			<h3>Sökta objekt</h3>
            <h6>Denna är en filtrerad lista av alla objekt som finns. <a href="objects.php">Se alla objekt</a></h6>
		</div>

			<div class="w3-row-padding w3-padding-16">
				
				<?php foreach($objects as $object) { ?>
				
				<div class="w3-third w3-margin-bottom">
					<img src="<?=htmlentities($object['img']) ?>" style="width:100%">
					<div class="w3-container w3-white">
						<h3><?=htmlentities($object['address']) ?></h3>
						
						<?php if(is_null($object['price'])): ?>
							<h6 class="w3-opacity"><?=htmlentities($object['monthly'])?> kr/mån</h6>
						<?php else: ?>
							<h6 class="w3-opacity"><?=htmlentities($object['price'])?> kr</h6>
						<?php endif; ?>

						<p><?=htmlentities($object['tenure'])?></p>
						
						<p><?=htmlentities($object['size'])?>m<sup>2</sup></p>
						
						<p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>

						<form action="object.php?objectid=<?=htmlentities($object['objectid']) ?>" method="POST">
							<button class="w3-button w3-block w3-black w3-margin-bottom">Läs Mer</button>
						</form>
					</div>
				</div>

				<?php } ?>

			</div>
		</div>
	</div>
	
	<?php include('./layout/footer.php'); ?>
</body>


<script>
if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script> 
</html>

