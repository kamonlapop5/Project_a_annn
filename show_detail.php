<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<?php
$f_id = $_GET["f_id"];
$s_id = $_SESSION["s_id"];
$m_id1 = $_SESSION["m_id"];

$sql = "SELECT * FROM `form` INNER JOIN builing on form.b_id = builing.b_id INNER JOIN place on place.p_id = form.p_id
INNER JOIN time on time.time_id = form.time_id INNER JOIN status on status.s_id = form.f_status_advisor WHERE f_id = '$f_id' ";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $sql1 = "SELECT * FROM `form` INNER JOIN status on status.s_id = form.f_status_facility_staff WHERE f_id = '$f_id' ";
  $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
  $row1 = mysqli_fetch_array($result1);
  $i = $i+1;
  $p_name = $row['p_name'];
  $b_name = $row['b_name'];
  $m_id2 = $row['m_id'];
  $f_date = $row['f_date'];
  $time = $row['time'];
  $f_detail = $row['f_detail'];
  $f_detail_no_submit = $row['f_detail_no_submit'];
  $f_status_advisor = $row['f_status_advisor'];
  $f_status_advisor_name = $row['s_name'];
  $f_status_facility_staff_name = $row1['s_name'];
  $f_status_facility_staff = $row['f_status_facility_staff'];

}
 ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">รายละเอียดการจอง</p></center>
<center><table width="50%">
  <form action = "./update_form.php" method="post">
    <input hidden type="text" name="f_id" value="<?php echo "$f_id" ?>">
    <input hidden type="text" name="s_id" value="<?php echo "$s_id" ?>">
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อตึก : </td> <td><?php echo "$b_name" ?></td>
    </tr>
    <td>&nbsp;</td>

    <tr>
      <td>ชื่อสถานที : </td> <td><?php echo "$p_name" ?></td>
    </tr>
    <td>&nbsp;</td>

    <tr>
      <td>วันที่ต้องการจอง : </td>  <td><?php echo "$f_date" ?></td>
    </tr>
    <td>&nbsp;</td>

    <tr>
      <td>เวลาต้องการจอง : </td> <td><?php echo "$time" ?></td>
         </tr>
    <td>&nbsp;</td>

    <tr>
      <td>รายละเอียดการจอง : </td> <td><?php echo "$f_detail" ?></td>
     </tr>
    <td>&nbsp;</td>

    <?php if ($f_status_advisor == 202){ ?>
      <tr>
        <td>ผลอนุมัติของอาจารย์ที่ปรึกษา : </td> <td><font color="green"><?php echo "$f_status_advisor_name" ?></font></td>
       </tr>
      <td>&nbsp;</td>
    <?php }elseif ($f_status_advisor == 203) { ?>
      <tr>
        <td>ผลอนุมัติของอาจารย์ที่ปรึกษา : </td> <td><font color="red"><?php echo "$f_status_advisor_name" ?></font></td>
       </tr>
      <td>&nbsp;</td>
    <?php }else { ?>
      <tr>
        <td>ผลอนุมัติของผูอาจารย์ที่ปรึกษา : </td> <td><?php echo "$f_status_advisor_name" ?></td>
       </tr>
      <td>&nbsp;</td>
    <?php } ?>


    <?php if ($f_status_facility_staff == 202){ ?>
      <tr>
        <td>ผลอนุมัติของผู้ดูแลสถานที่ : </td> <td><font color="green"><?php echo "$f_status_facility_staff_name" ?></font></td>
       </tr>
      <td>&nbsp;</td>
    <?php }elseif ($f_status_facility_staff == 203) { ?>
      <tr>
        <td>ผลอนุมัติของผู้ดูแลสถานที่ : </td> <td><font color="red"><?php echo "$f_status_facility_staff_name" ?></font></td>
       </tr>
      <td>&nbsp;</td>
    <?php }else { ?>
      <tr>
        <td>ผลอนุมัติของผู้ดูแลสถานที่ : </td> <td><?php echo "$f_status_facility_staff_name" ?></td>
       </tr>
      <td>&nbsp;</td>
    <?php } ?>

    <?php if ($s_id == 2){
            if ($f_status_advisor == 203 or $f_status_facility_staff == 203) {?>
                <tr>
                <td>หมายเหตุ : </td> <td><?php echo "$f_detail_no_submit" ?></textarea></td>
                </tr>
                <td>&nbsp;</td>
                <tr>
                  <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station';return false;">ย้อนกลับ</button></td>
                </tr>
                <td>&nbsp;</td>
    <?php }else { ?>
      <tr>
        <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station';return false;">ย้อนกลับ</button></td>
      </tr>
      <td>&nbsp;</td>
    <?php }
  } ?>

  <?php if ($s_id == 3){
          if ($f_status_advisor == 203 or $f_status_facility_staff == 203) {?>
              <tr>
              <td>หมายเหตุ : </td> <td><?php echo "$f_detail_no_submit" ?></textarea></td>
              </tr>
              <td>&nbsp;</td>
              <tr>
                <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station=1';return false;">ย้อนกลับ</button></td>
              </tr>
              <td>&nbsp;</td>
  <?php }elseif ($f_status_advisor == 201) { ?>
    <tr>
          <td>หมายเหตุ (กรณีที่ไม่อนุมัติ) : </td> <td><textarea rows="5" cols="30" name="detail_no_submit" ></textarea></td>
         </tr>
        <td>&nbsp;</td>
        <tr>
          <td align="center"><button style="background-color:E98989" type="submit" name = 'submit' value="1">อนุมัติ</td>
          <td align="center"><button type="submit" style="background-color:FF0000" name = 'no_submit' value="2">ไม่อนุมัติ</button></td>
          <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station=1';return false;">ยกเลิก</button></td>
        </tr>
        <td>&nbsp;</td>
      <?php }elseif ($f_status_advisor != 201 and $m_id1 == $m_id2) { ?>
            <tr>
              <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station=2';return false;">ย้อนกลับ</button></td>
            </tr>
            <td>&nbsp;</td>
      <?php   }else { ?>
        <tr>
          <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station=1';return false;">ย้อนกลับ</button></td>
        </tr>
        <td>&nbsp;</td>
    <?php   }
        } ?>

        <?php if ($s_id == 4){
                if ($f_status_facility_staff == 203) {?>
                    <tr>
                    <td>หมายเหตุ : </td> <td><?php echo "$f_detail_no_submit" ?></textarea></td>
                    </tr>
                    <td>&nbsp;</td>
                    <tr>
                      <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station=3';return false;">ย้อนกลับ</button></td>
                    </tr>
                    <td>&nbsp;</td>
        <?php }elseif ($f_status_facility_staff == 201) { ?>
          <tr>
                <td>หมายเหตุ (กรณีที่ไม่อนุมัติ) : </td> <td><textarea rows="5" cols="30" name="detail_no_submit" ></textarea></td>
               </tr>
              <td>&nbsp;</td>
              <tr>
                <td align="center"><button style="background-color:E98989" type="submit" name = 'submit' value="1">อนุมัติ</td>
                <td align="center"><button type="submit" style="background-color:FF0000" name = 'no_submit' value="2">ไม่อนุมัติ</button></td>
                <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station=3';return false;">ยกเลิก</button></td>
              </tr>
              <td>&nbsp;</td>
        <?php }else { ?>
              <tr>
                <td align="right"><button type="cancel" style="background-color:BCB684" onclick="window.location='Booking_list.php?station=3';return false;">ย้อนกลับ</button></td>
              </tr>
              <td>&nbsp;</td>
            <?php   }
              } ?>

</center>
</form>
</table>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
