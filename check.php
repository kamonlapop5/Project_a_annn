<?php
include("./header.php");
include("./menu.php");
include("connect.php");

$User = $_POST["User"];
$Pass = $_POST["Password"];
 ?>
 <?php
 $sql = "select * from member inner join status on status.s_id = member.s_id where m_username = '$User'";
 $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
 $i=0;
 while ($row = mysqli_fetch_array($result)) {
   $i = $i+1;
   $m_id = $row["m_id"];
   $m_fname = $row["m_fname"];
   $m_lname = $row["m_lname"];
   $m_username = $row["m_username"];
   $m_password = $row["m_password"];
   $s_id = $row["s_id"];
   $s_name = $row["s_name"];
 }
 if($i==0){
   echo "<meta http-equiv=\"refresh\"content=\"0; url=./login.php?error=กรุณากรอกข้อมูลให้ถูกต้อง\"/>";
   echo"<script>alert(\"กรุณากรอกข้อมูลให้ถูกต้อง\")</script>";
   echo exit();
 }elseif ($i==1) {
   if($Pass != $m_password){
     echo "<meta http-equiv=\"refresh\"content=\"0; url=./login.php?error=กรุณากรอกข้อมูลให้ถูกต้อง\"/>";
     echo"<script>alert(\"กรุณากรอกข้อมูลให้ถูกต้อง\")</script>";
     echo exit();
 }else {
   $_SESSION["m_id"]=$m_id;
   $_SESSION["m_fname"]=$m_fname;
   $_SESSION["m_lname"]=$m_lname;
   $_SESSION["s_id"]=$s_id;
   $_SESSION["s_name"]=$s_name;
   echo "<meta http-equiv=\"refresh\" content=\"0; url=./Index.php\">";
 }
}
 $mysqli -> close();
   include("./footer.php");
  ?>
