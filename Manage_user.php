<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
?>
    <br><h2 class="well"><center>จัดการข้อมูลสมาชิก</center></h2>
    <div class="col-lg-12 well">
        <p align="right"><a href="./add_user_status.php" class="btn btn-success glyphicon glyphicon-plus">เพิ่มข้อมูล</a></p>
      <table id= "example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="bg-info text-center"><h4><center>ลำดับ</center></h4></th>
            <th class="bg-info text-center"><h4><center>คำนำหน้า</center></h4></th>
            <th class="bg-info text-center"><h4><center>ชื่อ - นามสกุล</center></h4></th>
            <th class="bg-info text-center"><h4><center>สถานะ</center></h4></th>
            <th class="bg-info text-center"><center><h4>การจัดการ</h4></center></th>
          </tr>
        </thead>
        <tbody>
<?php
$sql = "select * from member inner join title on member.t_id = title.t_id inner join status on member.s_id = status.s_id ";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $i = $i+1;
  $m_id = $row['m_id'];
  $m_fname = $row['m_fname'];
  $m_lname = $row['m_lname'];
  $s_id = $row['s_id'];
  $s_name = $row['s_name'];
  $t_name = $row['t_name'];

  echo "<tr>";
  echo "<td><center><h6>$i</h6></center></td>";
  echo "<td><center><h6>$t_name</h6></center></td>";
  echo "<td><center><h6>$m_fname $m_lname</h6></center></td>";
  echo "<td><center><h6>$s_name</h6></center></td>";
  echo "<td><center><h6><a href=\"./edit_user.php?m_id=$m_id&s_id=$s_id\">แก้ไข</a>
        <a href=\"./delete_user.php?id=$m_id\" onClick=\"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');\">ลบ</a></center></h6</td> ";
  echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  $mysqli -> close();
   ?>
<?php
include("./footer.php");
 ?>
