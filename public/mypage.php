<?php
    require('../src/config.php');
    include('./layout/header.php');

    $message="";
    $deletemessage="";

    
    if (!isset($_SESSION['userid'])) {
        print_r($_SESSION);
        header('Location: login.php?mustLogin');
        exit;
    }

    
    if (isset($_POST['deleteUserBtn'])) {
        $userDbHandler->deleteUsers();

        $_SESSION = [];
        session_destroy();

        header("Location: login.php?userDeleted");
        exit;

    }

    
    if(isset($_POST['newPasswordBtn'])) {
        $userpass           = trim($_POST['userpass']);
        $confirmPassword    = trim($_POST['confirmPassword']);

            $user = $userDbHandler->updatePassword($userpass);

            $message .= '
                <div class="">
                    Ditt lösenord har uppdaterats.
                </div>
            ';
        }

    
    if(isset($_POST['nameUpdateBtn'])) {
        $username = trim($_POST['username']);

        if (empty($username)) {
			$message .= '
                <div>
                    Fyll i ditt namn. 
                </div>
            ';
		}

        if (empty($message)) {
            $userDbHandler->updateUsersFnLn($username);

            $message .= '
                <div>
                    Uppdaterat!
                </div>
            ';
        }
    }

        if(isset($_POST['informationBtn'])) {
        $userphone = trim($_POST['userphone']);
        $userimg = trim($_POST['userimg']);

        if (empty($userphone)) {
			$message .= '
                <div>
                Snälla fyll i ditt mobilnummer.
                </div>
            ';
		}

        if (empty($userimg)) {
			$message .= '
                <div>
                Nu vet du att felmeddelanden funkar, så snälla välj en profilbild.
                </div>
            ';
		}

        if (empty($message)) {
            $userDbHandler->updateInformation($username, $userphone, $userimg);

             $message .= '
                 <div>
                 Uppdateringen slutfördes. 
                 </div>
             ';
        }
    }

    $user = $userDbHandler->FetchUserBySession();

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
    <title>Min profil</title>
</head>
<body>

<legend>Välkommen till din sida <?=$user['username']?>!</legend>


<?=$message?>
<hr>

<div class="main-box-mypage">
<div class="flex-box">
<div class="white-box">

<div>
    <legend>Mina uppgifter</legend><br>
    <b>Namn: </b> <?=$user['username']?> <br>
    <b>E-postadress: </b> <?=$user['usermail']?> <br>
    <b>Mobilnummer: </b> <?=$user['userphone']?><br><br>
    <b>Typ: </b> <?=$user['usertype']?><br><br>
    <b>Profilbild: </b> <?=$user['userimg']?> <br><br>
    
    <b>Lösenord </b> <?=$user['userpass']?> <br>
    
</div><br>
</div>
    <div class="white-box">
        <div>
            <legend>Ändra uppgifter</legend>
            <form action="" method="POST">
                <div>
                    <label>Namn:</label><br>
                    <input type="text" name="username" value="<?=htmlentities($user['username']) ?>">
                </div>
                <div>
                    <br>
                    <input type="submit" class="button" name="nameUpdateBtn" value="Uppdatera">
                </div>
            </form>
            <form action="" method="POST">
                <div>
                    <label for="userphone">Mobilnummer:</label><br>
                    <input type="text" name="userphone" value="<?=htmlentities($user['userphone']) ?>">
                </div>
                <div>
                    <br>
                    <label for="userimg">Profilbild:</label><br>
                    <input type="file" name="userimg" value="<?=htmlentities($user['userimg']) ?>">
                </div>
                <div>
                <br>
                <input type="submit" class="button" name="informationBtn" value="Uppdatera">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="flex-box">

    <div class="white-box">
    <legend>Ändra lösenord</legend>
        <form action="" method="POST">
            <div>
                <label for="input1">Nytt lösenord:</label><br>
                <input type="text"  name="userpass"><br>
            </div>
            <div>
                <label for="input1">Bekräfta nytt lösenord:</label><br>
                <input type="text" name="confirmPassword"><br>
            </div>
            <div>
                <br>
                <input class="button" type="submit" name="newPasswordBtn" value="Uppdatera">
                </form> <br>
            </div>
    </div>
    </div>
    <div class="flex-box">
        <div class="white-box">   
            <br>
            <form action="logout.php" method="POST"> <br>
                    <input type="submit" class="button" name="logOutBtn" value="Logga ut">
            </form>  
        </div>
        <div class="white-box">
            <br>
            <form action="" method="POST">
                
                <input type="hidden" name="userid" value="<?=htmlentities($user['userid']) ?>">

                <input type="submit" class="button" name="deleteUserBtn" value="Ta bort konto">

                <div class="alert alert-danger"  width="450px" role="alert"> Det går inte att ångra detta steg. Vill du logga ut istället? <a href="logout.php" class="alert-link">Log out</a>
                </div>
            </form>
        
        </div>
        
    </div>        
</div>

<?php include('./layout/footer.php'); ?>
</body>
</html>
<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script> 



            

