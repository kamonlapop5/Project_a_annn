<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>

<?php
$m_id=$_POST["m_id"];
$m_username=$_POST["m_username"];
$m_password=$_POST["m_password"];
$m_fname=$_POST["m_fname"];
$m_lname=$_POST["m_lname"];
$m_phone=$_POST["m_phone"];
$m_email=$_POST["m_email"];
$s_id=$_POST["s_id"];

///////////////////////////////////////////////////////////
$sql = "SELECT * FROM member";
$result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);

$i=0;
while ($row = mysqli_fetch_array($result)) {
  $i = $i+1;
  $m_id_test[$i] = $row["m_id"];
  $m_username_test[$i] =$row["m_username"];
  $m_password_test[$i] =$row["m_password"];
  $m_fname_test[$i] =$row["m_fname"];
  $m_lname_test[$i] =$row["m_lname"];
  $m_phone_test[$i] =$row["m_phone"];
  $m_email_test[$i] =$row["m_email"];
  $s_id_test[$i] =$row["s_id"];
}


$j = 1 ;
while($j <= $i){
  if ($m_username == null or $m_password == null or $m_fname == null or $m_lname == null or $m_phone == null or $m_email == null) {
    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ( $m_username == $m_username_test[$j]) {
    echo "<script type='text/javascript'>alert('ชื่อผู้ใช้งานซ้ำ');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif (strlen($m_password) < 8 ) {
    echo "<script type='text/javascript'>alert('รหัสผ่านต้องมี 8 ตัวอักษรขึ้นไป');</script>";
    echo "<body onload=\";return history.back();\">";
    echo exit();
  }elseif ($m_username == $m_username_test[$j] or $m_phone == $m_phone_test[$j] ) {
        // code...
    }
    $j = $j+1;
}
// if ($m_username == null or $m_password == null or $m_fname == null or $m_lname == null or $m_phone == null or $m_email == null) {
//   echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
//   echo "<body onload=\";return history.back();\">";
//   echo exit();
// }
//////////////////////////////////////////////////////////////////////////////
// $sql_insert="insert into member value
// ('','$m_username','$m_password','$m_fname','$m_lname','$m_phone','$m_email','$s_id')";
// $mysqli->query($sql_insert) or die($mysqli->error.__LINE__);
// $mysqli->close();

?>
<!-- <meta http-equiv="refresh" content="0; url=./login.php"> -->



<!------------------------------------------------------>
<?php
include("./footer.php");
 ?>
