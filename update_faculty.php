<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$faculty_id = $_POST["faculty_id"];
$faculty_name = $_POST['faculty_name'];

$sql = "SELECT * FROM faculty WHERE faculty_id != '$faculty_id' ";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $faculty_name_data[$i] = $row["faculty_name"];
}
$j = 1 ;
while($j <= $i){
  if ($faculty_name == null) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=กรุณากรอกข้อมูลให้ครบ\"/>";
    // echo"<script>alert(\"กรุณากรอกข้อมูลให้ครบ\")</script>";
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($faculty_name == $faculty_name_data[$j]) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=มีคำนำหน้านี้แล้ว\"/>";
    // echo"<script>alert(\"มีคำนำหน้านี้แล้ว\")</script>";
    echo "<script type='text/javascript'>alert('มีคณะนี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
$sql_update="update faculty set faculty_name = '$faculty_name' where faculty_id ='$faculty_id'";
$mysqli->query($sql_update) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_faculty.php">
