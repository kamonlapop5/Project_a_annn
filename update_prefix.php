<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$t_id = $_POST["id"];
$prefix = $_POST['prefix'];

$sql = "SELECT * FROM title WHERE t_id != $t_id ";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $prefix_data[$i] = $row["t_name"];
}
$j = 1 ;
while($j <= $i){
  if ($prefix == null) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=กรุณากรอกข้อมูลให้ครบ\"/>";
    // echo"<script>alert(\"กรุณากรอกข้อมูลให้ครบ\")</script>";
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($prefix == $prefix_data[$j]) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=มีคำนำหน้านี้แล้ว\"/>";
    // echo"<script>alert(\"มีคำนำหน้านี้แล้ว\")</script>";
    echo "<script type='text/javascript'>alert('มีคำนำหน้านี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
$sql_update="update title set t_name = '$prefix'where t_id ='$t_id'";
$mysqli->query($sql_update) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_name_prefix.php">
