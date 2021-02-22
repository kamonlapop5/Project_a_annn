<?php
include("./header.php");
include("./menu.php");
include("./connect.php");

  $id = $_GET['id'];
  $sql = "select * from major inner join faculty on major.faculty_id = faculty.faculty_id where major.ma_id = '$id'";
  $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
  $i=0;
  while ($row = mysqli_fetch_array($result)) {
    $i = $i+1;
    $ma_id = $row["ma_id"];
    $ma_name = $row['ma_name'];
    $faculty_name = $row['faculty_name'];
  }
?>
<br>
 <center ><p style="font-size:25px;">แก้ไขข้อมูลสาขา</p></center>
 <center><table width="30%">
 <form action = "./update_major.php" method="post">
   <input type = "hidden" name = "ma_id" value = "<?php echo $ma_id ; ?>">
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
             if ($faculty_name == $faculty_name_data) {
               ?>
               <option selected value="<?php echo $faculty_id_data ; ?>"><?php echo $faculty_name_data;?></option>
               <?php
             }else {
               ?>
               <option value="<?php echo $faculty_id_data ; ?>"><?php echo $faculty_name_data;?></option>
               <?php
           }
           if ($i < 1) {
             ?>
             <option value="0">ไม่มีข้อมูลคณะ</option>
             <?php
           }
         }
           ?>
           </select><br>
         </td>
   </tr>
     <td>&nbsp;</td>
     <tr>
       <td>ชื่อสาขา : </td> <td style="color:red"><input style="width:250px;" type = "text" name = "ma_name" value = "<?php echo $ma_name ; ?>"> * </td>
     </tr>
     <td>&nbsp;</td>
     <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_major.php';return false;">ยกเลิก</button></td>
    </tr>
</table>
</center>
</form>
<?php
include("./footer.php");
 ?>
