<?php
if(isset($_SESSION['name'])){
$_SESSION['name']=$_SESSION['name'];
}

else{
  session_start();
}
?>