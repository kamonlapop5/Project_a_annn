<?php
include("./header.php");
include("./menu.php");
include("./connect.php");

  $id = $_GET['id'];
  $sql = "select * from faculty where faculty_id = '$id'";
  $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
  $i=0;
  while ($row = mysqli_fetch_array($result)) {
    $i = $i+1;
    $faculty_id = $row["faculty_id"];
    $faculty_name = $row['faculty_name'];
  }
?>
<br>
 <center ><p style="font-size:25px;">แก้ไขข้อมูลคณะ</p></center>
<form action ="update_faculty.php" method="post" name="frm">
  <center><table width="50%">
    <input type="hidden" name="faculty_id" value='<?php echo "$faculty_id"; ?>'>
    <tr>
      <td><center>ชื่อคณะ : </center></td> <td style="color:red"><input type = "text" style="width:250px;" name = "faculty_name" value="<?php echo $faculty_name;?>"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_faculty.php';return false;">ยกเลิก</button></td>
    </tr>
</table>
</center>
</form>
<?php
include("./footer.php");
 ?>
