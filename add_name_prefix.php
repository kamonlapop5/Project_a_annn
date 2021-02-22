<?php
include("./header.php");
include("./menu.php");
 ?>
</-------------------------------------------------------------------------------->
 <br><center><p style="font-size:25px;">เพิ่มคำนำหน้าชื่อ</p></center>
<form action ="insert_prefix.php" method="post" name="frm">
  <center><table width="50%">
    <tr>
      <td><center>คำนำหน้าชื่อ : </center></td>
      <td style="color:red"><input type="text" name="prefix"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_name_prefix.php';return false;">ยกเลิก</button></td>
    </tr>
</table>
</center>
</form>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
