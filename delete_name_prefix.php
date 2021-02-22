<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$t_id = $_GET["id"];

$sql = "select * from member where t_id = $t_id" ;
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $t_id_data = $row['t_id'];
    if ($t_id_data == $t_id) {
      $i = 1;
      echo "<script type='text/javascript'>alert('ไม่สามารถลบคำนำหน้าได้ เนื่องจากมีการใช้คำนำหน้านี้อยู่');</script>";
      echo "<body onload=\";return history.back();\">";
      break;
    }
  }
  if ($i == 0) {
    $sql = "delete from title where t_id='$t_id'" ;
    $mysqli -> query($sql) or die($mysqli->error.__LINE__);
  }
  $mysqli -> close();
?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_name_prefix.php">
