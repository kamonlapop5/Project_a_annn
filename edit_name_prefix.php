<?php
include("./header.php");
include("./menu.php");
include("./connect.php");

  $id = $_GET['id'];
  $sql = "select * from title where t_id = '$id'";
  $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
  $i=0;
  while ($row = mysqli_fetch_array($result)) {
    $i = $i+1;
    $t_id = $row["t_id"];
    $t_name = $row['t_name'];
  }
?>
<br>
 <center ><p style="font-size:25px;">แก้ไขข้อมูลคำนำหน้าชื่อ</p></center>
<form action ="update_prefix.php" method="post" name="frm">
  <center><table width="50%">
    <input type="hidden" name="id" value='<?php echo "$t_id"; ?>'>
    <tr>
      <td><center>คำนำหน้าชื่อ : </center></td>
      <td style="color:red"><input type="text" name="prefix" value='<?php echo "$t_name"; ?>'> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_name_prefix.php';return false;">ยกเลิก</button></td>
    </tr>
</table>
</center>
</form>
<?php
include("./footer.php");
 ?>
