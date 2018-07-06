<?php require_once("includes/styles.css") ?>
<?php require_once("includes/sessions.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
if (isset($_POST['submit'])) {
  // code...
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

  </head>
  <body>

    <div id="centerpage">

    <?php
    ?>

    <div >  <?php echo SuccessMessage(); ?> </div>
    <h2>Login</h2><hr>
    <form class="" action="login.php" method="post">
    <fieldset>


    Email: <br>           <input type="email" name="Email" value="">              <br>
    Password: <br>        <input type="password" name="Password" value="">        <br>

                          <input type="submit" name="Submit" value="Login">      <br>

    </fieldset>
    </form>
  </div><!-- Container -->
  </body>
</html>
