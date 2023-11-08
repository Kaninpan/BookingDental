<?php
    include 'config.php';
    session_start();
    $IDcard = $_SESSION['IDcard'];

    if($_SESSION["IDcard"]=="$IDcard"){ 
      //$message ="OK";            
    }else{
      header('location:index.php');
    }

    if(!isset($IDcard)){
        header('location:index.php');
    };

    $query=mysqli_query($conn,"select * from `user_info` where IDcard='$IDcard'");
    $row=mysqli_fetch_array($query);


    if(isset($_POST['submit'])){
      $nametitle = $_POST['nametitle'];
      $name = $_POST['name'];
      $birth_date =  $_POST['birth_date'];
      $birth_month =  $_POST['birth_month'];
      $birth_year =  $_POST['birth_year'];
      $HBD = $birth_date." / ".$birth_month." / ".$birth_year;
      $SexBG = $_POST['SexBG'];

      mysqli_query($conn,"update `user_info` set  nametitle = '$nametitle', name = '$name' ,HBD = '$HBD' ,SexBG = '$SexBG' WHERE IDcard = '$IDcard'") or die('query failed');
      echo '<script type="text/javascript">'; 
      echo 'alert("แก้ไขข้อมูลสำเร็จ");'; 
      echo 'window.location.href = "editprofile.php";';
      echo '</script>';
  }

  
