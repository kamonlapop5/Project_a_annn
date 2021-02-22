<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$detail_no_submit = $_POST["detail_no_submit"];
$f_id = $_POST["f_id"];
$s_id = $_POST["s_id"];
$submit = $_POST["submit"];
$no_submit = $_POST["no_submit"];

$sql = "SELECT * FROM form WHERE f_id = '$f_id' ";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
while ($row = mysqli_fetch_array($result)) {
  $f_date = $row["f_date"];
  $time_id = $row["time_id"];
}
$sql1 = "SELECT * FROM form WHERE f_id != '$f_id' and f_date = '$f_date' ";
$result1 = $mysqli -> query($sql1)or die($mysqli ->error.__LINE__);
$i = 0 ;
while ($row1 = mysqli_fetch_array($result1)) {
  $time_id_data = $row1["time_id"];
  $f_status_facility_staff = $row1["f_status_facility_staff"];

  if ($time_id_data == $time_id and $f_status_facility_staff == 202 and $submit == 1) {
    echo "<script type='text/javascript'>alert('ไม่สามารถอนุมัติได้ เนื่องจากมีผู้จองสถานที่นี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
    $i = $i+1;
  }
}

if ($i == 0) {
  if ($no_submit == 2) {
    if ($detail_no_submit == null) {
      echo "<script type='text/javascript'>alert('หากไม่อนุมัติ กรุณากรอกหมายเหตุ');</script>";
      echo "<body onload=\";return history.back();\">";
      echo exit();
    }elseif ($s_id == 3){
      $sql_update="update form set f_status_advisor = '203' ,f_detail_no_submit = '$detail_no_submit' , f_status_facility_staff = '203' where f_id ='$f_id'";
      $mysqli->query($sql_update) or die($mysqli->error.__LINE__);
      $mysqli->close();
    }else {
      $sql_update="update form set f_status_facility_staff = '203' ,f_detail_no_submit = '$detail_no_submit'  where f_id ='$f_id'";
      $mysqli->query($sql_update) or die($mysqli->error.__LINE__);
      $mysqli->close();
    }
  }else {
    if ($s_id == 3) {
      $sql_update="update form set f_status_advisor = '202' where f_id ='$f_id'";
      $mysqli->query($sql_update) or die($mysqli->error.__LINE__);
      $mysqli->close();
    }else {
      $sql_update="update form set f_status_facility_staff = '202' where f_id ='$f_id'";
      $mysqli->query($sql_update) or die($mysqli->error.__LINE__);
      $mysqli->close();
    }
  }
}


?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <?php if ($s_id == 3){ ?>
    <meta http-equiv="refresh" content="0; url=./Booking_list.php?station=1">
  <?php }else { ?>
    <meta http-equiv="refresh" content="0; url=./Booking_list.php?station=3">
  <?php  } ?>
