<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
 </-------------------------------------------------------------------------------->
<?php
  // date_default_timezone_set("Asia/Bangkok");
  $date = date("d");
  $month = date("m");
  $year = date("Y");

  $time = date("H");
  $time = $time + 6;

 $b_id = $_GET["b_id"];
 $p_id = $_GET["p_id"];
 $sql = "select * from builing inner join place on place.b_id = builing.b_id where builing.b_id = '$b_id' and place.p_id = '$p_id'";
 $result = $mysqli -> query($sql) or die($mysqli->error.__line__);
 $i = 0;
 while($row = mysqli_fetch_array($result)){
   $i = $i+1;
   $b_name = $row['b_name'];
   $p_name = $row['p_name'];
 }

 $sql1 = "select * from time";
 $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
 // $row1 = mysqli_fetch_array($result1);
 $i = 0;
 while($row1 = mysqli_fetch_array($result1)){
   $time_database[$i] = $row1['time'];
   $i = $i + 1;
 }

  ?>
     <br><h2 class="well"><center>เลือกวันที่และเวลาที่ต้องการจอง ของตึก <?php echo "$b_name" ?> สถานที่ <?php echo "$p_name" ?></center></h2>
     <div class="col-lg-12 well">
       <table id= "example" class="table table-bordered table-striped table-hover">
         <thead>
           <tr>
             <th class="bg-info text-center"><h4><center>วัน</center></h4></th>
             <th class="bg-info text-center" colspan="3"><h4><center>เวลา</center></h4></th>
           </tr>
         </thead>
         <tbody>
 <?php

 $i = 0;
 $date_sum = $date_sum + $date +1;
 $month = $month + 0 ;
 while($i < 7){
   if ($month == 1 or $month == 3 or $month == 5 or $month == 7 or $month == 8 or $month == 10 or $month == 12) {
     if ($date_sum > 31) {
       $date_sum = "1";
       $month = $month+1;
     }
   }elseif ($month == 4 or $month == 4 or $month == 9 or $month == 11 ) {
       if ($date_sum > 31) {
         $date_sum = "1";
         $month = $month+1;
       }
     }
     if ($month == 2) {
       if ($year % 4 == 0) {
         if ($date_sum > 29) {
           $date_sum = "1";
           $month = $month+1;
       }
     }else {
         if ($date_sum > 28) {
           $date_sum = "1";
           $month = $month+1;
       }
     }
   }
   echo "<tr>";
   $all_date = $date_sum.' - '.$month.' - '.$year;
   echo "<td><center><h6>$all_date</h6></center></td>";


   $sql1 = "select * from form where f_status_facility_staff = 202 and f_date = '$all_date' and b_id = $b_id and p_id = $p_id ORDER BY time_id";
   $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
   // $row1 = mysqli_fetch_array($result1);
   $z = 0;
   while($row1 = mysqli_fetch_array($result1)){
     $date_form_database[$z] = $row1['f_date'];
     $time_form_database[$z] = $row1['time_id'];
     $z = $z + 1;
   }

   $num = 0 ;
   $test = 0;
   while($num < 3){
     if ($time_form_database[$num] == 1) {
         echo "<td style=\"color:red\"><center><h6>$time_database[0]</h6></center></td>";
         $test = 1;
       }
       $num = $num +1;
     }
    if ($test != 1) {
      echo "<td ><a href=\"./add_place_reservation.php?p_id=$p_id&b_id=$b_id&time=1&date=$date_sum&month=$month&year=$year\" style=\"color:green\"><center><h6>$time_database[0]</h6></center></td>";
     }

   $num = 0 ;
   $test = 0;
   while($num < 3){
       if ($time_form_database[$num] == 2) {
         echo "<td style=\"color:red\"><center><h6>$time_database[1]</h6></center></td>";
         $test = 1;
       }
        $num = $num +1;
       }
      if ($test != 1) {
        echo "<td ><a href=\"./add_place_reservation.php?p_id=$p_id&b_id=$b_id&time=1&date=$date_sum&month=$month&year=$year\" style=\"color:green\"><center><h6>$time_database[1]</h6></center></td>";
      }

   $num = 0 ;
   $test = 0;
   while($num < 3){
     if ($time_form_database[$num] == 3) {
       echo "<td style=\"color:red\"><center><h6>$time_database[2]</h6></center></td>";
       $test = 1;
     }
      $num = $num +1;
     }
    if ($test != 1) {
      echo "<td ><a href=\"./add_place_reservation.php?p_id=$p_id&b_id=$b_id&time=1&date=$date_sum&month=$month&year=$year\" style=\"color:green\"><center><h6>$time_database[2]</h6></center></td>";
    }

   $num = 0 ;
   while($num < 3){
     $time_form_database[$num] = 0;
     $num = $num +1;

   }

   echo "</tr>";
   $i = $i+1;
   $date_sum = $date_sum + 1;
   }
   if ($i < 1) {
     echo "<td colspan=\"4\"><center><h6>ไม่มีข้อมูล</h6></center></td>";
   }
   echo "</tbody>";
   echo "</table>";
   $mysqli -> close();
    ?>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
