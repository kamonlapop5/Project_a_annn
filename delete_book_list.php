<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$f_id = $_GET["f_id"];
$s_id = $_SESSION["s_id"];
$sql = "delete from form where f_id='$f_id'" ;
$mysqli -> query($sql) or die($mysqli->error.__LINE__);
$mysqli -> close();
?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
  <?php if ($s_id == 2) { ?>
    <meta http-equiv="refresh" content="0; url=./Booking_list.php">
  <?php }else { ?>
    <meta http-equiv="refresh" content="0; url=./Booking_list.php?station=2">
    <?php } ?>
