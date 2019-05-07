<?php
$host="127.0.0.1";
$uname="root";
$pass="";
$db_name="wab_ctfdb";
$conn=mysqli_connect($host,$uname,$pass,$db_name);
if(mysqli_connect_errno()){
	echo mysqli_connect_error();
}
?>