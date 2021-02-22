<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$p_name = $_POST["p_name"];
$b_id = $_POST["b_id"];

$sql = "SELECT * FROM place where b_id = '$b_id'";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $p_name_data[$i] = $row["p_name"];
}
$j = 1 ;
while($j <= $i){
  if ($p_name == null) {
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($p_name == $p_name_data[$j]) {
    echo "<script type='text/javascript'>alert('มีสถานที่นี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
if ($p_name == null or $b_id == 0) {
  echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
  echo "<body onload=\";return history.back();\">";
  echo exit();
}
$sql_insert="insert into place value ('','$p_name','$b_id')";
$mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <!--
<meta http-equiv=\"refresh\"content=\"0; url=./index.php?error=แก้ไขข้อมูลสำเร็จ\"/> -->
<meta http-equiv="refresh" content="0; url=./Manage_place.php">
