<?php
include("./header.php");
include("./menu.php");
include("./connect.php");

  $id = $_GET['b_id'];
  $sql = "select * from builing where b_id = '$id'";
  $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
  $i=0;
  while ($row = mysqli_fetch_array($result)) {
    $i = $i+1;
    $b_id = $row["b_id"];
    $b_name = $row['b_name'];
  }
?>
<br>
 <center ><p style="font-size:25px;">แก้ไขข้อมูลตึก</p></center>
<form action ="update_builing.php" method="post" name="frm">
  <center><table width="50%">
    <input type="hidden" name="b_id" value='<?php echo "$b_id"; ?>'>
    <tr>
      <td><center>ชื่อตึก : </center></td> <td style="color:red"><input type = "text"  name = "b_name" value="<?php echo $b_name;?>"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_builing.php';return false;">ยกเลิก</button></td>
    </tr>
</table>
</center>
</form>
<?php
include("./footer.php");
 ?>
