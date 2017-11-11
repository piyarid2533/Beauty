<?php 
error_reporting(0);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="design.css">

<body>
<div class="bar">
	<div class="bar-top">
	<table width="1000" border="0" align="left" cellpadding="0" cellspacing="0">
	      <tr>
	        <td width="30"><img src="img/icon-home.png" width="26" height="26"  alt=""/></td>
	        <td width="70"><a href="index.php">หน้าหลัก</a></td>
	        <td width="30"><img src="img/icon-regis.png" width="26" height="26"  alt=""/></td>
	        <td width="100"><a href="register.php">สมัครสมาชิก</a></td>
	        <td width="30"><img src="img/icon-inf.png" width="26" height="26"  alt=""/></td>
	        <td width="70"><a href="news.php">ข่าวสาร</a></td>
	        <td width="30"><img src="img/icon-pro.png" width="26" height="26"  alt=""/></td>
	        <td width="80"><a href="show-spe.php">โปรโมชั่น</a></td>
	        <td width="30"><img src="img/icon-msg.png" width="26" height="26"  alt=""/></td>
	        <td width="70"><a href="web-board.php">สอบถาม</a></td>
	        <td width="360" align="right">
            <?php
            if($_SESSION['se_status']  !=  NULL)
			  {
			?>
            	<img src="img/icon-user.png" width="26" height="26"  alt=""/>	  &nbsp;&nbsp;  <?=$_SESSION['se_name']?>&nbsp;&nbsp;&nbsp;&nbsp;
            <?	  
			  }
			?>
            </td>
	        <td width="30" align="center">
            
            <img src="img/icon-login.png" width="26" height="26"  alt=""/>
            
            </td>
	        <td width="70" align="left">
            <?php
            if($_SESSION['se_status']  ==  'user')
			  {
			?>
           	  <a href="logout.php"  onClick="return  confirm('ยืนยันการออกจากระบบ');">Sign out</a>
            <?	  
			  }
			else if($_SESSION['se_status']  ==  'admin')
			  {
			?>
           	  <a href="logout.php" onClick="return  confirm('ยืนยันการออกจากระบบ');">Sign out</a>
            <?	 
			  }
			else
			  {
		    ?>
              <a href="main-login.php">Sign in</a>
            <?	 
			  }
			?>
            
            </td>
	        </tr>
        </table>
  </div>
</div>
<div class="clear-top"></div>
<div class="banner">
  <img src="img/banner-home.jpg" width="960" height="360"  alt=""/>
</div>
<div class="clear-banner"></div>
