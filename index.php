<?php

 ob_start();

 session_start();

 require_once 'dbconnect.php';

 

 // it will never let you open index(login) page if session is set

 if ( isset($_SESSION['user'])!="" ) {

  header("Location: home.php");

  exit;

 }

 

 $error = false;

 

 if( isset($_POST['btn-login']) ) {

 

  // prevent sql injections/ clear user invalid inputs

  $email = trim($_POST['email']);

  $email = strip_tags($email);

  $email = htmlspecialchars($email);

 

  $pass = trim($_POST['pass']);

  $pass = strip_tags($pass);

  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs

 

  if(empty($email)){

   $error = true;

   $emailError = "Please enter your email address.";

  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {

   $error = true;

   $emailError = "Please enter valid email address.";

  }

 

  if(empty($pass)){

   $error = true;

   $passError = "Please enter your password.";

  }

 

  // if there's no error, continue to login

  if (!$error) {

   

   $password = hash('sha256', $pass); // password hashing using SHA256

 

   $res=mysqli_query($conn, "SELECT userid, username, userlastname, userpass FROM users WHERE useremail='$email'");

   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);

   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   

   if( $count == 1 && $row['userpass']==$password ) {

    $_SESSION['user'] = $row['userid'];

    header("Location: home.php");

   } else {

    $errMSG = "Incorrect Credentials, Try again...";

   }
}

 }

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

<title>classic rides</title>

</head>

<body id="registerbody">




    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-md-offset-1 col-xs-12">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="signinform" class="navbar-form navbar-right" role="form">

   

     <?php

   if ( isset($errMSG) ) {
    echo $errMSG; ?>

      <?php

   }

   ?>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <form id="signin" class="navbar-form navbar-right" role="form">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />

                        <span class="text-danger"><?php echo $emailError; ?></span>                                     
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
          <span class="text-danger"><?php echo $passError; ?></span>                                       
                        </div>

                        <br>
                        <button type="submit" name="btn-login" id="btn-login">Sign In</button>
                        
                   </form>
     
    </div>
  </div>
</form></div>
      
    </div>


</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">classic rides</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php" id="register"><button type="submit" class="navbar-form navbar-right btn-info" name="logout" id="logoutbtn">Sign Up</button></a></li>
            </ul>
        </div>
    </div>
</nav>
</body>

</html>

<?php ob_end_flush(); ?>