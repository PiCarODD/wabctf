<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-25 18:18:21
 * @Last Modified by:  root
 * @Last Modified time: 2019-05-07 13:42:01
-->

<?php
require_once './config/check_login.php';
require_once './header.php'; 
require_once './config/database.php'; 
if(!isset($_SESSION['name'])){
    echo '<script type="text/javascript">
           window.location = "login.php"
      </script>';
      //if not logged cant accesss this file
}
?>
<!--we cant see this page is logged user is not admin-->
<?php
if(isset($_POST['submit']) and $_SESSION['Type']=="admin1337s"){
	$cat=mysqli_real_escape_string($conn,$_POST['cat']);
	$chal=mysqli_real_escape_string($conn,$_POST['cn']);
	$hints=mysqli_real_escape_string($conn,$_POST['hint']);
	$wab=mysqli_real_escape_string($conn,$_POST['fg']);
	$file=mysqli_real_escape_string($conn,$_POST['cf']);
	$point=mysqli_real_escape_string($conn,$_POST['pt']);
	$query="INSERT INTO challenges (category,chal_name,hint,url,flag,points) VALUES ('$cat','$chal','$hints','$file','$wab','$point')";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo "error".mysqli_errno($conn);
	}
	echo "<h1 style='color:green;text-align:center;'>Record Inserted</h1>";
}
?>
<h1>Add Challenges</h1>
<form action="" method="post">
	<table>
		<tr>
<td><label>Category</label></td>
<td><select name="cat" style="color:green;">
	<option>Cryptography</option>
	<option>Streganography</option>
	<option>Forensic</option>
	<option>Reverse Engineering</option>
	<option>PWN</option>
	<option>WEB</option>
</select></td></tr>
		<tr>
<td><label>Challenge Name</label></td>
<td><input type="text" style="color:green;" name="cn" placeholder="Challenge name...."></td></tr>
<tr>
<td><label>Hint</label></td>
<td><input type="text" name="hint" style="color:green;" placeholder="Hint name...." required=""></td></tr>
<tr>
<td><label>Challenge File</label>
<td><input type="text" name="cf" style="color:green;" placeholder="File Url...." required=""></td></tr>
<tr>
<td><label>Flag</label>
<td><input type="text" name="fg" style="color:green;" placeholder="Flag name...." required=""></td></tr>
<tr>
<td><label>Points</label></td>
<td><input type="number" name="pt" style="color:green;" placeholder="Point...." required=""></td></tr>
</table>
<input type="submit" style="color:green;" value="submit" name="submit">
</form>