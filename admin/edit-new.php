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
if($_GET['say_id']  != NULL)
  {
	 include('../config.php');
	 $id	=	$_GET['say_id'];
	
	 $sql_new	=	"select  *  from news  where  new_id  =  '".$id."' ";
	 $result_new	=	mysql_query($sql_new);
	 while($show	=	mysql_fetch_assoc($result_new))
	 		{
?>    
   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_new" method="post" name="frm_edit" id="frm_edit">
   	    <table width="460" border="0" align="center" cellpediting="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">แก้ไขข้อมูลข่าวสาร</h2></td>
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
   	        <td height="40" colspan="2" align="left"><input name="new_title" type="text" class="txt-field" id="new_title" value="<?=$show['new_title'];?>" size="50" maxlength="100"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">รายละเอียด</td>
   	        <td width="10" height="40"></td>
   	        <td height="40" colspan="2" align="left"><textarea name="new_msg" cols="52" rows="4" class="txt-area" id="new_msg"><?=$show['new_msg'];?></textarea></td>
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
   	        <td width="100" height="70" align="right">
            <input name="hid_id" type="hidden" id="hid_id" value="<?=$_GET['say_id'];?>">
            <input name="hid_year" type="hidden" id="hid_year" value="<?=$_GET['say_year'];?>">
            <input name="hid_title" type="hidden" id="hid_title" value="<?=$show['new_title'];?>">
            <input name="hid_msg" type="hidden" id="hid_msg" value="<?=$show['new_msg'];?>"></td>
   	        <td width="10" height="70"></td>
   	        <td width="175" height="70" align="center"><input type="submit" name="submit" id="submit" value="edit"  class="btn"  onClick="return  check_edit();"></td>
   	        <td width="175" height="70" align="center"><input type="button" name="button" id="button" value="exit" class="btn"  onClick="window.location='show-new.php?link=uri_new&say=1&say_year=<?=$_GET['say_year'];?>';"></td>
          </tr>
        </table>
  </form>
<?php
			}
  }
?>
</div>



<?php
include('footer.php');
if($_SERVER['REQUEST_METHOD']  ==  'POST')
  {
	  include('../config.php');
	  $new_id  =  $_POST['hid_id'];
	  $year  =  $_POST['hid_year'];
	  
	  $new_title	=	$_POST['new_title'];
	  $new_msg	=	$_POST['new_msg'];	 
		  
	  $sql_edit	=	"update news  set  new_title  =  '".$new_title."' , new_msg  =  '".$new_msg."' , new_date  =  SYSDATE() ,  admin_user  =  '".$_SESSION['se_id']."' where  new_id  =  '".$new_id."' ";
	  $result_edit  =  mysql_query($sql_edit) or die (mysql_error());
	  if($result_edit  == true)
	    {
			echo  "<script>alert('Edit succeed full');window.location='edit-new.php?link=uri_new&say_id=".$new_id."&say_year=".$year."';</script>";	
		}
	  mysql_close($config);
  }
?>


<script>
function  check_edit()
  {
		var	check1	=	document.getElementById('new_title');
		var	check2	=	document.getElementById('new_msg');
		
		var	hid1	=	document.getElementById('hid_title');
		var	hid2	=	document.getElementById('hid_msg');
		
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
		else if(check1.value  ==  hid1.value  &&  check2.value  == hid2.value)
		  {
			  alert('กรุณาเปลี่ยนแปลงข้อมูล');
			  check1.focus();
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