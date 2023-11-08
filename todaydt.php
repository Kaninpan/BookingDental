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

    $query = "select * from booking_info WHERE DATE(start_datetime) = DATE(NOW()) ORDER BY `booking_info`.`title` ASC";  
    $run = mysqli_query($conn,$query); 
    $row4 = mysqli_num_rows($run);
    
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

 
        <div class="content" style="background: #C3C3C3; margin-left:0px;">
        <h1 style="font-size:60px;">รายละเอียดการจองคิววันนี้</h1><br>
        <p>โปรดป้อนคำที่ท่านต้องการค้นหาของท่าน </p>
        <form name="f1" action="" onSubmit="if(this.t1.value!=null && this.t1.value!='') findString(this.t1.value);return false">
          <input type="text" name=t1 value="" size=20 class="box2"  placeholder="กรอกคำที่คุณต้องการค้นหา">
          <input type="submit" name=b1 value="ค้นหา" class="btn">
          <p style="color: red;"><b><u>โปรดระบุให้ชัดเจนเพื่อง่ายต่อการค้นหา </u></b></p><br>
        <div class="form-containerLG"><br>
        <?php
          echo '<h4 style="font-size: 20px;"><font color="black"> พบผลลัพธ์ที่จองคิววันนี้ : </font><b><font color="red">'."$row4".'</b></font><font color="black"> จำนวน</font></h2>'
        ?>
        <?php
			echo "<table width='50%'' border ='0'>";
			echo "<tr align='center' bgcolor='#DCDCDC'></tr>";
         $i=1;  
         if ($num = mysqli_num_rows($run)) {  
              while ($result = mysqli_fetch_assoc($run)) {  
                   echo "
                        <tr bgcolor='#DCDCDC'>
                             <td bgcolor='#DCDCDC' ><h2>ชื่อ - นามสกุล : </h2></td>
                             <td style='font-size: 20px;'><p>".$result['name']."</p></td>
                        </tr>
                        <tr>
                             <td bgcolor='#DCDCDC'><h2>เลขบัตรประชาชน : </h2></td>
                             <td style='font-size: 20px;' bgcolor='#DCDCDC'><p>".$result['IDcard']."</p></td>  
                        </tr>  
                        <tr>  
                             <td bgcolor='#DCDCDC'><h2>เบอร์โทรติดต่อ : </h2></td>
                             <td style='font-size: 20px;' bgcolor='#DCDCDC'><p>".$result['Tel']."</p></td>
                        </tr> 
                        <tr>
                             <td bgcolor='#DCDCDC'><h2>เวลาจองคิว : </h2></td>       
                             <td style='font-size: 20px;' bgcolor='#DCDCDC'><p>".$result['title']."</p></td>  
                        </tr> 
                        <tr>
                             <td bgcolor='#DCDCDC'><h2>รายละเอียด : </h2></td>
                             <td style='font-size: 20px;' bgcolor='#DCDCDC'><p>".$result['description']."</p></td>
                        </tr>  
                        <tr> 
                             <td bgcolor='#DCDCDC'><h2>เพิ่มเติม : </h2></td>
                             <td style='font-size: 20px;' bgcolor='#DCDCDC'><p>".$result['descriptions']."</p></td>
                        </tr>    
                        <tr>   
                             <td bgcolor='#DCDCDC'><h2>วันที่จอง : </h2></td>
                             <td style='font-size: 20px;' bgcolor='#DCDCDC'><p>".date('d - m - Y',strtotime($result['start_datetime']))."</p></td>
                        </tr>
                        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> <tr></tr> <tr></tr><tr></tr> <tr></tr> <tr></tr><tr></tr> <tr></tr> <tr></tr><tr></tr> <tr></tr> <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                   ";
                   
              }  
         } 
	?>

<button onclick="topFunction()" id="myBtn" title="Go to top">เลื่อนขึ้นไปข้างบน</button>
</div>

































        
<script language="JavaScript">
var TRange=null;
function findString (str) {
 if (parseInt(navigator.appVersion)<4) return;
 var strFound;
 if (window.find) {

  // CODE FOR BROWSERS THAT SUPPORT window.find
  strFound=self.find(str);
  if (strFound && self.getSelection && !self.getSelection().anchorNode) {
   strFound=self.find(str)
  }
  if (!strFound) {
   strFound=self.find(str,0,1)
   while (self.find(str,0,1)) continue
  }
 }
 else if (navigator.appName.indexOf("Microsoft")!=-1) {

  // EXPLORER-SPECIFIC CODE

  if (TRange!=null) {
   TRange.collapse(false)
   strFound=TRange.findText(str)
   if (strFound) TRange.select()
  }
  if (TRange==null || strFound==0) {
   TRange=self.document.body.createTextRange()
   strFound=TRange.findText(str)
   if (strFound) TRange.select()
  }
 }
 else if (navigator.appName=="Opera") {
  alert ("ไม่รองรับเบราว์เซอร์ Opera ขออภัย....")
  return;
 }
 if (!strFound) alert ("ไม่พบคำ '"+str+"' ในส่วนนี้")
 return;
}
//-->

let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document with animation
mybutton.addEventListener("click", function() {
  scrollToTop(600); // Adjust the duration (in milliseconds) as needed
});

function scrollToTop(duration) {
  const startingY = window.pageYOffset;
  const startTime = performance.now();

  function scrollStep(timestamp) {
    const currentTime = timestamp || performance.now();
    const elapsed = currentTime - startTime;

    window.scrollTo(0, easeInOutCubic(elapsed, startingY, -startingY, duration));

    if (elapsed < duration) {
      requestAnimationFrame(scrollStep);
    }
  }

  function easeInOutCubic(t, b, c, d) {
    t /= d/2;
    if (t < 1) return c/2*t*t*t + b;
    t -= 2;
    return c/2*(t*t*t + 2) + b;
  }

  requestAnimationFrame(scrollStep);
}

</script>