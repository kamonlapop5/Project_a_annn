<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
</-------------------------------------------------------------------------------->
<?php
$s_id = $_GET["id"];
if(isset($_POST['submit'])){
    echo 'Selected faculty_id: '.$_POST['faculty'];
    echo 'Selected ma_id: '.$_POST['major'];
}
     // Include the database config file

     // Fetch all the line data
     $sql = "SELECT * FROM faculty";
     $resultfaculty = $mysqli->query($sql) or die($mysqli->error.__LINE__);
?>
<br><center ><p style="font-size:25px;">เพิ่มข้อมูลสมาชิก</p></center>
<center><table width="50%">
<form action = "./insert_user.php" method="post">
  <input type = "hidden"  name = "s_id" value="<?php echo $s_id;?>">
 <td>&nbsp;</td>
 <tr>
 <td>คำนำหน้าชื่อ : </td> <td style="color:red"><select name="t_id" style="width:250px;">
   <?php
   $sql = "SELECT * FROM title ";
       // $sql = "select Line_ID from line where Line_Name = '$Line_name'";
       $result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
       while($row = mysqli_fetch_array($result)) {
         $t_id_data = $row["t_id"];
         $t_name_data = $row["t_name"];
           ?>
           <option selected value="<?php echo $t_id_data ; ?>"><?php echo $t_name_data;?></option>
           <?php
         }
       ?>
       </select> * <br></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อ : </td> <td style="color:red"><input style="width:250px;" type = "text"  name = "m_fname"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>นามสกุล : </td> <td style="color:red"><input style="width:250px;" type = "text" name = "m_lname"> * </td>
    </tr>
    <td>&nbsp;</td>

    <?php if ($s_id == 1 or $s_id == 4 ) {
    }else {?>
      <tr>
      <td>คณะ : </td> <td style="color:red"><select id="faculty" name = 'faculty_id' style="width:250px;">
        <option value="">เลือกคณะ</option>
   <?php
   if($resultfaculty->num_rows > 0){
       while($row = $resultfaculty->fetch_assoc()){
           echo '<option value="'.$row['faculty_id'].'">'.$row['faculty_name'].'</option>';

       }
   }else{
       echo '<option value="">ไม่มีคณะ</option>';
   }
   ?>
</select> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>สาขา : </td> <td style="color:red"><select id="major" name = 'ma_id' style="width:250px;">
           <option value="">เลือกคณะก่อน</option>
       </select> * </td>
    </tr>
    <td>&nbsp;</td>
    <?php
    }
     ?>
    <tr>
      <td>เบอร์โทรศัพท์ : </td> <td style="color:red"><input style="width:250px;" type = "number" name = "m_phone" maxlength="10"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>อีเมล : </td> <td style="color:red"><input style="width:250px;" type = "text" name = "m_email" > * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>ชื่อบัญชี : </td><td style="color:red"><input style="width:250px;" type = "text" name = "m_username"> * </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>รหัสผ่าน : </td> <td style="color:red"><input style="width:250px;" type = "password" id="password" name = "m_password"> * </td><td><input type="checkbox" onclick="myFunction()">&nbsp;แสดงรหัสผ่าน </td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align = 'center'><input style="background-color:E98989" onclick="return check_pass()" type="submit" value="ยืนยัน"></td>
      <td><button style="background-color:BCB684" onclick="window.location='Manage_user.php';return false;">ยกเลิก</button></td>
    </tr>
    <td>&nbsp;</td>
</center>
</form>
</table>
</-------------------------------------------------------------------------------->
<!-- <script>
 $(document).ready(function(){
 $('#faculty').on('change', function(){
     var facultyID = $(this).val();
     if(facultyID){
         $.ajax({
             type:'POST',
             url:'ajaxData.php',
             data:'faculty_id='+facultyID,
             success:function(html){
                 $('#major').html(html);
             }
         });
     }else{
         $('#major').html('<option value="">เลือกคณะก่อน</option>');

     }
 });
 });
 </script> -->
 <?php
 include("./footer.php");
  ?>
