<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$faculty_id = $_POST["faculty_id"];
$ma_id = $_POST["ma_id"];
$ma_name = $_POST['ma_name'];

$sql = "SELECT * FROM major WHERE ma_id != '$ma_id' ";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $ma_name_data[$i] = $row["ma_name"];
}
$j = 1 ;
while($j <= $i){
  if ($ma_name == null) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=กรุณากรอกข้อมูลให้ครบ\"/>";
    // echo"<script>alert(\"กรุณากรอกข้อมูลให้ครบ\")</script>";
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($ma_name == $ma_name_data[$j]) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=มีคำนำหน้านี้แล้ว\"/>";
    // echo"<script>alert(\"มีคำนำหน้านี้แล้ว\")</script>";
    echo "<script type='text/javascript'>alert('มีสาขานี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
$sql_update="update major set ma_name = '$ma_name' , faculty_id = '$faculty_id' where ma_id ='$ma_id'";
$mysqli->query($sql_update) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_major.php">
