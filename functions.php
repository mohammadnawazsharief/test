<?php require_once("includes/DB.php")  ?>
<?php
function Redirect_To($NewLocation)
{
  header("Location:".$NewLocation);
  exit;
}

function CheckEmailExistsOrNot($Email)
{
  global $Connection;
  $Query="SELECT * FROM users where email='$Email'";
  $Execute=mysqli_query($Connection,$Query);
  if (mysqli_num_rows($Execute)>0)
  {
    return true;
  }
  else
  {
    return false;
  }
}


?>
