<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$m_fname = $_POST['m_fname'];
$m_lname = $_POST['m_lname'];
$m_username = $_POST['m_username'];
$m_password = $_POST['m_password'];
$m_phone = $_POST['m_phone'];
$m_email = $_POST['m_email'];
$s_id = $_POST['s_id'];
$t_id = $_POST['t_id'];
$faculty_id = $_POST['faculty_id'];
$ma_id = $_POST['ma_id'];;

if ($s_id == "2" or $s_id == "3") {
  if ($faculty_id == null or $ma_id == null ) {
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
}
}

$sql = "SELECT * FROM member";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $m_id_data[$i] = $row["m_id"];
  $m_fname_data[$i] = $row['m_fname'];
  $m_lname_data[$i] = $row['m_lname'];
  $m_username_data[$i] = $row['m_username'];
  $m_password_data[$i] = $row['m_password'];
  $m_phone_data[$i] = $row['m_phone'];
  $m_email_data[$i] = $row['m_email'];
  $s_id_data[$i] = $row['s_id'];
  $t_id_data[$i] = $row['t_id'];
  $faculty_id_data[$i] = $row['faculty_id'];
  $ma_id_data[$i] = $row['ma_id'];
}
$j = 1 ;
while($j <= $i){
  if ($m_fname == null or $m_lname == null or $m_username == null or $m_password == null or $m_phone == null or $m_email == null) {
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($m_fname == $m_fname_data[$j] and $m_lname == $m_lname_data[$j] ) {
    echo "<script type='text/javascript'>alert('มีชื่อและนามสกุลนี้ถูกใช้งานแล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ( $m_email == $m_email_data[$j]) {
    echo "<script type='text/javascript'>alert('อีเมลถูกใช้งานแล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif (strlen($m_password) < 8 ) {
    echo "<script type='text/javascript'>alert('รหัสผ่านต้องมี 8 ตัวอักษรขึ้นไป');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($m_phone == $m_phone_data[$j]) {
    echo "<script type='text/javascript'>alert('มีเบอร์โทรศัพท์นี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($m_username == $m_username_data[$j]) {
    echo "<script type='text/javascript'>alert('มีชื่อผู้ใช้นี้แล้ว');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }
  $j = $j+1;
}
if ($m_fname == null or $m_lname == null or $m_username == null or $m_password == null or $m_phone == null or $m_email == null) {
  echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
  echo "<body onload=\";return history.back();\">";
  echo exit();
}
$sql_insert="insert into member value ('','$m_username','$m_password','$m_fname','$m_lname','$m_phone','$m_email','$s_id','$t_id','$ma_id','$faculty_id')";
$mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
$mysqli->close();

?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <!--
<meta http-equiv=\"refresh\"content=\"0; url=./index.php?error=แก้ไขข้อมูลสำเร็จ\"/> -->
<meta http-equiv="refresh" content="0; url=./Manage_user.php">
