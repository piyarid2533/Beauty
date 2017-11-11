<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../design.css">

<body>
<div class="bar">
	<div class="bar-top">
	<table width="1000" border="0" align="left" cellpadding="0" cellspacing="0">
	      <tr>
	        <td width="30"><img src="../img/icon-home.png" width="26" height="26"  alt=""/></td>
	        <td width="70"><a href="../index.php">หน้าหลัก</a></td>
	        <td width="30"><img src="../img/icon-regis.png" width="26" height="26"  alt=""/></td>
	        <td width="100"><a href="../register.php">สมัครสมาชิก</a></td>
	        <td width="30"><img src="../img/icon-inf.png" width="26" height="26"  alt=""/></td>
	        <td width="70"><a href="../news.php">ข่าวสาร</a></td>
	        <td width="30"><img src="../img/icon-pro.png" width="26" height="26"  alt=""/></td>
	        <td width="80"><a href="../show-spe.php">โปรโมชั่น</a></td>
	        <td width="30"><img src="../img/icon-msg.png" width="26" height="26"  alt=""/></td>
	        <td width="70"><a href="../web-board.php">สอบถาม</a></td>
	        <td width="360" align="right">

            	<img src="../img/icon-user.png" width="26" height="26"  alt=""/>	  &nbsp;&nbsp;  <?=$_SESSION['se_name']?>&nbsp;&nbsp;&nbsp;&nbsp;

            </td>
	        <td width="30" align="center">
            
            <img src="../img/icon-login.png" width="26" height="26"  alt=""/>
            
            </td>
	        <td width="70" align="left">
         
           	  <a href="../logout.php" onClick="return  confirm('ยืนยันการออกจากระบบ');">Sign out</a>
            
            </td>
	        </tr>
        </table>
  </div>
</div>
<div class="clear-top"></div>
<div class="container">
   <div class="page-header">
       <h1><span class="cl-green">Users</span></h1>
   </div>
   </br>
   <div class="block-menu">
     <div class="img"><img src="../img/Clocks.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-user.php?link=uri_book"  style="text-decoration:none;" class="cl-pink" >จัดการจองเวลา</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/Sitemap.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-user.php?link=uri_det"  style="text-decoration:none;" class="cl-pink" >จัดการจองรายการ</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/User.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="show-resume.php"  style="text-decoration:none;" class="cl-pink">ประวัติใช้บริการ</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/Man.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="edit-member.php" style="text-decoration:none;" class="cl-pink">ข้อมูลส่วนตัว</a></div>
   </div>
   <div class="clear-fix"></div>
</div>
<br>
<?php
$url  =  $_GET['link'];
if($url  !=  NULL)
  {
?>
<div class="container-none">
	<?php
    if($url  ==  'uri_book')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-user.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="book.php?link=uri_book" style="text-decoration:none;" class="cl-write">จองเวลา</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-book.php?link=uri_book" style="text-decoration:none;" class="cl-write">ตรวจสอบจองเวลา</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    else if($url  ==  'uri_det')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-user.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-det.php?link=uri_det" style="text-decoration:none;" class="cl-write">จองรายการ</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-det.php?link=uri_det" style="text-decoration:none;" class="cl-write">ตรวจสอบรายการจอง</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    ?>



</div>
<?php
  }
?>
<br>