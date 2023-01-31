<?php  

require('../src/config.php');
include('./layout/header.php'); 

if(isset($_SESSION['userid'])){
   $userid = $_SESSION['userid'];
}else{
   $userid = '';
   header('location:login.php?mustLogin');
   exit;
}

if (isset($_POST['deleteObjectBtn'])) {
    $objectDbHandler->deleteObject(); 
}



$objects = $objectDbHandler->FetchUserObject();

// echo "<pre>";
// print_r($objects);
// echo "</pre>";

?>



<!DOCTYPE html>
<html>
<head>
<title>Mina objekt</title>
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
    <div id="container">
        <h1>Mina Objekt</h1>

        <nav id="main-nav">
            <a href="create-object.php" class="w3-button w3-green">Lägg upp nytt objekt</a>
        </nav>

        <hr>
        <table class="content-table">
    
    <thead>
         
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Address</th>
            <th>Pris</th>
            <th>Yta</th>
            <th>Typ</th>
            <th>Upplåtelse</th>
          <tr>

    
    </thead>

          <tbody id="data">
          
          <?php foreach($objects as $object) : ?>
                        <tr id="data_objects">
                            <td><?=htmlentities($object['objectid']) ?></td>
                            <td><img src="<?=$object['img']?>"height="100" width="100"></td>
                            <td><a href="object.php?objectid=<?=htmlentities($object['objectid']) ?>"><?=htmlentities($object['address']) ?></a></td>
                            <td>
                                <?php if(is_null($object['price'])): ?>
							<?=htmlentities($object['monthly'])?> kr/mån
						<?php else: ?>
							<?=htmlentities($object['price'])?> kr
						<?php endif; ?>
                            </td>
                            <td><?=htmlentities($object['size']) ?> m<sup>2</sup></td>
                            <td><?=htmlentities($object['type']) ?></td>
                            <td><?=htmlentities($object['tenure']) ?></td>
                            <td>
                                <form action="update-object.php" method="GET">
                                    <input type="hidden" name="objectid" value="<?=htmlentities($object['objectid']) ?>">
                                    <input type="submit" value="Uppdatera">
                                </form>

                                <form id="delete-form" action="" method="POST">
                                    <input type="hidden" name="objectid" value="<?=htmlentities($object['objectid']) ?>">
                                    <input type="submit" name="deleteBtn" class="delbutton" id="<?php echo $object['objectid'] ?>" value="Radera">
                                </form>
                            </td>
                        
                        </tr>
                    <?php endforeach; ?>

          </tbody>
        </table>
        
    </div>

    <?php include 'layout/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/delete.js"></script>

  </body>
</html>
