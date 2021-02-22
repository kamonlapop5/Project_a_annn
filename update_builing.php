<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$id = $_POST["b_id"];
$b_name = $_POST['b_name'];

$sql = "SELECT * FROM builing WHERE b_id != '$id' ";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $b_name_data[$i] = $row["b_name"];
}
$j = 1 ;
while($j <= $i){
  if ($b_name == null) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=กรุณากรอกข้อมูลให้ครบ\"/>";
    // echo"<script>alert(\"กรุณากรอกข้อมูลให้ครบ\")</script>";
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($b_name == $b_name_data[$j]) {
    // echo "<meta http-equiv=\"refresh\"content=\"0; url=./edit_name_prefix.php?error=มีคำนำหน้านี้แล้ว\"/>";
    // echo"<script>alert(\"มีคำนำหน้านี้แล้ว\")</script>";
    echo "<script type='text/javascript'>alert('มีตึกนี้อยู่แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
$sql_update="update builing set b_name = '$b_name' where b_id ='$id'";
$mysqli->query($sql_update) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./Manage_builing.php">
