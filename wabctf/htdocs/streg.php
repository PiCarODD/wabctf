<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-26 00:12:42
 * @Last Modified by:  root
 * @Last Modified time: 2019-05-07 13:57:15
**/
-->
<?php
require_once './config/check_login.php';
require_once './header.php'; 
require_once './config/database.php'; 
if(!isset($_SESSION['name'])){
    echo '<script type="text/javascript">
           window.location = "login.php"
      </script>';
}
?>

  <h1 style="text-align: center;">Streganography</h1><?php if($_SESSION['Type']=="admin1337s"){ echo "<center><a href='addchal1337.php'>Add Challenges</a></center>";}?>
<?php
$cat='Streganography';
$query="select * from challenges where category='$cat'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<?php
if(isset($_POST['submit'])){
  $flag=mysqli_real_escape_string($conn,$_POST['flag']);
  $chalid=mysqli_real_escape_string($conn,$_POST['cid']);
  $uid=$_SESSION['name'];
  $query1="SELECT flag FROM challenges WHERE id='$chalid'";
  $result=mysqli_query($conn,$query1);
  $realflag= mysqli_fetch_array($result,MYSQLI_ASSOC);
  $userquery="SELECT * FROM solve where userid='$uid'";
  $result2=mysqli_query($conn,$userquery);
  $row1=mysqli_fetch_all($result2,MYSQLI_ASSOC);
  if(empty($row1)){
    if($realflag['flag']==$flag){
      echo "<p style='text-align:center;color:green;'>Congratulations!</p>";
      $query2="INSERT INTO solve (userid,chalid,solve) VALUES ('$uid','$chalid','yes')";
      mysqli_query($conn,$query2);
      $markquery="select points from challenges where id='$chalid'";
      $markresult=mysqli_query($conn,$markquery);
      $fatch=mysqli_fetch_assoc($markresult);
      $mark=$fatch['points'];
      $orgquery="select mark from team_user where id='$uid'";
      $orgresult=mysqli_query($conn,$orgquery);
      $fatch1=mysqli_fetch_assoc($orgresult);
      $orgmark=$fatch1['mark'];
      $total=$mark+$orgmark;
      $updatequery="UPDATE team_user SET mark='$total' where id='$uid'";
      mysqli_query($conn,$updatequery);
    }     else{
      echo "<p style='text-align:center;color:red;'>Invalid Flag</p>";
    }
  }
  $found=0;
  foreach ($row1 as $rows1) {
      if($rows1['chalid']==$chalid){
        $found=1;
      }
  }
  if($realflag['flag']==$flag and $found==0 and !empty($row1)){
      echo "<p style='text-align:center;color:green;'>Congratulations!</p>";
      $query2="INSERT INTO solve (userid,chalid,solve) VALUES ('$uid','$chalid','yes')";
      mysqli_query($conn,$query2);
      $markquery="select points from challenges where id='$chalid'";
      $markresult=mysqli_query($conn,$markquery);
      $fatch=mysqli_fetch_assoc($markresult);
      $mark=$fatch['points'];
      $orgquery="select mark from team_user where id='$uid'";
      $orgresult=mysqli_query($conn,$orgquery);
      $fatch1=mysqli_fetch_assoc($orgresult);
      $orgmark=$fatch1['mark'];
      $total=$mark+$orgmark;
      $updatequery="UPDATE team_user SET mark='$total' where id='$uid'";
      mysqli_query($conn,$updatequery);
    }
    if($found==1){
      echo "<p style='text-align:center;color:red;'>Already Solve</p>";
    } 
    if($realflag['flag']!=$flag){ 
      "<p style='text-align:center;color:red;'>Invalid Flag</p>";
  }
}
?>
<div class="w3-row-padding w3-padding-16 w3-center" id="food">
  <?php
  foreach($row as $rows){
    ?>
    <div class="w3-quarter">
      <h3><?php echo $rows["chal_name"];?></h3>
      <p>Hint:<?php echo $rows["hint"];?></p>
      <p>Points:<?php echo $rows["points"];?></p>
      <a href="<?php echo $rows["url"];?>" style="color:blue">Challenge File</a>
      <form action="" method="post">
        <input type="hidden" value="<?php echo $rows['id'];?>" name="cid"/>
      <input type="text" size="30" name="flag" style="color:red;" placeholder="wabctf{...}">
      <input type="submit" style="color:green;" value="Submit" name="submit">
    </form>
    </div>
  <?php } 
   ?>   

</div>

</body>
</html>