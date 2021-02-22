<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$m_id = $_GET["id"];
//
// $sql = "select * from member where ma_id = $ma_id" ;
// $result = $mysqli -> query($sql) or die($mysqli->error.__line__);
// $i = 0;
// while($row = mysqli_fetch_array($result)){
//   $ma_id_data = $row['ma_id'];
//     if ($ma_id_data == $ma_id) {
//       $i = 1;
//       echo "<script type='text/javascript'>alert('ไม่สามารถลบสาขาได้ เนื่องจากยังมีข้อมูลที่ถูกใช้อยู่');</script>";
//       echo "<body onload=\";return history.back();\">";
//       break;
//     }
//   }
//   if ($i == 0) {
    $sql = "delete from member where m_id='$m_id'" ;
    $mysqli -> query($sql) or die($mysqli->error.__LINE__);
  // }
  $mysqli -> close();
?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_user.php">
