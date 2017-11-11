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
   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_group" method="post" name="frm_add" id="frm_add">
   	    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">เพิ่มข้อมูลหมวดผลิตภัณฑ์</h2></td>
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
   	        <td height="40" colspan="2" align="left"><input name="group_name" type="text" class="txt-field" id="group_name" size="40" maxlength="50"></td>
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
   	        <td width="150" height="70" align="right"></td>
   	        <td width="10" height="70"></td>
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="Save"  class="btn" onClick="return check_add();"></td>
   	        <td width="150" height="70" align="center"><input type="reset" name="reset" id="reset" value="Reset"  class="btn"></td>
          </tr>
        </table>
  	  </form>
    </div>

<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST')
   {
	   include('../config.php');
	   
		$group_name  =  $_POST['group_name'];
		
		
		$sql_check  =  "select  group_name  from  groups  where  group_name  =  '".$group_name."'  ";  
		$result_check  =  mysql_query($sql_check);
		$check_rows = mysql_num_rows($result_check);
		if($check_rows  ==  true)
		   {
			   echo "<script>alert('ขออภัย  หมวดสินค้า  ซ้ำ');history.back();</script>";
		   }
		else
		   {
			   $sql_add  =  "insert into  groups  (group_name ) values (  '".$group_name."'  )  ";
			   $result_add  =   mysql_query($sql_add);
			   if($result_add  ==  true)
			     {
					 echo  "<script>alert('save succeed full');window.location='add-group.php?link=uri_group';</script>";
				 }
		   }
		mysql_close($config);
   }

include('footer.php');
?>

<script type="text/javascript">
function  check_add()
   {

		var	check3	=	document.getElementById('group_name');	
		
		if(check3.value == '')
			{
				alert('กรอกข้อมูล  ชื่อหมวดสินค้า');
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