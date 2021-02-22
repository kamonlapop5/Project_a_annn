<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$b_id = $_POST["b_id"];
$p_id = $_POST["p_id"];
$p_name = $_POST['p_name'];

$sql = "SELECT * FROM place WHERE p_id != '$p_id' ";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $p_name_data[$i] = $row["p_name"];
}
$j = 1 ;
while($j <= $i){
  if ($p_name == null) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=กรุณากรอกข้อมูลให้ครบ\"/>";
    // echo"<script>alert(\"กรุณากรอกข้อมูลให้ครบ\")</script>";
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($p_name == $p_name_data[$j]) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=มีคำนำหน้านี้แล้ว\"/>";
    // echo"<script>alert(\"มีคำนำหน้านี้แล้ว\")</script>";
    echo "<script type='text/javascript'>alert('มีสถานที่นี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
$sql_update="update place set p_name = '$p_name' , b_id = '$b_id' where p_id ='$p_id'";
$mysqli->query($sql_update) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_place.php">
