<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$m_id = $_POST["m_id"];
$m_fname = $_POST['m_fname'];
$m_lname = $_POST['m_lname'];
$m_password = $_POST['m_password'];
$m_phone = $_POST['m_phone'];
$m_email = $_POST['m_email'];
$faculty_id = $_POST['faculty_id'];
$ma_id = $_POST['ma_id'];

$sql = "SELECT * FROM member WHERE m_id != $m_id ";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $m_id_data[$i] = $row["m_id"];
  $m_fname_data[$i] = $row['m_fname'];
  $m_lname_data[$i] = $row['m_lname'];
  $m_password_data[$i] = $row['m_password'];
  $m_phone_data[$i] = $row['m_phone'];
  $m_email_data[$i] = $row['m_email'];
  $faculty_id_data[$i] = $row['faculty_id'];
  $ma_id_data[$i] = $row['ma_id'];
}
$j = 1 ;
while($j <= $i){
  if ($m_fname == null or $m_lname == null or $m_password == null or $m_phone == null or $m_email == null) {
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
  }
  $j = $j+1;
}

  $sql_update="update member set m_password ='$m_password',
  m_fname = '$m_fname', m_lname ='$m_lname', m_phone ='$m_phone', m_email ='$m_email'
  where m_id ='$m_id'";
  $mysqli->query($sql_update) or die($mysqli->error.__LINE__);
  $mysqli->close();


echo"<meta http-equiv=\"refresh\" content=\"1; url=edit_profile.php\">"."";
$message = "แก้ไขข้อมูลสำเร็จ";
echo "<script type='text/javascript'>alert('$message');</script>";
?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <!--
<meta http-equiv=\"refresh\"content=\"0; url=./index.php?error=แก้ไขข้อมูลสำเร็จ\"/> -->
