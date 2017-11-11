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
	<div class="con-login">
        <?php
	$group_id  =	$_GET['say_id'];
	if($group_id  !=  NULL)
	   {
			include('../config.php');
			$sql_show	=	"select * from groups where  group_id  =  '".$group_id."' ";
			$result_show	=	mysql_query($sql_show);
			while($show		=	mysql_fetch_assoc($result_show))
					{
	 ?>
   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_group" method="post" name="frm_edit" id="frm_edit">
   	    <table width="460" border="0" align="center" cellpediting="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">แก้ไขข้อมูลหมวดผลิตภัณฑ์</h2></td>
          </tr>
   	      <tr>
   	        <td width="150" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="150" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="40" align="right">ชื่อหมวดสินค้า</td>
   	        <td width="10" height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="group_name" type="text" class="txt-field" id="group_name" value="<?=$show['group_name'];?>" size="40" maxlength="50"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="150" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="70" align="right"><input name="hid_id" type="hidden" id="hid_id" value="<?=$_GET['say_id'];?>">
            <input name="hid_name" type="hidden" id="hid_name" value="<?=$show['group_name'];?>"></td>
   	        <td width="10" height="70"></td>
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="Edit"  class="btn" onClick="return check_edit();"></td>
   	        <td width="150" height="70" align="center"><input type="button" name="button" id="button" value="exit"  class="btn" onClick="window.location='show-group.php?link=uri_group';"></td>
          </tr>
        </table>
  	  </form>
      <?php
					}
	   }
	  ?>
    </div>

<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST')
   {
	   include('../config.php');
	   $group_id  =  $_POST['hid_id'];
	   $group_name  =  $_POST['group_name'];
		
		
		$sql_edit  =  "update  groups  set  group_name = '".$group_name."'  where  group_id  =  '".$group_id."'   ";
		$result_edit  =   mysql_query($sql_edit);
		if($result_edit  ==  true)
		  {
			 echo  "<script>alert('Edit succeed full');window.location='edit-group.php?link=uri_group&say_id=".$group_id."';</script>";
		  }
		mysql_close($config);
   }

include('footer.php');
?>

<script type="text/javascript">
function  check_edit()
   {

		var	check3	=	document.getElementById('group_name');	
		var	hid3	=	document.getElementById('hid_name');	
		
		if(check3.value == '')
			{
				alert('กรอกข้อมูล  ชื่อหมวดสินค้า');
				check3.focus()
				return  false;
			}
		else if(check3.value  ==  hid3.value)
		   {
			   alert('กรุณาเปลี่ยนแปลงข้อมูล');
			   check3.focus()
			   return  false;
		   }
		else
			{
				return  true;	
			}
			   
	   
   }
</script>
</body>
</html>