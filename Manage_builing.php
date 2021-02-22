<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
?>
    <br><h2 class="well"><center>จัดการข้อมูลตึก</center></h2>
    <div class="col-lg-12 well">
        <p align="right"><a href="./add_builing.php" class="btn btn-success glyphicon glyphicon-plus">เพิ่มข้อมูล</a></p>
      <table id= "example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="bg-info text-center"><h4><center>ลำดับ</center></h4></th>
            <th class="bg-info text-center"><h4><center>ชื่อตึก</center></h4></th>
            <th class="bg-info text-center"><center><h4>การจัดการ</h4></center></th>
          </tr>
        </thead>
        <tbody>
<?php
$sql = "select * from builing ";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $i = $i+1;
  $b_id = $row['b_id'];
  $b_name = $row['b_name'];
  echo "<tr>";
  echo "<td><center><h6>$i</h6></center></td>";
  echo "<td><center><h6>$b_name</h6></center></td>";
  echo "<td><center><h6><a href=\"./edit_builing.php?b_id=$b_id\">แก้ไข</a>
        <a href=\"./delete_builing.php?id=$b_id\" onClick=\"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');\">ลบ</a></center></h6</td> ";
  echo "</tr>";
  }
  if ($i < 1) {
    echo "<td colspan=\"3\"><center><h6>ไม่มีข้อมูล</h6></center></td>";
  }
  echo "</tbody>";
  echo "</table>";
  $mysqli -> close();
   ?>
<?php
include("./footer.php");
 ?>
