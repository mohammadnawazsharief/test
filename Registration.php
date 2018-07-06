<?php require_once("includes/sessions.php") ?>
<?php require_once("includes/styles.css") ?>
<?php require_once("includes/DB.php") ?>
<?php require_once("includes/functions.php") ?>
<?php $EmailError="";  ?>
<?php
if (isset($_POST['Submit']))
{
    $Username=$_POST['UserName'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $ConfirmPassword=$_POST['ConfirmPassword'];

    if (empty($Username)&&empty($Email)&&empty($Password)&&empty($ConfirmPassword))
    {
      $_SESSION['message']="All Fields Must Be Filled Out";
      //for redirection to some page we do the below code used function in functions.php
      Redirect_To("Registration.php");
    }
    elseif ($Password!==$ConfirmPassword) {
      $_SESSION['message']="Passwords dont match Try again";
      //for redirection to some page we do the below code used function in functions.php
      Redirect_To("Registration.php");
    }
    elseif (strlen($Password)<4) {
      $_SESSION["message"]="Password should be more than 4 characters";
      Redirect_To("User_Registration.php");
    }

    elseif (CheckEmailExistsOrNot($Email))
    {
      $_SESSION["message"]="Email Already in Use, Try with other Email";
      Redirect_To("Registration.php");

    }
    else
    {
      global $Connection;
      $Query="INSERT INTO users (username,email,password) VALUES('$Username','$Email','$Password')";
      $Execute=mysqli_query($Connection,$Query);
      $_SESSION['SuccessMessage']="Data Inserted Successfully";
      Redirect_To("Login.php");
    }

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Registration!</title>

  </head>
  <body>

    <div id="centerpage">

    <?php
    ?>

    <h2>User Registration</h2><hr>
    <div >  <?php echo Message(); ?> </div>
    <div >  <?php echo SuccessMessage(); ?> </div>
    <form class="" action="Registration.php" method="post">
    <fieldset>

    UserName: <br>        <input type="text" name="UserName" value="">            <br>
    Email: <br>           <input type="email" name="Email" value="">  <?php echo $EmailError; ?>            <br>
    Password: <br>        <input type="password" name="Password" value="">        <br>
    ConfirmPassword: <br> <input type="password" name="ConfirmPassword" value=""> <br><br>
                          <input type="submit" name="Submit" value="Submit">      <br>

    </fieldset>
    </form>
  </div><!-- Container -->
  </body>
</html>
