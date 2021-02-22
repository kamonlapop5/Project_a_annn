<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$faculty_id = $_GET["id"];

$sql = "select * from member where faculty_id = $faculty_id" ;
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $faculty_id_data = $row['faculty_id'];
    if ($faculty_id_data == $faculty_id) {
      $i = 1;
      echo "<script type='text/javascript'>alert('ไม่สามารถลบคณะได้ เนื่องจากยังมีข้อมูลการใช้งานอยู่');</script>";
      echo "<body onload=\";return history.back();\">";
      break;
    }
  }
  if ($i == 0) {
    $sql = "delete from faculty where faculty_id='$faculty_id'" ;
    $mysqli -> query($sql) or die($mysqli->error.__LINE__);
  }
  $mysqli -> close();
?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_faculty.php">
