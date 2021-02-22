<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$major_name = $_POST["major_name"];
$faculty_id = $_POST["faculty_id"];

$sql = "SELECT * FROM major";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $major_name_data[$i] = $row["ma_name"];
}
$j = 1 ;
while($j <= $i){
  if ($major_name == $major_name_data[$j]) {
    echo "<script type='text/javascript'>alert('มีสาขานี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
if ($major_name == null or $faculty_id == 0) {
  echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
  echo "<body onload=\";return history.back();\">";
  echo exit();
}
$sql_insert="insert into major value ('','$major_name','$faculty_id')";
$mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <!--
<meta http-equiv=\"refresh\"content=\"0; url=./index.php?error=แก้ไขข้อมูลสำเร็จ\"/> -->
<meta http-equiv="refresh" content="0; url=./Manage_major.php">
