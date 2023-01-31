
<!-- OBJECT PAGE -->


<body>

    <fieldset id="container" class="main-box-product">


        <div class="center">  
        <div class="content-left">

            <img src="<?=htmlentities($object['img']) ?>" class="object-image">
        
        <div class="content-right">

            <b><legend><?=htmlentities($object['address']) ?></legend></b>
            <b><h5><?=htmlentities($object['rooms']) ?> kr</h5></b><br>
            <p><span><?=htmlentities($object['zone']) ?></span></p>
            <p><?=htmlentities($object['description']) ?></p>

            <form action="add-cart-item.php" method="POST">
                <input type="hidden" name="productId" value="<?=htmlentities($object['id']) ?>">
                <input type="number" id="quantity" name="quantity" min="00" max="<?=htmlentities($object['stock']) ?>" value="1">
                <input type="submit" name="addToCart" class="button" value="Add to Cart">
            </form>

        </div>
        </div>
</div>

    </fieldset>
    
    <div id="backBtn">
        <a href="products.php" class="button">Back to Products</a>
    </div>


    <?php include('./layout/footer.php'); ?>

	<script>
        if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
    </script> 
</body>
</html>


<!-- LINK TO INTERNAL CSS -->

<link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">


<!-- OBJECTS GRID -->

	<main class="object-grid">
		<ul class="Items">
  			<?php foreach($objects as $object) { ?>
  				<li class="Item">
    				<a href="object.php?objectid=<?=htmlentities($object['objectid']) ?>" class="Item__link">
						<div class="ImageContainer">
							<img src="<?=htmlentities($object['img']) ?>" class="objekt-img">
						</div>
	  					<div class="address">
      						<h3><?=htmlentities($object['address']) ?></h3>
	  						<h6><?=htmlentities($object['tenure'])?></h6>
	  					</div>
						<div class="mini-deets">
							<p><?=htmlentities($object['type'])?></p>
							<p><?=htmlentities($object['rooms'])?> rum</p>
							<p><?=htmlentities($object['size'])?> m<sup>2</sup></p>
						</div>
						<div class="price-zone">
							<?php if(is_null($object['price'])): ?>
    							<h5><?=htmlentities($object['monthly'])?> kr/mån</h5>
							<?php else: ?>
								<h5><?=htmlentities($object['price'])?> kr</h5>
							<?php endif; ?>
							
							<h6><?=htmlentities($object['zone'])?></h6>
						</div>
					</a>
  				</li>
  			<?php } ?>
		</ul>
	</main>


<!-- MINA OBJEKT???  -->


<!DOCTYPE html>


<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mina Objekt</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<section class="my-listings">

   <h1 class="heading">my listings</h1>

   <div class="box-container">

   <?php
      $total_images = 0;
      $select_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ? ORDER BY date DESC");
      $select_properties->execute([$user_id]);
      if($select_properties->rowCount() > 0){
         while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

         $property_id = $fetch_property['id'];

         if(!empty($fetch_property['image_02'])){
            $image_coutn_02 = 1;
         }else{
            $image_coutn_02 = 0;
         }
         if(!empty($fetch_property['image_03'])){
            $image_coutn_03 = 1;
         }else{
            $image_coutn_03 = 0;
         }
         if(!empty($fetch_property['image_04'])){
            $image_coutn_04 = 1;
         }else{
            $image_coutn_04 = 0;
         }
         if(!empty($fetch_property['image_05'])){
            $image_coutn_05 = 1;
         }else{
            $image_coutn_05 = 0;
         }

         $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

   ?>
   <form accept="" method="POST" class="box">
      <input type="hidden" name="property_id" value="<?= $property_id; ?>">
      <div class="thumb">
         <p><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
         <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
      </div>
      <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
      <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
      <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
      <div class="flex-btn">
         <a href="update_property.php?get_id=<?= $property_id; ?>" class="btn">update</a>
         <input type="submit" name="delete" value="delete" class="btn" onclick="return confirm('delete this listing?');">
      </div>
      <a href="view_property.php?get_id=<?= $property_id; ?>" class="btn">view property</a>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>

   </div>

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'layout/footer.php'; ?>

<!-- custom js  -->
<script src="js/script.js"></script>

<?php include 'layout/message.php'; ?>

</body>
</html>


<!-- DELETE OBJEKT?? -->

if(isset($_POST['delete'])){

   $delete_id = $_POST['property_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $select_images = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
      $select_images->execute([$delete_id]);
      while($fetch_images = $select_images->fetch(PDO::FETCH_ASSOC)){
         $image_01 = $fetch_images['image_01'];
         $image_02 = $fetch_images['image_02'];
         $image_03 = $fetch_images['image_03'];
         $image_04 = $fetch_images['image_04'];
         $image_05 = $fetch_images['image_05'];
         unlink('uploaded_files/'.$image_01);
         if(!empty($image_02)){
            unlink('uploaded_files/'.$image_02);
         }
         if(!empty($image_03)){
            unlink('uploaded_files/'.$image_03);
         }
         if(!empty($image_04)){
            unlink('uploaded_files/'.$image_04);
         }
         if(!empty($image_05)){
            unlink('uploaded_files/'.$image_05);
         }
      }
      $delete_saved = $conn->prepare("DELETE FROM `saved` WHERE property_id = ?");
      $delete_saved->execute([$delete_id]);
      $delete_requests = $conn->prepare("DELETE FROM `requests` WHERE property_id = ?");
      $delete_requests->execute([$delete_id]);
      $delete_listing = $conn->prepare("DELETE FROM `property` WHERE id = ?");
      $delete_listing->execute([$delete_id]);
      $success_msg[] = 'listing deleted successfully!';
   }else{
      $warning_msg[] = 'listing deleted already!';
   }

}


<!--  -->