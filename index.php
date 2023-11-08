<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
	$nametitle = mysqli_real_escape_string($conn, $_POST['nametitle']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
	$IDcard = mysqli_real_escape_string($conn, $_POST['IDcard']);
  $Tel = mysqli_real_escape_string($conn, $_POST['Tel']);
	
  $birth_date =  mysqli_real_escape_string($conn, $_POST['birth_date']);
  $birth_month =  mysqli_real_escape_string($conn, $_POST['birth_month']);
  $birth_year =  mysqli_real_escape_string($conn, $_POST['birth_year']);
  $HBD = $birth_date." / ".$birth_month." / ".$birth_year;

  $SexBG = mysqli_real_escape_string($conn, $_POST['SexBG']);

  $select1 = mysqli_query($conn, "SELECT * FROM `user_info` WHERE IDcard = '$IDcard'") or die('query failed');
   	if(mysqli_num_rows($select1)> 0){
      echo '<script type="text/javascript">'; 
      echo 'alert("เลขบัตรประชาชนถูกใช้งานในการลงทะเบียนไปแล้ว");'; 
      echo 'window.location.href = "index.php#register";';
      echo '</script>';
		 }
   		else{
			mysqli_query($conn, "INSERT INTO `user_info`(nametitle, name, IDcard, Tel, HBD, SexBG) VALUES('$nametitle','$name','$IDcard','$Tel','$HBD','$SexBG')") or die('query failed');
      echo '<script type="text/javascript">'; 
      echo 'alert("ลงทะเบียนสำเร็จ !");'; 
      echo 'window.location.href = "index.php";';
      echo '</script>';
	}	
}

