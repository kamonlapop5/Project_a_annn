<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$faculty_name = $_POST["faculty_name"];

$sql = "SELECT * FROM faculty";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $faculty_name_data[$i] = $row["faculty_name"];
}
$j = 1 ;
while($j <= $i){
  if ($faculty_name == $faculty_name_data[$j]) {
    echo "<script type='text/javascript'>alert('มีคณะนี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
if ($faculty_name == null) {
  echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
  echo "<body onload=\";return history.back();\">";
  echo exit();
}
$sql_insert="insert into faculty value ('','$faculty_name')";
$mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <!--
<meta http-equiv=\"refresh\"content=\"0; url=./index.php?error=แก้ไขข้อมูลสำเร็จ\"/> -->
<meta http-equiv="refresh" content="0; url=./Manage_faculty.php">
