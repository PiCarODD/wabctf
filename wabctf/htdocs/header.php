<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-26 00:12:42
 * @Last Modified by:  root
 * @Last Modified time: 2019-05-07 13:56:51
**/
-->
<?php
require_once 'config/check_login.php';
?>
<html>
<head>
  <title>WABCTF</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link href="css/score.css" rel="stylesheet">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
</head>
<body>
  <?php if(isset($_SESSION['name']) and $_SESSION['name']!=""){?>
<ul class="topnav">
  <li style="color:green;">
      <a style="color:green;" href="index.php">WABCTF</a>
    </li>
    <li>
      <a href="#" style="color:#ff0000;">Welcome <?php echo htmlspecialchars($_SESSION['teamname']);?></a>
    </li>
    <li>
      <a href="score.php" style="color:#ff0000;">Scoreboard</a>
    </li>
  	<li>
  		<a href="crypto.php">Cryptography</a>
  	</li>
  	<li>
  		<a href="streg.php">Streganography</a>
  	</li>
    <li>
      <a href="programming.php">Programming</a>
    </li>
  	<li>
  		<a href="forensic.php">Forensic</a>
  	</li>
  	<li>
  		<a href="#">Web</a>
  	</li>
  	<li>
  		<a href="#">Pwn</a>
  	</li>
  	<li>
  		<a href="#">Reverse Engineering</a>
  	</li>
    <li>
      <a href="logout.php" style="color:#ff0000;">Logout</a>
    </li>
  </ul>
<?php } else{?>
<ul class="topnav">
  <li>
      <a style="color:green;" href="index.php">WABCTF</a>
    </li>
  <li>
      <a href="signup.php">Sign up</a>
    </li>
    <li>      
      <a href="login.php">Login</a>
    </li>
  </ul>
<?php } ?>

