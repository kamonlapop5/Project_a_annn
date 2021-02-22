<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$p_id = $_GET["id"];
//
// $sql = "select * from place where b_id = $p_id" ;
// $result = $mysqli -> query($sql) or die($mysqli->error.__line__);
// $i = 0;
// while($row = mysqli_fetch_array($result)){
//   $b_id_data = $row['b_id'];
//     if ($b_id_data == $b_id) {
//       $i = 1;
//       echo "<script type='text/javascript'>alert('ไม่สามารถลบสถานที่ได้ เนื่องจากมีข้อมูลการจองแล้ว');</script>";
//       echo "<body onload=\";return history.back();\">";
//       break;
//     }
//   }
//   if ($i == 0) {
    $sql = "delete from place where p_id='$p_id'" ;
    $mysqli -> query($sql) or die($mysqli->error.__LINE__);
  // }
  $mysqli -> close();
?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_place.php">
