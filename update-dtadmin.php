<?php
    include 'config.php';
    session_start();
    $IDcard = $_SESSION['IDcard'];

    if($_SESSION["IDcard"]=="dt-bangyai@dtby.com"){ 
      //$message ="OK";            
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("ไม่สามารถเข้าสู่ระบบของเจ้าหน้าที่ได้");'; 
        echo 'window.location.href = "myprofile.php";';
        echo '</script>';
    }

    if(!isset($IDcard)){
        header('location:index.php');
    };

    $id = $_GET['id'];
    $query=mysqli_query($conn,"select * from `booking_info` where id='$id'");
    $row=mysqli_fetch_array($query);

    
    if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $start_datetime = $_POST['start_datetime'];
      $description = $_POST['description'];
      $descriptions = $_POST['descriptions'];

    $select1 = mysqli_query($conn, "SELECT * FROM `Booking_info` WHERE title ='$title' and start_datetime = '$start_datetime'") or die('query failed');  
    if(mysqli_num_rows($select1)> 0){
        echo '<script type="text/javascript">'; 
        echo 'alert("ไม่สามารถทำการจองคิวได้เนื่องจากเต็ม โปรดเลือการจองคิวใหม่อีกครั้ง");'; 
        echo 'javascript:history.go(-1)';
        echo '</script>';
    }else{
      mysqli_query($conn,"update `booking_info` set  title = '$title', start_datetime = '$start_datetime', description = '$description' , descriptions = '$descriptions' WHERE id = '$id'") or die('query failed');
      echo '<script type="text/javascript">'; 
      echo 'alert("ทำการอัพเดทข้อมูลผู้จองคิวสำเร็จแล้ว");'; 
      echo 'window.location.href = "dtadmin.php";';
      echo '</script>';
    }
  }
   
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="UTF-8">
    <title>โรงพยาบาลส่งเสริมสุขภาพตำบลบางใหญ่</title>
    <link rel="icon" sizes="16x16" href="http://localhost/Project/PHOTO/logo.png"/>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Prompt&display=swap" rel="stylesheet">

        <div class="topnav">
                <div class="topnav-right">
                    <a href="editprofile.php#Contact">ติดต่อ</a>
                    <a class="active" href="process.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">ออกจากระบบ </a>
            </div>
        </div>
        <div class="sidebar">
            <a style="background-color: red; color: white; " href="dtadmin.php">สำหรับเจ้าหน้าที่</a>
            <a class="active" href="dtadmin.php">ย้อนกลับ</a>
        </div>

        <div class="content" style="background: #C3C3C3">
        <h1 style="font-size:60px;">อัพเดทข้อมูลสำหรับเจ้าหน้าที่</h1>
        <div class="form-containerLG">
        <h3><b>ข้อมูลที่ทำการจองไว้</b></h3>
        <form action="" method="post" enctype='multipart/form-data'>
                    <input type="text" name="title" required placeholder="กรอกชื่อและนามสกุลของท่าน" value="<?php echo $row['title']; ?>"class="box" disabled><br>
                    <input type="text" name="start_datetime" class="box" required value="<?php echo $row['start_datetime']; ?>" disabled>
                    <input type="text" name="description" class="box" value="<?php echo $row['description']; ?>" disabled>
                    <input type="text" name="descriptions" class="box" required value="<?php echo $row['descriptions']; ?>" disabled><br><br>

                      <hr>
                      <br>
                      <p style="text-align: left; font-size:20px;"><b>ส่วนของการแก้ไข</b></p>
                                    <select class="box" name="title" id="title" required>
                                        <option value="" hidden="">โปรดเลือกวันที่ต้องการแก้ไข</option>
                                        <option value="คิวที่ 1 เวลา 8:30น.">คิวที่ 1 เวลา 8:30น.</option>
                                        <option value="คิวที่ 2 เวลา 9.00น.">คิวที่ 2 เวลา 9.00น.</option>
                                        <option value="คิวที่ 3 เวลา 9.30น.">คิวที่ 3 เวลา 9.30น.</option>
                                        <option value="คิวที่ 4 เวลา 10.00น.">คิวที่ 4 เวลา 10.00น.</option>
                                        <option value="คิวที่ 5 เวลา 10:30น.">คิวที่ 5 เวลา 10:30น.</option>
                                        <option value="คิวที่ 6 เวลา 11:00น.">คิวที่ 6 เวลา 11:00น.</option>
                                        <option value="คิวที่ 7 เวลา 13:00น.">คิวที่ 7 เวลา 13:00น.</option>
                                        <option value="คิวที่ 8 เวลา 13:30น.">คิวที่ 8 เวลา 13:30น.</option>
                                        <option value="คิวที่ 9 เวลา 14:00น.">คิวที่ 9 เวลา 14:00น.</option>
                                        <option value="คิวที่ 10 เวลา 14:30น.">คิวที่ 10 เวลา 14:30น.</option>
                                        <option value="คิวที่ 11 เวลา 15:00น.">คิวที่ 11 เวลา 15:00น.</option>
                                        <option value="คิวที่ 12 เวลา 15:30น.">คิวที่ 12 เวลา 15:30น.</option>
                                    </select>
                                <input type="date" name="start_datetime" class="box" required><br><br>       
                                <label for="description" class="control-label">ท่านต้องการรักษาด้านใด</label><br>
                                <input type="radio" name="description" value="อุดฟัน">
                                <label for="description"> อุดฟัน</label><br>
                                <input type="radio" name="description" value="ขูดหินปูน">
                                <label for="description"> ขูดหินปูน</label><br>
                                <input type="radio"  name="description" value="ถอนฟัน">
                                <label for="description"> ถอนฟัน </label><br>
                                <input type="radio"  name="description" value="เคลือบฟลูออไรด์">
                                <label for="description"> เคลือบฟลูออไรด์ </label><br>
                                <input type="radio"  name="description" value="ตรวจสุขภาพฟัน">
                                <label for="description"> ตรวจสุขภาพฟัน </label><br><br>
                                <textarea rows="6" class="box" name="descriptions" placeholder="รายละเอียดเพิ่มเติมที่จะแจ้งให้เราทราบ"></textarea>
                      <hr>
                      <br><br>
                      <p>โปรดตรวจสอบการอัพเดทให้เรียบร้อยก่อนทำการอัพเดท</p><br>
                      <button type="submit" name="submit" class="btn" ng-click="showAlert()">อัพเดทข้อมูล</button><br><br><br><br><br><br>
                </form>
        </div>


        <div id="infouser" class="modal">
        <div class="modal__content">
        <h1>ข้อมูลส่วนตัวของคุณคือ</h1><br>
        <p>ชื่อ - นามสกุล : <?php echo $row['nametitle']; ?><?php echo $row['name']; ?> </p><br>
        <p>วันเดือนปีเกิด : <?php echo $row['HBD']; ?></p><br>
        <p>เพศ : <?php echo $row['SexBG']; ?> </p><br>
        <p>เลขบัตรประจำตัวประชาชนของคุณคือ : <?php echo $row['IDcard']; ?></p><br>
        <p>เบอร์โทรศัพท์ของคุณคือ : <?php echo $row['Tel']; ?></p><br>
        <a href="#" class="modal__close"><h3>ปิด</h3></a>
        </div>
      </div>


        <div id="Contact" class="modal">
        <div class="modal__content">
        <h1>ติดต่อสอบถามเพิ่มเติมได้ที่</h1><br>
        <p style="font-size:20px;"><a href="tel:+029277232">เบอร์ : 02-927-7232</a></p><br>
        <p style="font-size:16px;">เวลาทำการ : จันทร์-ศุกร์ 08:00 - 20:00 </p>
        <p style="font-size:16px;">เสาร์ อาทิตย์ วันหยุดนักขัตฤกษ์ 08:30-20:00 </p><br><br>
        <a href="#" class="modal__close"><h3>ปิด</h3></a>
        </div>
      </div>
</html>













