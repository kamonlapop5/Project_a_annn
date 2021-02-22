<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$b_name = $_POST["b_name"];

$sql = "SELECT * FROM builing";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $b_name_data[$i] = $row["b_name"];
}
$j = 1 ;
while($j <= $i){
  if ($b_name == null) {
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($b_name == $b_name_data[$j]) {
    echo "<script type='text/javascript'>alert('มีตึกนี้อยู่แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
if ($b_name == null) {
  echo "<meta http-equiv=\"refresh\"content=\"0; url=./add_builing.php?error=กรุณากรอกข้อมูลให้ครบ\"/>";
  echo"<script>alert(\"กรุณากรอกข้อมูลให้ครบ\")</script>";
  echo exit();
}
$sql_insert="insert into builing value ('','$b_name')";
$mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <!--
<meta http-equiv=\"refresh\"content=\"0; url=./index.php?error=แก้ไขข้อมูลสำเร็จ\"/> -->
<meta http-equiv="refresh" content="0; url=./Manage_builing.php">
