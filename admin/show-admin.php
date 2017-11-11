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
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลผู้ดูแลระบบ</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="30" height="40" align="left">#</th>
    	    <th width="200" height="40" align="left">Username</th>
    	    <th width="650" height="40" align="left">ชื่อ - นามสกุล</th>
    	    <th width="60" height="40" align="left">แก้ไข</th>
    	    <th width="60" height="40" align="left">ลบ</th>
  	    </tr>
        <?php
        include('../config.php');
		$sql_show	=	"select * from admins order by admin_user  asc";
		$result_show	=	mysql_query($sql_show);
		$line  = 0;
		while($show		=	mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
    	  <tr>
    	    <td width="30" height="35" align="left"><?=$line;?></td>
    	    <td width="200" height="35" align="left"><?=$show['admin_user'];?></td>
    	    <td width="650" height="35" align="left"><?=$show['admin_name'];?></td>
    	    <td width="60" height="35" align="left"><a href="edit-admin.php?link=uri_admin&say_user=<?=$show['admin_user'];?>"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
    	    <td width="60" height="35" align="left"><a href="del-admin.php?link=uri_admin&say_user=<?=$show['admin_user'];?>" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
  	    </tr>
        <?php
				}
		?>
  	  </table>
  </div>
</div>

<?php
include('footer.php');
?>
</body>
</html>