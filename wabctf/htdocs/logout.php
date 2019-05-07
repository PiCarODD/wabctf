
<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-25 01:05:37
 * @Last Modified by:  Hein Htet Aung
 * @Last Modified time: 2019-05-07 13:33:58
-->

<?php
session_start();
session_destroy();
header("location:login.php");
?>
