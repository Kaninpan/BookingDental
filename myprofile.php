<?php
    include 'config.php';
    session_start();
    $IDcard = $_SESSION['IDcard'];

    if($_SESSION["IDcard"]=="$IDcard"){ 
      //$message ="OK";            
    }else{
      header('location:index.php');
    }

    if($_SESSION["IDcard"]=="dt-bangyai@dtby.com"){ 
        header('location:dtadmin.php');      
      }

    if(!isset($IDcard)){
        header('location:index.php');
    };


    $query=mysqli_query($conn,"select * from `user_info` where IDcard='$IDcard'");
    $row=mysqli_fetch_array($query);

?>

<style>
        :root {
            --bs-success-rgb: 71, 1231235, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-size: 19.5px;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #DADADA !important;
            border-style: solid;
            border-width: 2px !important;
            background-color: #ffffff;
        }
    </style>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลส่งเสริมสุขภาพตำบลบางใหญ่</title>
    <link rel="icon" sizes="16x16" href="http://localhost/Project/PHOTO/logo.png"/>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    <script src='lib/jquery-ui.custom-datepicker.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    <script src='fullcalendar/lang-all.js'></script>
    <script src='lib/moment.js'></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
   </head>

        <div class="topnav">
                <div class="topnav-right">
                    <a href="editprofile.php#Contact">ติดต่อ</a>
                    <a class="active" href="process.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">ออกจากระบบ </a>
            </div>
        </div>
        <div class="sidebar">
            <a style="background-color: red; color: white; " href="dtadmin.php">สำหรับเจ้าหน้าที่</a>
            <a class="active" href="myprofile.php">จองคิว</a>
            <a href="history.php">ประวัติการจอง</a>
            <a href="editprofile.php">แก้ไขข้อมูล</a>
        </div>


        <div class="content" style="background: #C3C3C3;">
        <h1 style="font-size:60px;">ยินดีต้อนรับทุกท่าน</h1>
        <h1 style="font-size:30px;">จองคิว</h1>
        <body>
    <div class="container" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <br><br><div id="calendar"></div>
            </div>
            <div class="col-md-3">
            <p><b><u style="color: red; font-size:20px;">โปรดอ่าน</u></b> การเลือกเวลาจองคิวสามารถเลือกได้ 1 คิว ต่อ 1 คนเท่านั้นหากคิวที่ท่านเลือกไม่สามารถจองได้โปรดเลือกคิวในวันถัดไป</p>
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">ระบุรายละเอียดต่างๆ</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid-xl">
                            <form action="save_schedule_user.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">วันที่ต้องการจอง</label>
                                    <input type="date" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" min="<?php echo date('Y-m-d');?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="title" class="control-label">เวลาที่ต้องการ</label>
                                    <select class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                        <option value="" hidden="">โปรดเลือกเวลาในการนัดหมาย</option>
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
                                    <input type="text" name="nametitle" required value="<?php echo $row['nametitle']; ?>"  class="box" hidden>
                                    <input type="text" name="name" required value="<?php echo $row['name']; ?>" class="box" hidden>
                                    <input type="text" name="IDcard" required value="<?php echo $row['IDcard']; ?>"  class="box" hidden>
                                    <input type="text" name="Tel" required value="<?php echo $row['Tel']; ?>" class="box" hidden>
                                </div>
                                <div class="form-group mb-2">
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
                                <textarea rows="6" class="form-control form-control-sm rounded-0" name="descriptions" placeholder="รายละเอียดเพิ่มเติมที่จะแจ้งให้เราทราบ"></textarea>
                                <input type="hidden" name="CT"   placeholder="ชื่อ-นามสกุลของคุณ" value="<?php echo date('Y-m-d')?>" readonly required><br>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" name="submit" form="schedule-form"><i class="fa fa-save"></i> จอง</button>
                            <button class="btn btn-danger border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> ลบ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
$schedules = $conn->query("SELECT * FROM `Booking_info`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>


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








<script src="Js/booking.js"></script>