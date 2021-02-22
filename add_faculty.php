<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">เพิ่มข้อมูลคณะ</p></center>
<center><table width="50%">
<form action = "./insert_faculty.php" method="post">
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อคณะ : </td> <td style="color:red"><input type = "text" name = "faculty_name" style="width:250px;"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_faculty.php';return false;">ยกเลิก</button></td>
    </tr>
    <td>&nbsp;</td>
</center>
</form>
</table>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
