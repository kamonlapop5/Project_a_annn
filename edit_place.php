<?php
include("./header.php");
include("./menu.php");
include("./connect.php");

  $id = $_GET['b_id'];
  $sql = "select * from place inner join builing on place.b_id = builing.b_id where place.p_id = '$id'";
  $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
  $i=0;
  while ($row = mysqli_fetch_array($result)) {
    $i = $i+1;
    $p_id = $row["p_id"];
    $p_name = $row['p_name'];
    $b_name = $row['b_name'];
  }
?>
<br>
 <center ><p style="font-size:25px;">แก้ไขข้อมูลสถานที่</p></center>
 <center><table width="50%">
 <form action = "./update_place.php" method="post">
   <input type = "hidden" name = "p_id" value = "<?php echo $p_id ; ?>">
   <td>&nbsp;</td>
   <tr>
     <td>ชื่อตึก : </td> <td><select name="b_id" style="width:200px;">
       <?php
       $i = 0;
       $sql = "SELECT * FROM builing ";
           // $sql = "select Line_ID from line where Line_Name = '$Line_name'";
           $result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
           while($row = mysqli_fetch_array($result)) {
             $i = $i+1;
             $b_id_data = $row["b_id"];
             $b_name_data = $row["b_name"];
             if ($b_name_data == $b_name) {
               ?>
               <option selected value="<?php echo $b_id_data ; ?>"><?php echo $b_name_data;?></option>
               <?php
             }else {
               ?>
               <option value="<?php echo $b_id_data ; ?>"><?php echo $b_name_data;?></option>
               <?php
           }
           if ($i < 1) {
             ?>
             <option value="0">ไม่มีข้อมูลตึก</option>
             <?php
           }
         }
           ?>
           </select><br>
         </td>
   </tr>
     <td>&nbsp;</td>
     <tr>
       <td>สถานที่ : </td> <td style="color:red"><input type = "text" name = "p_name" value = "<?php echo $p_name ; ?>"> * </td>
     </tr>
     <td>&nbsp;</td>
     <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='Manage_place.php';return false;">ยกเลิก</button></td>
    </tr>
</table>
</center>
</form>
<?php
include("./footer.php");
 ?>
