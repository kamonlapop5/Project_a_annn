<?php
include("./header.php");
include("./menu.php");
include("./connect.php");

$m_id = $_GET["m_id"];
$s_id = $_GET["s_id"];

if(isset($_POST['submit'])){
    echo 'Selected faculty_id: '.$_POST['faculty'];
    echo 'Selected ma_id: '.$_POST['major'];
}
     $sql = "SELECT * FROM faculty";
     $resultfaculty = $mysqli->query($sql) or die($mysqli->error.__LINE__);


if ($s_id == 1 or $s_id == 4 ) {
  $sql = "select * from member inner join status on status.s_id = member.s_id INNER JOIN title on title.t_id = member.t_id where m_id = '$m_id'";
  $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
  $i=0;
  while ($row = mysqli_fetch_array($result)) {
    $i = $i+1;
    $m_id = $row["m_id"];
    $m_fname = $row['m_fname'];
    $m_lname = $row['m_lname'];
    $m_username = $row['m_username'];
    $m_password = $row['m_password'];
    $m_phone = $row['m_phone'];
    $m_email = $row['m_email'];
    $s_name = $row['s_name'];
    $t_name = $row['t_name'];
  }
}else {
  $sql = "select * from member inner join status on status.s_id = member.s_id INNER JOIN major on major.ma_id = member.ma_id INNER JOIN faculty on faculty.faculty_id = member.faculty_id
  INNER JOIN title on title.t_id = member.t_id where m_id = '$m_id'";
  $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
  $i=0;
  while ($row = mysqli_fetch_array($result)) {
    $i = $i+1;
    $m_id = $row["m_id"];
    $m_fname = $row['m_fname'];
    $m_lname = $row['m_lname'];
    $m_username = $row['m_username'];
    $m_password = $row['m_password'];
    $m_phone = $row['m_phone'];
    $m_email = $row['m_email'];
    $s_name = $row['s_name'];
    $ma_name = $row['ma_name'];
    $faculty_name = $row['faculty_name'];
    $t_name = $row['t_name'];
    $ma_id = $row['ma_id'];
  }
}

?>
<br>
 <center ><p style="font-size:25px;">แก้ไขข้อมูลสมาชิก</p></center>
<center><table width="50%">
<form action = "./update_user.php" method="post">
  <tr>
  <input type = "hidden" name = "m_id" value="<?php echo $m_id;?>">
</tr>
  <td>&nbsp;</td>
  <tr>
  <td >สถานะ : </td> <td><?php echo $s_name;?></td>
  </tr>
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
          if($t_name_data == $t_name){
            ?>
            <option selected value="<?php echo $t_id_data ; ?>"><?php echo $t_name_data;?></option>
            <?php
          }else {
            ?>
            <option value="<?php echo $t_id_data ; ?>"><?php echo $t_name_data;?></option>
            <?php
          }

        }
        ?>
        </select> * <br></td>
     </tr>
     <td>&nbsp;</td>
     <tr>
       <td>ชื่อ : </td> <td style="color:red"><input style="width:250px;" type = "text"  name = "m_fname" value="<?php echo $m_fname;?>"> * </td>
     </tr>
     <td>&nbsp;</td>
     <tr>
       <td>นามสกุล : </td> <td style="color:red"><input style="width:250px;" type = "text" name = "m_lname" value="<?php echo $m_lname;?>"> * </td>
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
          if ($row['faculty_name'] == $faculty_name) {
            echo '<option selected value="'.$row['faculty_id'].'">'.$row['faculty_name'].'</option>';
          }else {
            echo '<option value="'.$row['faculty_id'].'">'.$row['faculty_name'].'</option>';
          }
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
            <option value="<?php echo $ma_id;?>"><?php echo $ma_name;?></option>
        </select> * </td>
     </tr>
     <td>&nbsp;</td>
     <?php
     }
      ?>
     <tr>
       <td>เบอร์โทรศัพท์ : </td> <td style="color:red"><input style="width:250px;" type = "number" name = "m_phone" value="<?php echo $m_phone;?>"> * </td>
     </tr>
     <td>&nbsp;</td>
     <tr>
       <td>อีเมล : </td> <td style="color:red"><input style="width:250px;" type = "text" name = "m_email" value="<?php echo $m_email;?>"> * </td>
     </tr>
     <td>&nbsp;</td>
     <tr>
       <td>ชื่อบัญชี : </td><td style="color:red"><input style="width:250px;" type = "text" name = "m_username" value="<?php echo $m_username;?>"> * </td>
     </tr>
     <td>&nbsp;</td>
     <tr>
       <td>รหัสผ่าน : </td> <td style="color:red"><input style="width:250px;" type = "password" id="password" name = "m_password" value="<?php echo $m_password;?>"> * </td><td><input type="checkbox" onclick="myFunction()">&nbsp;แสดงรหัสผ่าน </td>
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
<?php
include("./footer.php");
 ?>
