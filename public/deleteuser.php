<?php
    require('../src/config.php');
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    $userDbHandler->deleteUsers ();

?>

<!-- <?=$message?> -->


<h2>Det går inte att ångra detta steg. Vill du verkligen radera ditt konto? </h2>
<form action="" method="POST">
    <input type="submit" name="deleteUserBtn" value="Radera">
</form>


