
<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-27 15:20:47
 * @Last Modified by:  root
 * @Last Modified time: 2019-05-07 13:39:22
-->

<?php
require_once 'config/check_login.php';
/**check if user is logged or not**/
?>
<?php
if(isset($_SESSION['name']) and ($_SESSION['name']!="")){
session_destroy();
header("location:login.php");
// controlled not to access url without login
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Account</title>
	<link href="css/register.css" rel="stylesheet" type="text/css" >
	<script src="js/input.js">
	</script>
</head>
 <?php
  require_once 'config/database.php';
  //database connect
  if(isset($_POST['submit'])){
    $teamname=mysqli_real_escape_string($conn,$_POST['tname']);
    $password=mysqli_real_escape_string($conn,$_POST['pass']);
          $query="SELECT * from team_user where username='$teamname' and password='$password'";
    if(strlen($teamname) == mb_strlen($teamname, 'utf-8') and strlen($password) == mb_strlen($password, 'utf-8')){
    $login=mysqli_query($conn,$query);
    if(mysqli_num_rows($login)==0){
      echo "<h1 style='color:red;text-align:center;'>Wrong Username Or Password</h1>";
    }
    else{
    $row=mysqli_fetch_array($login);
    //give session to logged users
    $_SESSION['name']=$row['id'];
    $_SESSION['Type']=$row['type'];
    $_SESSION['teamname']=$row['team_name'];
    echo '<script type="text/javascript">
           window.location = "index.php?success"
      </script>';
  }
}
  else{
    echo "<h1 style='color:red;text-align:center;'>Input Must Be English</h1>";
    //not allow myanmar language
  }
  }
  ?>
<body>
 
  <?php
  require_once 'header.php';
  ?>
<div style="color:black">
  <form action="" method="post">
  	<h1 style="text-align: center;">Team Login</h1>
    <label for="tname">Userame</label>
    <input type="text" name="tname" placeholder="Username">
    <label for="pname">Password</label>
    <input type="password" name="pass" placeholder="Password" >
    <input type="submit" value="Submit" name="submit">
  </form>
</div>
</body>
</html>