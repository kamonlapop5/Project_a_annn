<tr>
  <td bgcolor = EBD7D7 width = "15%" height = "500" valign = "top">&nbsp;
    <table  width="100%" align="left" >
      <td bgcolor="EBD7D7" height="70" >
</-------------------------------------------------------------------------------->
<?php
if ($_SESSION["s_id"]!=""){
  echo $_SESSION["m_fname"]." ".$_SESSION["m_lname"]."<br>";
  echo "(".$_SESSION["s_name"].")<br><br>";
  echo "<li><a href=\"./logout.php\" style=\"color: Black\">ออกจากระบบ</a></li><hr>";
}else{
  echo "<li ><a href=\"./Index.php\" style=\"color:black\">หน้าแรก</a></li><hr>";
  echo "<li><a href=\"./login.php\" style=\"color: Black\">เข้าสู่ระบบ</a></li><hr>";
}
if ($_SESSION["s_id"]=="1"){
  echo "<li ><a href=\"./Index.php\" style=\"color:black\">หน้าแรก</a></li><hr>";
  echo "<li ><a href=\"./edit_profile.php\" style=\"color:black\">แก้ไขข้อมูลส่วนตัว</a></li><hr>";
  echo "<li ><a href=\"./Manage_name_prefix.php\" style=\"color:black\">จัดการคำนำหน้าชื่อ</a></li><hr>";
  echo "<li ><a href=\"./Manage_faculty.php\" style=\"color:black\">จัดการข้อมูลคณะ</a></li><hr>";
  echo "<li ><a href=\"./Manage_major.php\" style=\"color:black\">จัดการข้อมูลสาขา</a></li><hr>";
  echo "<li ><a href=\"./Manage_user.php\" style=\"color:black\">จัดการข้อมูลสมาชิก</a></li><hr>";
  echo "<li ><a href=\"./Manage_builing.php\" style=\"color:black\">จัดการข้อมูลตึก</a></li><hr>";
  echo "<li ><a href=\"./Manage_place.php\" style=\"color:black\">จัดการข้อมูลสถานที่</a></li><hr>";
}
elseif ($_SESSION["s_id"]=="2"){
  echo "<li ><a href=\"./Index.php\" style=\"color:black\">หน้าแรก</a></li><hr>";
  echo "<li ><a href=\"./edit_profile.php\" style=\"color:black\">แก้ไขข้อมูลส่วนตัว</a></li><hr>";
  echo "<li ><a href=\"./book_builing.php\" style=\"color:black\">ขอจองสถานที่</a></li><hr>";
  echo "<li ><a href=\"./Booking_list.php\" style=\"color:black\">รายการการจอง</a></li><hr>";
}
elseif ($_SESSION["s_id"]=="3"){
  echo "<li ><a href=\"./Index.php\" style=\"color:black\">หน้าแรก</a></li><hr>";
  echo "<li ><a href=\"./edit_profile.php\" style=\"color:black\">แก้ไขข้อมูลส่วนตัว</a></li><hr>";
  echo "<li ><a href=\"./book_builing.php\" style=\"color:black\">ขอจองสถานที่</a></li><hr>";
  echo "<li ><a href=\"./Booking_list.php?station=2\" style=\"color:black\">รายการการจอง</a></li><hr>";
  echo "<li ><a href=\"./Booking_list.php?station=1\" style=\"color:black\">รายการการจองของนิสิต</a></li><hr>";
}
elseif ($_SESSION["s_id"]=="4"){
  echo "<li ><a href=\"./Index.php\" style=\"color:black\">หน้าแรก</a></li><hr>";
  echo "<li ><a href=\"./edit_profile.php\" style=\"color:black\">แก้ไขข้อมูลส่วนตัว</a></li><hr>";
  echo "<li ><a href=\"./Booking_list.php?station=3\" style=\"color:black\">รายการการจอง</a></li><hr>";
}

?>
</-------------------------------------------------------------------------------->
</td>
</table>
</td>
  <td bgcolor="white" valign = "top">
