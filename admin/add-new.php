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

   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_new" method="post" name="frm_add" id="frm_add">
   	    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">เพิ่มข้อมูลข่าวสาร</h2></td>
          </tr>
   	      <tr>
   	        <td width="100" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="175" height="15" align="left"></td>
   	        <td width="175" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">หัวข้อข่าวสาร</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="new_title" type="text" class="txt-field" id="new_title" size="50" maxlength="100"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">รายละเอียด</td>
   	        <td width="10" height="40"></td>
   	        <td height="40" colspan="2" align="left"><textarea name="new_msg" cols="52" rows="4" class="txt-area" id="new_msg"></textarea></td>
          </tr>
   	      <tr>
   	        <td width="100" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="175" height="15" align="left"></td>
   	        <td width="175" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="175" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="175" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="70" align="right"></td>
   	        <td width="10" height="70"></td>
   	        <td width="175" height="70" align="center"><input type="submit" name="submit" id="submit" value="Save"  class="btn"  onClick="return  check_add();"></td>
   	        <td width="175" height="70" align="center"><input type="reset" name="reset" id="reset" value="Reset"  class="btn"></td>
          </tr>
        </table>
  </form>

</div>



<?php
include('footer.php');
if($_SERVER['REQUEST_METHOD']  ==  'POST')
  {
	  include('../config.php');
	  $new_title	=	$_POST['new_title'];
	  $new_msg	=	$_POST['new_msg'];	 
		  
	  $sql_add	=	"insert  into  news (new_title , new_msg , new_date , admin_user)  values ( '".$new_title."' , '".$new_msg."' , SYSDATE() , '".$_SESSION['se_id']."' ) ";
	  $result_add  =  mysql_query($sql_add) or die (mysql_error());
	  if($result_add  == true)
	    {
			echo  "<script>alert('Save succeed full');window.location='add-new.php?link=uri_new';</script>";	
		}
	  mysql_close($config);
  }
?>


<script>
function  check_add()
  {
		var	check1	=	document.getElementById('new_title');
		var	check2	=	document.getElementById('new_msg');
		
		if(check1.value  ==  '')
		   {
			   alert('กรุณากรอก  หัวข้อข่าวสาร');
			   check1.focus();
			   return  false;
		   }
		else  if(check2.value  ==  '')
		   {
			   alert('กรุณากรอก  รายละเอียด');
			   check2.focus();
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