<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-26 00:12:42
 * @Last Modified by:  root
 * @Last Modified time: 2019-05-07 13:57:06
**/
-->
<?php
require_once 'config/check_login.php';
require_once 'header.php'; 
require_once 'config/database.php'; 
if(!isset($_SESSION['name'])){
  echo '<script type="text/javascript">
  window.location = "login.php"
  </script>';
}
?>

<?php
//get points of users 
$query="SELECT * FROM team_user where type='user' order by mark DESC";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<table id="users">
  <tr>
    <th>Rank</th>
    <th>Team name</th>
    <th>University/School</th>
    <th>Score</th>
  </tr>
  <?php
  $x = 0;
  foreach ($row as $rows){
    ?>
    <!--show user data with table format-->
    <tr>
     <td><?php echo ++$x;?></td>
     <td><?php echo htmlspecialchars($rows['team_name']);?></td>
     <td><?php echo htmlspecialchars($rows["uniname"]);?></td>
     <td><?php echo htmlspecialchars($rows["mark"]);?></td>
   </tr>
 <?php } ?>
</table>
</body>
</html>