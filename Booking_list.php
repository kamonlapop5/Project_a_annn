<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
?>
<?php
$m_id = $_SESSION["m_id"];
$s_id = $_SESSION["s_id"];
$station = $_GET["station"];
 ?>

    <?php if ($s_id == 2){ ?>
            <br><h2 class="well"><center>รายการการจอง</center></h2>
    <?php }elseif ($s_id == 3 and $station == 1){?>
            <br><h2 clas s="well"><center>รายการการจองของนิสิต</center></h2>
    <?php }elseif ($s_id == 3 and $station == 2){?>
            <br><h2 class="well"><center>รายการการจอง</center></h2>
    <?php }elseif ($s_id == 4 and $station == 3){?>
            <br><h2 class="well"><center>รายการการจอง</center></h2>
    <?php }?>
    <div class="col-lg-12 well">
      <?php if ($s_id == 2 or $station == 2): ?>
      <p align="right"><a href="./book_builing.php" class="btn btn-success glyphicon glyphicon-plus">เพิ่มข้อมูลการจอง</a></p>
    <?php endif; ?>
      <table id= "example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <?php if ($s_id == 2){ ?>
              <th class="bg-info text-center"><h5><center>ลำดับ</center></h5></th>
              <th class="bg-info text-center"><h5><center>ตึก</center></h5></th>
              <th class="bg-info text-center"><h5><center>สถานที่</center></h5></th>
              <th class="bg-info text-center"><h5><center>วันที่</center></h5></th>
              <th class="bg-info text-center"><h5><center>เวลา</center></h5></th>
              <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>อาจารย์ที่ปรึกษา</center></h5></th>
              <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>ผู้ดูแลสถานที่</center></h5></th>
              <th class="bg-info text-center"><center><h5>การจัดการ</h5></center></th>
            <?php }elseif ($s_id == 3 and $station == 1){?>
              <th class="bg-info text-center"><h5><center>ลำดับ</center></h5></th>
              <th class="bg-info text-center"><h5><center>นิสิตที่ต้องการจอง</center></h5></th>
              <th class="bg-info text-center"><h5><center>ตึก</center></h5></th>
              <th class="bg-info text-center"><h5><center>สถานที่</center></h5></th>
              <th class="bg-info text-center"><h5><center>วัน</center></h5></th>
              <th class="bg-info text-center"><h5><center>เวลา</center></h5></th>
              <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>อาจารย์ที่ปรึกษา</center></h5></th>
              <!-- <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>ผู้ดูแลสถานที่</center></h5></th> -->
              <th class="bg-info text-center"><center><h5>การจัดการ</h5></center></th>
            <?php }elseif ($s_id == 3 and $station == 2){?>
              <th class="bg-info text-center"><h5><center>ลำดับ</center></h5></th>
              <!-- <th class="bg-info text-center"><h5><center>นิสิตที่ต้องการจอง</center></h5></th> -->
              <th class="bg-info text-center"><h5><center>ตึก</center></h5></th>
              <th class="bg-info text-center"><h5><center>สถานที่</center></h5></th>
              <th class="bg-info text-center"><h5><center>วัน</center></h5></th>
              <th class="bg-info text-center"><h5><center>เวลา</center></h5></th>
              <!-- <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>อาจารย์ที่ปรึกษา</center></h5></th> -->
              <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>ผู้ดูแลสถานที่</center></h5></th>
              <th class="bg-info text-center"><center><h5>การจัดการ</h5></center></th>
            <?php }elseif ($s_id == 4 and $station == 3){?>
              <th class="bg-info text-center"><h5><center>ลำดับ</center></h5></th>
              <th class="bg-info text-center"><h5><center>ชื่อผู้ที่ต้องการจอง</center></h5></th>
              <th class="bg-info text-center"><h5><center>ตึก</center></h5></th>
              <th class="bg-info text-center"><h5><center>สถานที่</center></h5></th>
              <th class="bg-info text-center"><h5><center>วัน</center></h5></th>
              <th class="bg-info text-center"><h5><center>เวลา</center></h5></th>
              <!-- <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>อาจารย์ที่ปรึกษา</center></h5></th> -->
              <th class="bg-info text-center"><h5><center>ผลอนุมัติของ<br>ผู้ดูแลสถานที่</center></h5></th>
              <th class="bg-info text-center"><center><h5>การจัดการ</h5></center></th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
<?php
$sql = "SELECT * FROM member WHERE m_id = '$m_id' ";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$row = mysqli_fetch_array($result);
$m_faculty_id = $row['faculty_id'];

if ($s_id == '2') {
  $sql = "SELECT * FROM `form` INNER JOIN builing on form.b_id = builing.b_id INNER JOIN place on place.p_id = form.p_id
  INNER JOIN time on time.time_id = form.time_id INNER JOIN status on status.s_id = form.f_status_advisor WHERE m_id = '$m_id' ";
  $result = $mysqli -> query($sql) or die($mysqli->error.__line__);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $f_id = $row['f_id'];
    $sql1 = "SELECT * FROM `form` INNER JOIN status on status.s_id = form.f_status_facility_staff WHERE f_id = '$f_id' ";
    $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
    $row1 = mysqli_fetch_array($result1);
    $i = $i+1;
    $b_name = $row['b_name'];
    $f_date = $row['f_date'];
    $p_name = $row['p_name'];
    $f_status_advisor = $row['f_status_advisor'];
    $f_status_advisor_name = $row['s_name'];
    $f_status_facility_staff_name = $row1['s_name'];
    $f_status_facility_staff = $row['f_status_facility_staff'];
    $time = $row['time'];

    echo "<tr>";
    echo "<td><center><h7>$i</h7></center></td>";
    echo "<td><center><h7>$b_name</h7></center></td>";
    echo "<td><center><h7>$p_name</h7></center></td>";
    echo "<td><center><h7>$f_date</h7></center></td>";
    echo "<td><center><h7>$time</h7></center></td>";
    if ($f_status_advisor == 202){
      echo "<td><center><font color=\"green\"><h7>$f_status_advisor_name</h7></center></td>";
    }elseif ($f_status_advisor == 203) {
      echo "<td><center><font color=\"red\"><h7>$f_status_advisor_name</h7></center></td>";
    }else {
      echo "<td><center><h7>$f_status_advisor_name</h7></center></td>";
    }

    if ($f_status_facility_staff == 202){
      echo "<td><center><font color=\"green\"><h7>$f_status_facility_staff_name</h7></center></td>";
    }elseif ($f_status_facility_staff == 203) {
      echo "<td><center><font color=\"red\"><h7>$f_status_facility_staff_name</h7></center></td>";
    }else {
      echo "<td><center><h7>$f_status_facility_staff_name</h7></center></td>";
    }


    if ($f_status_advisor == '201') {
      echo "<td><center><h7><a href=\"./show_detail.php?f_id=$f_id\">รายละเอียด</a>
            <a href=\"./delete_book_list.php?f_id=$f_id\" onClick=\"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');\">ลบ</a></center></h6</td> ";
      echo "</tr>";
    }else {
      echo "<td><center><h7><a href=\"./show_detail.php?f_id=$f_id\">รายละเอียด</a></center></h6</td> ";
      echo "</tr>";
    }
    }
}elseif ($s_id == '3' and $station == 1){
  $sql = "SELECT * FROM `form` INNER JOIN builing on form.b_id = builing.b_id INNER JOIN place on place.p_id = form.p_id INNER JOIN time on time.time_id = form.time_id
  INNER JOIN status on status.s_id = form.f_status_advisor INNER JOIN member on member.m_id = form.m_id WHERE member.faculty_id = '$m_faculty_id' and member.s_id = '2'";
  $result = $mysqli -> query($sql) or die($mysqli->error.__line__);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $f_id = $row['f_id'];
    $sql1 = "SELECT * FROM `form` INNER JOIN status on status.s_id = form.f_status_facility_staff WHERE f_id = '$f_id' ";
    $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
    $row1 = mysqli_fetch_array($result1);
    $i = $i+1;
    $b_name = $row['b_name'];
    $f_date = $row['f_date'];
    $p_name = $row['p_name'];
    $m_fname = $row['m_fname'];
    $m_lname = $row['m_lname'];
    $f_status_advisor = $row['f_status_advisor'];
    $f_status_advisor_name = $row['s_name'];
    $f_status_facility_staff_name = $row1['s_name'];
    $f_status_facility_staff = $row1['f_status_facility_staff'];
    $time = $row['time'];
    $full_name = "$m_fname"." "."$m_lname";

    echo "<tr>";
    echo "<td><center><h7>$i</h7></center></td>";
    echo "<td><center><h7>$full_name</h7></center></td>";
    echo "<td><center><h7>$b_name</h7></center></td>";
    echo "<td><center><h7>$p_name</h7></center></td>";
    echo "<td><center><h7>$f_date</h7></center></td>";
    echo "<td><center><h7>$time</h7></center></td>";

    if ($f_status_advisor == 202){
      echo "<td><center><font color=\"green\"><h7>$f_status_advisor_name</h7></center></td>";
    }elseif ($f_status_advisor == 203) {
      echo "<td><center><font color=\"red\"><h7>$f_status_advisor_name</h7></center></td>";
    }else {
      echo "<td><center><h7>$f_status_advisor_name</h7></center></td>";
    }
    //
    // if ($f_status_facility_staff == 202){
    //   echo "<td><center><font color=\"green\"><h7>$f_status_facility_staff_name</h7></center></td>";
    // }elseif ($f_status_facility_staff == 203) {
    //   echo "<td><center><font color=\"red\"><h7>$f_status_facility_staff_name</h7></center></td>";
    // }else {
    //   echo "<td><center><h7>$f_status_facility_staff_name</h7></center></td>";
    // }

    if ($f_status_advisor == 201 and $s_id == 2) {
      echo "<td><center><h7><a href=\"./show_detail.php?f_id=$f_id\">รายละเอียด</a><a href=\"./delete_book_list.php?f_id=$f_id\"> ลบ</a></center></h6</td> ";
    }else {
      echo "<td><center><h7><a href=\"./show_detail.php?f_id=$f_id\">รายละเอียด</a></center></h6</td> ";
    }
    echo "</tr>";
    }
}elseif ($s_id == '3' and $station == 2) {
  $sql = "SELECT * FROM `form` INNER JOIN builing on form.b_id = builing.b_id INNER JOIN place on place.p_id = form.p_id INNER JOIN time on time.time_id = form.time_id
  INNER JOIN status on status.s_id = form.f_status_advisor INNER JOIN member on member.m_id = form.m_id WHERE form.m_id = '$m_id'";
  $result = $mysqli -> query($sql) or die($mysqli->error.__line__);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $f_id = $row['f_id'];
    $sql1 = "SELECT * FROM `form` INNER JOIN status on status.s_id = form.f_status_facility_staff WHERE f_id = '$f_id' ";
    $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
    $row1 = mysqli_fetch_array($result1);
    $i = $i+1;
    $b_name = $row['b_name'];
    $f_date = $row['f_date'];
    $p_name = $row['p_name'];
    $m_fname = $row['m_fname'];
    $m_lname = $row['m_lname'];
    $f_status_facility_staff_name = $row1['s_name'];
    $f_status_facility_staff = $row1['f_status_facility_staff'];
    $time = $row['time'];
    $full_name = "$m_fname"." "."$m_lname";

    echo "<tr>";
    echo "<td><center><h7>$i</h7></center></td>";
    // echo "<td><center><h7>$full_name</h7></center></td>";
    echo "<td><center><h7>$b_name</h7></center></td>";
    echo "<td><center><h7>$p_name</h7></center></td>";
    echo "<td><center><h7>$f_date</h7></center></td>";
    echo "<td><center><h7>$time</h7></center></td>";

    // if ($f_status_advisor == 202){
    //   echo "<td><center><font color=\"green\"><h7>$f_status_advisor_name</h7></center></td>";
    // }elseif ($f_status_advisor == 203) {
    //   echo "<td><center><font color=\"red\"><h7>$f_status_advisor_name</h7></center></td>";
    // }else {
    //   echo "<td><center><h7>$f_status_advisor_name</h7></center></td>";
    // }

    if ($f_status_facility_staff == 202){
      echo "<td><center><font color=\"green\"><h7>$f_status_facility_staff_name</h7></center></td>";
    }elseif ($f_status_facility_staff == 203) {
      echo "<td><center><font color=\"red\"><h7>$f_status_facility_staff_name</h7></center></td>";
    }else {
      echo "<td><center><h7>$f_status_facility_staff_name</h7></center></td>";
    }

    if ($f_status_facility_staff == 201) {
      echo "<td><center><h7><a href=\"./show_detail.php?f_id=$f_id\">รายละเอียด</a><a href=\"./delete_book_list.php?f_id=$f_id\" onClick=\"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');\"> ลบ</a></center></h6</td> ";
    }else {
      echo "<td><center><h7><a href=\"./show_detail.php?f_id=$f_id\">รายละเอียด</a></center></h6</td> ";
    }
    echo "</tr>";
    }
}elseif ($s_id == '4' and $station == 3) {
  $sql = "SELECT * FROM `form` INNER JOIN builing on form.b_id = builing.b_id INNER JOIN place on place.p_id = form.p_id INNER JOIN time on time.time_id = form.time_id
  INNER JOIN status on status.s_id = form.f_status_advisor INNER JOIN member on member.m_id = form.m_id WHERE form.f_status_advisor = '202'";
  $result = $mysqli -> query($sql) or die($mysqli->error.__line__);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $f_id = $row['f_id'];
    $sql1 = "SELECT * FROM `form` INNER JOIN status on status.s_id = form.f_status_facility_staff WHERE f_id = '$f_id' ";
    $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
    $row1 = mysqli_fetch_array($result1);
    $i = $i+1;
    $b_name = $row['b_name'];
    $f_date = $row['f_date'];
    $p_name = $row['p_name'];
    $m_fname = $row['m_fname'];
    $m_lname = $row['m_lname'];
    $f_status_advisor = $row['f_status_advisor'];
    $f_status_advisor_name = $row['s_name'];
    $f_status_facility_staff_name = $row1['s_name'];
    $f_status_facility_staff = $row1['f_status_facility_staff'];
    $time = $row['time'];
    $full_name = "$m_fname"." "."$m_lname";

    echo "<tr>";
    echo "<td><center><h7>$i</h7></center></td>";
    echo "<td><center><h7>$full_name</h7></center></td>";
    echo "<td><center><h7>$b_name</h7></center></td>";
    echo "<td><center><h7>$p_name</h7></center></td>";
    echo "<td><center><h7>$f_date</h7></center></td>";
    echo "<td><center><h7>$time</h7></center></td>";

    // if ($f_status_advisor == 202){
    //   echo "<td><center><font color=\"green\"><h7>$f_status_advisor_name</h7></center></td>";
    // }elseif ($f_status_advisor == 203) {
    //   echo "<td><center><font color=\"red\"><h7>$f_status_advisor_name</h7></center></td>";
    // }else {
    //   echo "<td><center><h7>$f_status_advisor_name</h7></center></td>";
    // }

    if ($f_status_facility_staff == 202){
      echo "<td><center><font color=\"green\"><h7>$f_status_facility_staff_name</h7></center></td>";
    }elseif ($f_status_facility_staff == 203) {
      echo "<td><center><font color=\"red\"><h7>$f_status_facility_staff_name</h7></center></td>";
    }else {
      echo "<td><center><h7>$f_status_facility_staff_name</h7></center></td>";
    }


    echo "<td><center><h7><a href=\"./show_detail.php?f_id=$f_id\">รายละเอียด</a></center></h6</td> ";
    echo "</tr>";
    }
}

  if ($i < 1 ) {
    echo "<td colspan=\"8\"><center><h7>ไม่มีข้อมูล</h7></center></td>";
  }
  echo "</tbody>";
  echo "</table>";
  $mysqli -> close();
   ?>
<?php
include("./footer.php");
 ?>