if(isset($_POST['submit1'])){
	$IDcard = mysqli_real_escape_string($conn, $_POST['IDcard']);
  $Tel = mysqli_real_escape_string($conn, $_POST['Tel']);

  $select2 = mysqli_query($conn, "SELECT * FROM `user_info` WHERE IDcard = '$IDcard' AND Tel = '$Tel'") or die('query failed');
  if(mysqli_num_rows($select2) > 0){
      $row = mysqli_fetch_array($select2);
       $_SESSION["IDcard"] = $row["IDcard"];
       echo '<script type="text/javascript">'; 
       echo 'window.location.href = "myprofile.php";';
       echo '</script>';      
     }else{
      echo '<script type="text/javascript">'; 
      echo 'alert("คุณกรอกข้อมูลไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง");'; 
      echo 'window.location.href = "index.php#login";';
      echo '</script>';
     }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลส่งเสริมสุขภาพตำบลบางใหญ่</title>
    <link rel="icon" sizes="16x16" href="http://localhost/Project/PHOTO/logo.png"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
<body>
  <header>
    
    <nav class="navbar">
      <div class="logo"><a href="index.php"><img src="PHOTO/logo.png" height="160" width="160"></a></div>
      <ul class="menu">
        <li><a href="index.php">หน้าแรก</a></li>
        <li><a href="#details">รายละเอียด</a></li>
        <li><a href="#Contact">ติดต่อ</a></li>
        <li><a href="#map">แผนที่</a></li>
      </ul>

      <div class="buttons">
      <a href="#login"><input type="button" value="เข้าสู่ระบบ"></a>
      <a href="#register"><input type="button" value="ลงทะเบียน"></a>
      </div>
    </nav>


    <div class="text-content">
      <h2>ทันตกรรม<br>โรงพยาบาลส่งเสริมสุขภาพตำบลบางใหญ่</h2>
      <p>ยินดีต้อนรับเข้าสู่เว็บไซต์ สามารถจองคิวเพื่อนัดวันและเวลา เพื่อเข้ารับทำการด้านทันตกรรม</p>
      <img src="PHOTO/ฟัน.png" class="responsive">
    </div>

    <div class ="text-content">
    <div class="composition">
        <img src="PHOTO/image-3.jpg" alt="photo 1" class="composition__img composition__img--p1"/>
        <img src="PHOTO/image-2.jpg" alt="photo 2" class="composition__img composition__img--p2"/>
        <img src="PHOTO/image-1.jpg" alt="photo 3" class="composition__img composition__img--p3"/>
        <img src="PHOTO/image-4.jpg" alt="photo 4" class="composition__img composition__img--p4"/>
        <img src="PHOTO/image-5.jpg" alt="photo 5" class="composition__img composition__img--p5"/>
        <img src="PHOTO/image-6.jpg" alt="photo 6" class="composition__img composition__img--p6"/>
    </div>





      <div class="play-button">
          <span class="play">ติดตามข่าวสารได้ที่ : </span>
          <a class="fa fa-facebook-official" style="font-size:48px;color: #4581ff; margin-top: -15%" href="https://www.facebook.com/people/%E0%B8%A3%E0%B8%9E%E0%B8%AA%E0%B8%95%E0%B8%9A%E0%B8%B2%E0%B8%87%E0%B9%83%E0%B8%AB%E0%B8%8D%E0%B9%88-%E0%B8%AD%E0%B8%9A%E0%B8%B2%E0%B8%87%E0%B9%83%E0%B8%AB%E0%B8%8D%E0%B9%88-%E0%B8%88%E0%B8%99%E0%B8%99%E0%B8%97%E0%B8%9A%E0%B8%B8%E0%B8%A3%E0%B8%B5/100027740629835"></a>
      </div>

    <div id="details" class="modal">
        <div class="modal__content2">
        <h1>รายละเอียดทันตกรรม</h1>
        <p><img src="PHOTO/details.jpg" width="1000" height="800"/></p>
        <a href="#" class="modal__close">&times;</a>
        </div>
      </div>

      <div id="Contact" class="modal">
        <div class="modal__content">
        <h1>ติดต่อสอบถามเพิ่มเติมได้ที่</h1><br>
        <p style="font-size:20px;"><a href="tel:+029277232">เบอร์ : 02-927-7232</a></p><br>
        <p style="font-size:16px;">เวลาทำการ : จันทร์-ศุกร์ 08:00 - 20:00 </p>
        <p style="font-size:16px;">เสาร์ อาทิตย์ วันหยุดนักขัตฤกษ์ 08:30-20:00 </p>
        <a href="#" class="modal__close">&times;</a>
        </div>
      </div>

      <div id="map" class="modal">
        <div class="modal__content1">
        <h1>แผนที่ในการเดินทาง</h1><br>
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30992.564056502735!2d100.3577973!3d13.8348047!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29184205b7615%3A0x1e222b27731542f7!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4Liq4LmI4LiH4LmA4Liq4Lij4Li04Lih4Liq4Li44LiC4Lig4Liy4Lie4LiV4Liz4Lia4Lil4Lia4Liy4LiH4LmD4Lir4LiN4LmI!5e0!3m2!1sth!2sth!4v1691223131182!5m2!1sth!2sth" width="700" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p><br>
        <p>จุดสังเกต : อยู่ข้างโรงเรียนตลาดบางคูลัด </p>
        <a href="#" class="modal__close">&times;</a>
        </div>
      </div>

      <div id="login" class="modal">
        <div class="modal__content3">
        <h1>เข้าสู่ระบบเพื่อทำการจองคิว</h1><br>
        <div class="form-containerLG">
        <form action="" method="post" enctype='multipart/form-data'>
                <div style="display:flex; align-items: left;"><p>ชื่อผู้ใช้ "(ผู้ใช้งานให้กรอกเลขบัตรประชาชนของท่าน)"</p></div>
                <input type="text" name="IDcard" class="box" required="required" placeholder="กรอกชื่อผู้ใช้ของท่าน">
                <div style="display:flex; align-items: left;"><p>รหัสผ่าน "(กรอกเบอร์โทรศัพท์ของท่าน)"</p></div>
                <input type="password" name="Tel" class="box" id="tbNum" placeholder="โปรดกรอกรหัสผ่านของคุณ" onkeyup="addHyphen(this)" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" maxLength="10">
                <input type="checkbox"  onchange="document.getElementById('tbNum').type = this.checked ? 'text' : 'password'">
                <label>&nbsp;&nbsp;&nbsp;ดูรหัสผ่านที่ท่านกรอก</label><br><br><br><br>
                <button type="submit" name="submit1" class="btn">เข้าสู่ระบบ</button><br><br>
                <a href = "#register">หากยังไม่ได้ลงทะเบียนกดที่นี้เพื่อทำการลงทะเบียน</a><br>
                </form>
        </div>
        <a href="#" class="modal__close">&times;</a>
        </div>
      </div>

      <div id="register" class="modal">
        <div class="modal__content3">
        <h1>ลงทะเบียนเพื่อทำการจองคิว</h1><br>
        <div class="form-containerLG">
        <form action="" method="post" enctype='multipart/form-data'>
                    <select name="nametitle" class="box" required>
                         <option value=""hidden>โปรดเลือกคำนำหน้า</option>
                         <option value="นาย">นาย</option>
                         <option value="นางสาว">นางสาว</option>
                         <option value="นาง">นาง</option>
                    </select>
                    <input type="text" name="name" required placeholder="กรอกชื่อและนามสกุลของท่าน" class="box">
                    <input type="text" name="IDcard" required placeholder="โปรดกรอกรหัสบัตรประชาชน 13 หลักของท่าน" class="box" pattern="[0-9]{13}" maxLength="13" title="โปรดกรอกเลขบัตรประชาชนให้ครบ 13 หลัก">
                    <input type="text" name="Tel" class="box" id="tbNum1" placeholder="โปรดกรอกเบอร์โทรศัพท์ของท่าน" onkeyup="addHyphen(this)" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" maxLength="10"><br><br>
                    <div style="align-items: left; top: 50%; font-size: 16px;">โปรดเลือกเพศ : 
                      <input type="radio"  name="SexBG" value="ชาย" class="box1"/>
                      <label for="contactChoice1" style="margin-left: -2%;">ชาย</label>
                      <input type="radio"  name="SexBG" value="หญิง" class="box1"/>
                      <label for="contactChoice2" style="margin-left: -2%;">หญิง</label>
                    </div><br>
                    <div style="align-items: left; top: 50%; font-size: 16px;">เลือกวันเดือนปีเกิด : 
                    <select style="width: 12%;" name="birth_date" class="box2" required >
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
                     <select style="width: 16%;" name="birth_month" class="box2" required>
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
                     <select style="width: 12%;" name="birth_year" class="box2" required>
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
                      </div><br><br>
                      <hr><br>
                      <input type="checkbox" name="ยืนยัน" class="box1" required>
                      <label for="ยินยอม">ข้าพเจ้ายืนยันว่าข้อมูลที่กรอกถูกต้อง และยินยอมให้ตรวจสอบข้อมูลกับทางอนามัย</label><br><br>
                      <button type="submit" name="submit" class="btn" ng-click="showAlert()">ลงทะเบียน</button>
                </form>
              </div>
        <a href="#" class="modal__close">&times;</a>
        </div>
      </div>
  </header>
</body>
</html>

<script>
					function addHyphen (element) {
    				let ele = document.getElementById(element.id);
       				ele = ele.value.split('-').join('');  

        			let finalVal = ele.replace(/(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)/, '$1$2-$3$4$5$6-$7$8$9$10')
        			document.getElementById(element.id).value = finalVal;
    				}
</script>
    

    

