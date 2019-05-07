<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-26 00:12:42
 * @Last Modified by:  root
 * @Last Modified time: 2019-05-07 13:57:11
**/
-->
<?php
require_once 'config/check_login.php';
?>
<?php
session_destroy();
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
?>
<?php
if(isset($_POST['submit'])){
	$check="SELECT * FROM team_user WHERE team_name = '$_POST[teamname]'";
	$login=mysqli_query($conn,$check);
  if (mysqli_num_rows($login)>0)
  {
    echo "<h1 style='color:red;text-align:center;'>Team Name Already Exist</h1>";
  }	else{
   $tname= mysqli_real_escape_string($conn,$_POST['teamname']);
   $uname=mysqli_real_escape_string($conn,$_POST['username']);
   $ename=mysqli_real_escape_string($conn,$_POST['ename']);
   $pass=mysqli_real_escape_string($conn,$_POST['passwd']);
   $school=mysqli_real_escape_string($conn,$_POST['uniname']);
   $phone=mysqli_real_escape_string($conn,$_POST['phno']);
   $city=mysqli_real_escape_string($conn,$_POST['region1']);
   $user="user";
   $query="INSERT INTO team_user (team_name,username,email,password,uniname,phone,region,type,mark) VALUES ('$tname','$uname','$ename','$pass','$school','$phone','$city','$user',0)";
   if(strlen($tname) != mb_strlen($tname, 'utf-8') and strlen($uname) != mb_strlen($uname, 'utf-8') and strlen($ename) != mb_strlen($ename, 'utf-8') and strlen($pass) != mb_strlen($pass, 'utf-8') and strlen($school) != mb_strlen($school, 'utf-8') and strlen($phone) != mb_strlen($phone, 'utf-8') and strlen($city) != mb_strlen($city, 'utf-8')){
     mysqli_query($conn, $query);
     echo "<h1 style='color:green;text-align:center;'>Registration Success</h1>";
   }
   else{
    echo "<h1 style='color:red;text-align:center;'>Registration Failed Please Use English</h1>";
  }
}
mysqli_close($conn);
}
?>
<body>
	<?php
	require_once 'header.php';?>
  <div style="color:black">
    <form action="" method="post">
     <h1 style="text-align: center;">Team Registration</h1>
     <label for="tname">Team Name</label>
     <input type="text"  name="teamname" placeholder="Team Name" required="">
     <label for="uname">Username</label>
     <input type="text"  name="username" placeholder="Username" required="">
     <label for="ename">Email</label>
     <input type="text"  name="ename" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email" required="">
     <label for="pname">Password</label>
     <input type="password" name="passwd" placeholder="Password" pattern=".{6,}" title="Six or more characters" required="">
     <label for="lname">School/University Name</label>
     <input type="text" name="uniname" placeholder="Uni/School Name" required="">
     <label for="lname">Phone Number</label>
     <input type="text" name="phno" placeholder="Phone" pattern="[0-9]{10,}" title="Number Only" required="">
     <label for="country">City</label>
     <select name="region1">
      <option value="Magway">Magway</option>
      <option value="Yangon">Yangon</option>
      <option value="Mandalay">Mandalay</option>
      <option value="Naypyitaw">Naypyitaw</option>
      <option value="Taunggyi">Taunggyi</option>
    </select>
    <input type="submit" value="Submit" name="submit">
  </form>
</div>
</body>
</html>