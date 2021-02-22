<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">เพิ่มข้อมูลสาขา</p></center>
<center><table width="30%">
<form action = "./insert_major.php" method="post">
  <td>&nbsp;</td>
  <tr>
    <td>ชื่อคณะ : </td> <td><select name="faculty_id" style="width:250px;">
      <?php
      $i = 0;
      $sql = "SELECT * FROM faculty ";
          // $sql = "select Line_ID from line where Line_Name = '$Line_name'";
          $result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
          while($row = mysqli_fetch_array($result)) {
            $i = $i+1;
            $faculty_id_data = $row["faculty_id"];
            $faculty_name_data = $row["faculty_name"];
              ?>
              <option value="<?php echo $faculty_id_data ; ?>"><?php echo $faculty_name_data;?></option>
              <?php
          }
          if ($i < 1) {
            ?>
            <option value="0">ไม่มีข้อมูลคณะ</option>
            <?php
          }
          ?>
          </select><br>
        </td>
  </tr>
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อสาขา : </td> <td style="color:red"><input style="width:250px;" type = "text" name = "major_name"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_major.php';return false;">ยกเลิก</button></td>
    </tr>
    <td>&nbsp;</td>
</center>
</form>
</table>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
