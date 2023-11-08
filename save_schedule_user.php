<?php 
require_once('config.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('เกิดปัญหาผิดพลาดโปรดลองใหม่อีกครั้ง');";
    echo 'window.location.href = "myprofile.php";';
    echo "</script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id))
    $sql = mysqli_query($conn, "SELECT * FROM `Booking_info` WHERE title ='$title' and start_datetime = '$start_datetime'") or die('query failed');
    if(mysqli_num_rows($sql)> 0){
        echo '<script type="text/javascript">'; 
        echo 'alert("ไม่สามารถทำการจองคิวได้เนื่องจากเต็ม โปรดเลือการจองคิวใหม่อีกครั้ง");'; 
        echo 'window.location.href = "myprofile.php";';
        echo '</script>';
}else{
    $sql = mysqli_query ($conn, "INSERT INTO `Booking_info` (`title`,`nametitle`,`name`,`IDcard`,`Tel`,`description`,`descriptions`,`Start_datetime`,`CT`) VALUES ('$title','$nametitle','$name','$IDcard','$Tel','$description','$descriptions','$start_datetime','$CT')") or die('query failed');
    echo '<script type="text/javascript">'; 
    echo 'alert("ทำการจองคิวสำเร็จ");'; 
    echo 'window.location.href = "myprofile.php";';
    echo '</script>';
}

$conn->close();
?>