?>

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
   </head>

        <div class="topnav">
                <div class="topnav-right">
                    <a href="#Contact">ติดต่อ</a>
                    <a class="active" href="process.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">ออกจากระบบ </a>
            </div>
        </div>
        <div class="sidebar">
            <a style="background-color: red; color: white; " href="dtadmin.php">สำหรับเจ้าหน้าที่</a>
            <a class="active" href="myprofile.php">จองคิว</a>
            <a href="history.php">ประวัติการจอง</a>
            <a href="editprofile.php">แก้ไขข้อมูล</a>
        </div>


        <div class="content" style="background: #C3C3C3">
        <h1 style="font-size:60px;">ยินดีต้อนรับทุกท่าน</h1><br>
        <h1 style="font-size:30px;">แก้ไขข้อมูล</h1>
        <div class="form-containerLG">
        <form action="" method="post" enctype='multipart/form-data'>
                    <select name="nametitle" class="box" required>
                         <option value=""hidden>โปรดเลือกคำนำหน้า</option>
                         <option value="นาย">นาย</option>
                         <option value="นางสาว">นางสาว</option>
                         <option value="นาง">นาง</option>
                    </select>
                    <input type="text" name="name" required placeholder="กรอกชื่อและนามสกุลของท่าน" class="box"><br>
                    <input type="text" name="IDcard" required value="<?php echo $row['IDcard']; ?>" placeholder="โปรดกรอกรหัสบัตรประชาชน 13 หลักของท่าน" class="box" pattern="[0-9]{13}" maxLength="13" title="โปรดกรอกเลขบัตรประชาชนให้ครบ 13 หลัก" disabled>
                    <input type="text" name="Tel" class="box" id="tbNum1" placeholder="โปรดกรอกเบอร์โทรศัพท์ของท่าน" onkeyup="addHyphen(this)" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" maxLength="10" value="<?php echo $row['Tel']; ?>" disabled><br><br>
                    <div style="align-items: left; top: 50%; font-size: 16px;">โปรดเลือกเพศ : 
                      <input type="radio"  name="SexBG" value="ชาย" class="box1"/>
                      <label for="contactChoice1" style="margin-left: -2.5%;">ชาย</label>
                      <input type="radio"  name="SexBG" value="หญิง" class="box1"/>
                      <label for="contactChoice2" style="margin-left: -2.5%;">หญิง</label>
                    </div><br>
                    <div style="align-items: left; top: 50%; font-size: 16px;">เลือกวันเดือนปีเกิด : 
                    <select style="width: 6%;" name="birth_date" class="box2" required >
                        <option value=""hidden>วัน</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                      </select>
                     <select style="width: 9%;"  name="birth_month" class="box2" required>
                        <option value=""hidden>เดือน</option>
                        <option value="มกราคม">มกราคม</option>
                        <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                        <option value="มีนาคม">มีนาคม</option>
                        <option value="เมษายน">เมษายน</option>
                        <option value="พฤษภาคม">พฤษภาคม</option>
                        <option value="มิถุนายน">มิถุนายน</option>
                        <option value="กรกฎาคม">กรกฎาคม</option>
                        <option value="สิงหาคม">สิงหาคม</option>
                        <option value="กันยายน">กันยายน</option>
                        <option value="ตุลาคม">ตุลาคม</option>
                        <option value="พฤศจิกายน">พฤศจิกายน</option>
                        <option value="ธันวาคม">ธันวาคม</option>
                      </select>
                     <select style="width: 6%;" name="birth_year" class="box2" required>
                        <option value=""hidden>ปี</option>
                        <option value="2475">2475</option>
                        <option value="2476">2476</option>
                        <option value="2477">2477</option>
                        <option value="2478">2478</option>
                        <option value="2479">2479</option>
                        <option value="2480">2480</option>
                        <option value="2481">2481</option>
                        <option value="2482">2482</option>
                        <option value="2483">2483</option>
                        <option value="2484">2484</option>
                        <option value="2485">2485</option>
                        <option value="2486">2486</option>
                        <option value="2487">2487</option>
                        <option value="2488">2488</option>
                        <option value="2489">2489</option>
                        <option value="2490">2490</option>
                        <option value="2491">2491</option>
                        <option value="2492">2492</option>
                        <option value="2493">2493</option>
                        <option value="2494">2494</option>
                        <option value="2495">2495</option>
                        <option value="2496">2496</option>
                        <option value="2497">2497</option>
                        <option value="2498">2498</option>
                        <option value="2499">2499</option>
                        <option value="2500">2500</option>
                        <option value="2501">2501</option>
                        <option value="2502">2502</option>
                        <option value="2503">2503</option>
                        <option value="2504">2504</option>
                        <option value="2505">2505</option>
                        <option value="2506">2506</option>
                        <option value="2507">2507</option>
                        <option value="2508">2508</option>
                        <option value="2509">2509</option>
                        <option value="2510">2510</option>
                        <option value="2511">2511</option>
                        <option value="2512">2512</option>
                        <option value="2513">2513</option>
                        <option value="2514">2514</option>
                        <option value="2515">2515</option>
                        <option value="2516">2516</option>
                        <option value="2517">2517</option>
                        <option value="2518">2518</option>
                        <option value="2519">2519</option>
                        <option value="2520">2520</option>
                        <option value="2521">2521</option>
                        <option value="2522">2522</option>
                        <option value="2523">2523</option>
                        <option value="2524">2524</option>
                        <option value="2525">2525</option>
                        <option value="2526">2526</option>
                        <option value="2527">2527</option>
                        <option value="2528">2528</option>
                        <option value="2529">2529</option>
                        <option value="2530">2530</option>
                        <option value="2531">2531</option>
                        <option value="2532">2532</option>
                        <option value="2533">2533</option>
                        <option value="2534">2534</option>
                        <option value="2535">2535</option>
                        <option value="2536">2536</option>
                        <option value="2537">2537</option>
                        <option value="2538">2538</option>
                        <option value="2539">2539</option>
                        <option value="2540">2540</option>
                        <option value="2541">2541</option>
                        <option value="2542">2542</option>
                        <option value="2543">2543</option>
                        <option value="2544">2544</option>
                        <option value="2545">2545</option>
                        <option value="2546">2546</option>
                        <option value="2547">2547</option>
                        <option value="2548">2548</option>
                        <option value="2549">2549</option>
                        <option value="2550">2550</option>
                        <option value="2551">2551</option>
                        <option value="2552">2552</option>
                        <option value="2553">2553</option>
                        <option value="2554">2554</option>
                        <option value="2555">2555</option>
                        <option value="2556">2556</option>
                        <option value="2557">2557</option>
                        <option value="2558">2558</option>
                        <option value="2559">2559</option>
                        <option value="2560">2560</option>
                        <option value="2561">2561</option>
                        <option value="2562">2562</option>
                        <option value="2563">2563</option>
                        <option value="2564">2564</option>
                        <option value="2565">2565</option>
                        <option value="2566">2566</option>
                      </select>
                      </div><br>
                      <hr>
                      <br>
                      <p>การแก้ไขข้อมูลของท่านจะแก้ไขได้เฉพาะ คำนำหน้า ชื่อ - นามสกุล เพศ และ วันเดือนปีเกิดของท่านเท่านั้น</p><br>
                      <button type="submit" name="submit" class="btn" ng-click="showAlert()">แก้ไขข้อมูล</button>
                      <a class="btn1" href="#infouser">ตรวจสอบข้อมูล</a>
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









