<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<?php
$b_id = $_GET["b_id"];
$p_id = $_GET["p_id"];
$time_id = $_GET["time"];
$date = $_GET["date"];
$month = $_GET["month"];
$year = $_GET["year"];
$all_date = "$date"." - "."$month"." - "."$year";


$sql = "select * from builing inner join place on builing.b_id = place.b_id where builing.b_id = '$b_id'";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $i = $i+1;
  $p_id = $row['p_id'];
  $p_name = $row['p_name'];
  $b_name = $row['b_name'];
}

$sql = "select * from time where time_id = '$time_id'";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $i = $i+1;
  $time = $row['time'];
}
 ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">กรอกข้อมูลเพิ่มเติมเกี่ยวกับการจอง</p></center>
<center><table width="50%">
<form action = "./insert_place_reservation.php" method="post">
  <input hidden type="text" name="b_id" value="<?php echo "$b_id" ?>">
  <input hidden type="text" name="p_id" value="<?php echo "$p_id" ?>">
  <input hidden type="text" name="time" value="<?php echo "$time_id" ?>">
  <input hidden type="text" name="date" value="<?php echo "$all_date" ?>">
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อตึก : </td> <td><?php echo "$b_name" ?></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อสถานที่ : </td> <td><?php echo "$p_name" ?></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>วันที่ต้องการจอง : </td>  <td><?php echo "$all_date" ?></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>เวลาต้องการจอง : </td> <td><?php echo "$time" ?></td>
         </tr>
    <td>&nbsp;</td>
    <tr>
      <td>รายละเอียดการจอง : </td> <td style="color:red"><textarea rows="4" cols="50" name="detail"></textarea> * </td>
     </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:E98989" type="submit" value="บันทึก"></td>
      <td><button type="cancel" style="background-color:BCB684" onclick="window.location='index.php';return false;">ยกเลิก</button></td>
    </tr>
    <td>&nbsp;</td>
</center>
</form>
</table>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
