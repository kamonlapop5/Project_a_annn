<?php
// Include the database config file
include_once 'connect.php';

if(!empty($_POST["faculty_id"])){
    // Fetch state data based on the specific country
    $query = "SELECT * FROM major WHERE faculty_id = ".$_POST['faculty_id']." ";
    $result = $mysqli->query($query);

    // Generate HTML of state options list
    if($result->num_rows > 0){
        echo '<option value="">เลือกสาขา</option>';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['ma_id'].'">'.$row['ma_name'].'</option>';
        }
    }else{
        echo '<option value="">คณะนี้ยังไม่ได้เพื่มสาขา</option>';
    }
}

?>
