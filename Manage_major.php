<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
?>
    <br><h2 class="well"><center>จัดการข้อมูลสาขา</center></h2>
    <div class="col-lg-12 well">
        <p align="right"><a href="./add_major.php" class="btn btn-success glyphicon glyphicon-plus">เพิ่มข้อมูล</a></p>
      <table id= "example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="bg-info text-center"><h4><center>ลำดับ</center></h4></th>
            <th class="bg-info text-center"><h4><center>ชื่อคณะ</center></h4></th>
            <th class="bg-info text-center"><h4><center>ชื่อสาขา</center></h4></th>
            <th class="bg-info text-center"><center><h4>การจัดการ</h4></center></th>
          </tr>
        </thead>
        <tbody>
<?php
$sql = "select * from major inner join faculty on major.faculty_id = faculty.faculty_id";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $i = $i+1;
  $ma_id = $row['ma_id'];
  $ma_name = $row['ma_name'];
  $faculty_name = $row['faculty_name'];
  echo "<tr>";
  echo "<td><center><h6>$i</h6></center></td>";
  echo "<td><center><h6>$faculty_name</h6></center></td>";
  echo "<td><center><h6>$ma_name</h6></center></td>";
  echo "<td><center><h6><a href=\"./edit_major.php?id=$ma_id\">แก้ไข</a>
        <a href=\"./delete_major.php?id=$ma_id\" onClick=\"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');\">ลบ</a></center></h6</td> ";
  echo "</tr>";
  }
  if ($i < 1) {
    echo "<td colspan=\"4\"><center><h6>ไม่มีข้อมูล</h6></center></td>";
  }
  echo "</tbody>";
  echo "</table>";
  $mysqli -> close();
   ?>
<?php
include("./footer.php");
 ?>
