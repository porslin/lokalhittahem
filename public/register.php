<?php
    require('../src/config.php');
    include('layout/header.php');

    $pageTitle = "New User";
    // $pageId    = "register";

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    
    $messageuser="";
    $message   ="";
    $error     ="";

    $username  ="";
    $usermail  ="";
    $userphone ="";
    $usertype  ="";
    $userimg   ="";
    

    if (isset($_POST['newUserBtn'])) {
        $username           = trim($_POST['username']);
        $usermail           = trim($_POST['usermail']);
        $userphone          = trim($_POST['userphone']);
        $usertype           = trim($_POST['usertype']);
        $userimg            = trim($_POST['userimg']);
        $userpass           = trim($_POST['userpass']);
        $confirmPassword    = trim($_POST['confirmPassword']);

        if (empty($username)) {
            $error .= "Vänligen fyll i ett användarnamn. <br>";
        }

        if (empty($usermail)) {
            $error .= "Vänligen fyll i ditt mejladress. <br>";
        }

        if (empty($userphone)) {
            $error .= "Vänligen fyll i ditt mobilnummer. <br>";
        }

        if (empty($userimg)) {
            $error .= "Vänligen välj en bild.<br>";
        }

        if (empty($userpass)) {
            $error .= "Vänligen fyll i ett lösenord.<br>";
        }

        if ($userpass !== $confirmPassword) {
            $error .= "Vänligen kontrollera nya lösenordet.";
        }

        if (filter_var($usermail, FILTER_VALIDATE_EMAIL) === false) {
            $error .= "Vänligen försök igen.<br>";
        }
    
        
        if ($error) {
            $message = "
                <div class='error_msg'>
                    {$error}
                </div>
            ";

        } else {
            try {
                $userDbHandler->newUser($username, $usermail, $userphone, $usertype, $userimg, $userpass);
                $messageuser .= "Hej och välkommen, nu kan du logga in! <br>";
            } catch (\PDOException $e) {
                if ((int) $e->getCode() === 23000) {
                    $message = "
                        <div class='error_msg'>
                            Mejladressen du angav används redan, vänligen ange en annan mejladress.
                        </div>
                    ";
                } else {
                    throw new \PDOException($e->getMessage(), (int) $e->getCode());
                }
            }        
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
    <title>Registrera</title>
</head>
<body>              
    <div class="main-box-newuser">
        <div class="white-box">
            <legend>Har du redan ett konto? Gå till inloggning</legend>
            <form action="login.php" method="POST">
            <input type="submit" class="button" name="newUser" value="Logga in">
            </form> 
            <br><?=$messageuser ?>
        </div>
        <div class="white-box">
            <div id="content">
                <form method="POST" action="#">
                    <fieldset>
                        <legend>Registera här</legend>

                        <?=$message ?>
                        
                        <p>
                            <label for="input1">Fullständigt namn:</label> <br>
                            <input type="text" class="text" name="username" value="<?=htmlentities($username) ?>">
                        </p>

                        <p>
                            <label for="input1">Mejladress:</label> <br>
                            <input type="text" class="text" name="usermail" value="<?=htmlentities($usermail) ?>">
                        </p>

                        <p>
                            <label for="input1">Mobilnummer:</label> <br>
                            <input type="text" class="text" name="userphone" value="<?=htmlentities($userphone) ?>">
                        </p>

                        <p>
                            <label for="input1">Vem är du?:</label> <br>
                            <input type="radio" class="text" name="usertype" value="buyer" checked> Söker ett hem
                            <input type="radio" class="text" name="usertype" value="seller"> Säljer ett hem
                        </p>

                        <p>
                            <label for="input1">Din profilbild:</label> <br>
                            <input type="file" class="text" name="userimg" value="<?=htmlentities($userimg) ?>">
                        </p>

                        <p>
                            <label for="input2">Lösenord:</label> <br>
                            <input type="password" class="text" name="userpass">
                        </p>

                        <p>
                            <label for="input2">Bekräfta lösenord:</label> <br>
                            <input type="password" class="text" name="confirmPassword">
                        </p>
                        <p>
                            <input type="submit" class="button" name="newUserBtn" value="Registrera"> <br>

                        </p>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php include('./layout/footer.php'); ?>

<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script> 