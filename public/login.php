<?php
	$pageTitle = "Login";
	require('../src/config.php');
    include('./layout/header.php');

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $message = "";
    if (isset($_GET['errorLogin'])) {
        $message = '
            <div>
                Du måste logga in för att se detta. Vänligen försök igen.
            </div>
        ';
    }

    if (isset($_GET['mustLogin'])) {
        $message = '
            <div>
                Du måste logga in för att se detta.
            </div>
        ';
    }

    if (isset($_GET['logout'])) {
        $message = '
            <div>
                Du är nu utloggad.
            </div>
        ';
    }

    if (isset($_GET['userDeleted'])) {
        $message = '
            <div>
                Användaren har tagits bort. 
            </div>
        ';
    }

    if (isset($_POST['loginBtn'])) {
        $usermail    = trim($_POST['usermail']);
        $userpass = trim($_POST['userpass']);

        $user = $userDbHandler->FetchUserByEmail($usermail);

        /* echo "<pre>";
        print_r($user);
        echo "</pre>"; */

        if ($user && password_verify($userpass, $user['userpass'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $user['userid'];
            $_SESSION['usermail'] = $user['usermail'];
            header('Location: myPage.php');
            exit;
        } else {
            $message = '
                <div class="">
                    Felaktiga uppgifter. Vänligen försök igen.
                </div>
            ';
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
    <title>Login</title>
</head>
<body>

<div class="main-box-login">
    <div class="white-box">
        <legend>Login</legend>

        <?=$message?>

        <form action="" method="POST">
            <input type="text" name="usermail" placeholder="E-mail"><br>
            <br>
            <input type="password" name="userpass" placeholder="Password"><br>
            <br>
            <input class="button" type="submit" name="loginBtn" value="Login">
        </form>
    </div>
    <div class="white-box">
        <legend>New user?</legend>
        <form action="register.php" method="POST">
            <input class="button" type="submit" name="newUser" value="Register">
        </form>
    </div>
</div>

<div class="container">
  <h2>Login</h2>
  <?=$message?>
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="usermail">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Lösenord:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" name="userpass">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Kom ihåg mig</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" name="loginBtn" value="Logga in">
      </div>
    </div>
  </form>
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">Ny användare?</label>
      <div class="col-sm-10">
        <form action="register.php" method="POST">
            <input class="form-control button" type="submit" name="newUser" value="Registrera">
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
