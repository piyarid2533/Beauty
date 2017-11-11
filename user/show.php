<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../design.css">
</head>

<body>
<?php
include('bar-top.php');
?>

<div class="container">
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูล</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="30" height="40" align="left">#</th>
    	    <th width="200" align="left">&nbsp;</th>
    	    <th width="200" align="left">&nbsp;</th>
    	    <th width="200" align="left">&nbsp;</th>
    	    <th width="125" align="left">&nbsp;</th>
    	    <th width="125" height="40" align="left">Username</th>
    	    <th width="60" height="40" align="left">แก้ไข</th>
    	    <th width="60" height="40" align="left">ลบ</th>
  	    </tr>
    	  <tr>
    	    <td width="30" height="35" align="left">&nbsp;</td>
    	    <td width="200" align="left">&nbsp;</td>
    	    <td width="200" align="left">&nbsp;</td>
    	    <td width="200" align="left">&nbsp;</td>
    	    <td width="125" align="left">&nbsp;</td>
    	    <td width="125" height="35" align="left">&nbsp;</td>
    	    <td width="60" height="35" align="left"><a href="#"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
    	    <td width="60" height="35" align="left"><a href="#" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
  	    </tr>
  	  </table>
  </div>
</div>

<?php
include('footer.php');
?>
</body>
</html>