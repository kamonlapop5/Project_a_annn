<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
?>
<?php
$b_id = $_GET["b_id"];
$sql = "select * from builing where b_id = '$b_id'";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $i = $i+1;
  $b_name = $row['b_name'];
}
 ?>
    <br><h2 class="well"><center>เลือกสถานที่ที่ต้องการจองของตึก <?php echo "$b_name" ?></center></h2>
    <div class="col-lg-12 well">
      <table id= "example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="bg-info text-center"><h4><center>ลำดับ</center></h4></th>
            <th class="bg-info text-center"><h4><center>สถานที่</center></h4></th>
            <th class="bg-info text-center"><center><h4>การจัดการ</h4></center></th>
          </tr>
        </thead>
        <tbody>
<?php
$sql = "select * from place where b_id = '$b_id'";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $i = $i+1;
  $p_id = $row['p_id'];
  $p_name = $row['p_name'];
  $b_name = $row['b_name'];
  echo "<tr>";
  echo "<td><center><h6>$i</h6></center></td>";
  echo "<td><center><h6>$p_name</h6></center></td>";
  echo "<td><center><h6><a href=\"./book_place_reservation.php?p_id=$p_id&b_id=$b_id\">จอง</a></center></h6</td> ";
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
