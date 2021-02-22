<?php
include("./header.php");
include("./menu.php");
include("connect.php");
 ?>
<!------------------------------------------------------>

<form action="./insert_apply_member.php" method="post">
<br><br><table align="center" border="5" width="50%"  height="30">
<tr>
  <td>
<input type="hidden" name="m_id"><br>
ชื่อบัญชี : <input type ="text" name="m_username"><br>
รหัสผ่าน : <input type ="text" name="m_password"><br>
ชื่อ :<input type="text" name="m_fname"><br>
นามสกุล :<input type="text" name="m_lname"><br>
เบอร์โทรศัพท์ : <input type ="text" name="m_phone"><br>
อีเมล์ : <input type ="text" name="m_email"><br>
สถานะ : <select name="s_id">
<option value="2">สมาชิก</option>
<option value="3">เจ้าของที่พัก</option> </select>
<br><button type="submit" class="btn btn-success">บันทึก</button>
<button  href="login.php" role="button" class="btn btn-danger">ยกเลิก</button></center>
<p><b>NOTE : กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนบันทึก </p></b>
</td>
</tr>
</table>
</form>
 ?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
