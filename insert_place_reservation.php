<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$p_id = $_POST["p_id"];
$b_id = $_POST["b_id"];
$date = $_POST["date"];
$time = $_POST["time"];
$detail = $_POST["detail"];
$m_id = $_SESSION["m_id"];
$s_id = $_SESSION["s_id"];

if ($detail == null) {
  echo "<script type='text/javascript'>alert('กรุณากรอกรายละเอียดการจอง');</script>";
  echo "<body onload=\";return history.back();\">";
  echo exit();
}
if ($s_id == 2) {
  $sql_insert="insert into form value ('','$detail','$date','201','201','','$time','$m_id','$b_id','$p_id')";
  $mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
  $mysqli->close();
}else {
  $sql_insert="insert into form value ('','$detail','$date','202','201','','$time','$m_id','$b_id','$p_id')";
  $mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
  $mysqli->close();
}


?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <?php if ($s_id == 3){ ?>
    <meta http-equiv="refresh" content="0; url=./Booking_list.php?station=2">
  <?php }else { ?>
    <meta http-equiv="refresh" content="0; url=./Booking_list.php">
<?php  } ?>
