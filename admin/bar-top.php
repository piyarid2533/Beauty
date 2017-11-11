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
       <h1><span class="cl-green">Administrators</span></h1>
   </div>
   </br>
   <div class="block-menu">
     <div class="img"><img src="../img/User.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-admin.php?link=uri_admin"  style="text-decoration:none;" class="cl-pink" >จัดการผู้ดูแลระบบ</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/User.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-admin.php?link=uri_psn" style="text-decoration:none;" class="cl-pink">จัดการพนักงาน</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/User.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-admin.php?link=uri_user" style="text-decoration:none;" class="cl-pink">จัดการสมาชิก</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/Document.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-admin.php?link=uri_new" style="text-decoration:none;" class="cl-pink">จัดการข่าวสาร</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/Man.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="edit-profile.php" style="text-decoration:none;" class="cl-pink">ข้อมูลส่วนตัว</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><a href="../img/Sitemap.png"><img src="../img/Sitemap.png" width="24" height="24"  alt=""/></a></div>
     <div class="text"><a href="index-admin.php?link=uri_group" style="text-decoration:none;" class="cl-pink">จัดการหมวดผลิตภัณฑ์</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/Cart2.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-admin.php?link=uri_product" style="text-decoration:none;" class="cl-pink">จัดการผลิตภัณฑ์</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/Rss 1.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-admin.php?link=uri_pro" style="text-decoration:none;" class="cl-pink">จัดการโปรโมชั่น</a></div>
   </div>
   <div class="block-menu">
     <div class="img"><img src="../img/Wizard.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="book.php" style="text-decoration:none;" class="cl-pink">ข้อมูลการจอง</a></div>
   </div>
  
  <div class="block-menu">
     <div class="img"><img src="../img/Mobile.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="index-admin.php?link=uri_sms" style="text-decoration:none;" class="cl-pink">จัดกการระบบส่ง sms</a></div>
  </div>
  
  <div class="block-menu">
     <div class="img"><img src="../img/Currency Dollar.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="show-book.php" style="text-decoration:none;" class="cl-pink">รับชำระเงิน</a></div>
  </div>
  
  <div class="block-menu">
     <div class="img"><img src="../img/Luggage.png" width="24" height="24"  alt=""/></div>
     <div class="text"><a href="show-debit.php" style="text-decoration:none;" class="cl-pink">ข้อมูลรายรับ</a></div>
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
    if($url  ==  'uri_admin')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-admin.php?link=uri_admin" style="text-decoration:none;" class="cl-write">เพิ่มข้อมูลผู้ดูแลระบบ</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-admin.php?link=uri_admin" style="text-decoration:none;" class="cl-write">ตรวจสอบผู้ดูแลระบบ</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    else if($url  ==  'uri_psn')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-personnel.php?link=uri_psn" style="text-decoration:none;" class="cl-write">เพิ่มข้อมูลพนักงาน</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-psn.php?link=uri_psn" style="text-decoration:none;" class="cl-write">ตรวจสอบข้อมูลพนักงาน</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    else if($url  ==  'uri_user')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-member.php?link=uri_user" style="text-decoration:none;" class="cl-write">เพิ่มข้อมูลสมาชิก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-member.php?link=uri_user" style="text-decoration:none;" class="cl-write">ตรวจสอบข้อมูลสมาชิก</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    else if($url  ==  'uri_new')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-new.php?link=uri_new" style="text-decoration:none;" class="cl-write">เพิ่มข้อมูลข่าวสาร</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-new.php?link=uri_new" style="text-decoration:none;" class="cl-write">ตรวจสอบข้อมูลข่าวสาร</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    else if($url  ==  'uri_group')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-group.php?link=uri_group" style="text-decoration:none;" class="cl-write">เพิ่มข้อมูลหมวดสินค้า</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-group.php?link=uri_group" style="text-decoration:none;" class="cl-write">ตรวจสอบหมวดสินค้า</a></div>
        </div>
        <div class="clear-fix"></div>
            <?php	   
       }
    else if($url  ==  'uri_product')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-product.php?link=uri_product" style="text-decoration:none;" class="cl-write">เพิ่มข้อมูลสินค้า</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-product.php?link=uri_product" style="text-decoration:none;" class="cl-write">ตรวจสอบข้อมูลสินค้า</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    else if($url  ==  'uri_pro')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="add-spe.php?link=uri_pro" style="text-decoration:none;" class="cl-write">เพิ่มข้อมูลโปรโมชั่น</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="show-spe.php?link=uri_pro" style="text-decoration:none;" class="cl-write">ตรวจสอบข้อมูลโปรโมชั่น</a></div>
        </div>
        <div class="clear-fix"></div>
    <?php	   
       }
    else if($url  ==  'uri_sms')
       {
    ?>
        <div class="block-menu">
            <div class="img"><img src="../img/Home2.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="index-admin.php" style="text-decoration:none;"  class="cl-write">เมนูหลัก</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Plus.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="set-sms.php?link=uri_sms" style="text-decoration:none;" class="cl-write">ตั้งค่าข้อมูล sms</a></div>
        </div>
        <div class="block-menu">
            <div class="img"><img src="../img/Folder3.png" width="24" height="24"  alt=""/></div>
            <div class="text"><a href="send-auto-sms.php?link=uri_sms" target="_blank" class="cl-write" style="text-decoration:none;">เปิดระบบ ส่ง sms</a></div>
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