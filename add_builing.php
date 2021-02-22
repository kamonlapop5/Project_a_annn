<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">เพิ่มข้อมูลตึก</p></center>
<center><table width="50%">
<form action = "./insert_builing.php" method="post">
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อตึก : </td> <td style="color:red"><input type = "text" name = "b_name"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_builing.php';return false;">ยกเลิก</button></td>
    </tr>
    <td>&nbsp;</td>
</center>
</form>
</table>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
