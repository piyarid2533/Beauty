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

   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_product" method="post" enctype="multipart/form-data" name="frm_add" id="frm_add">
   	    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">เพิ่มข้อมูลสินค้า</h2></td>
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
   	        <td height="40" align="right"><span class="cl-red"> * </span> หมวดสินค้า</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left">
            <select name="group_id" id="group_id" class="txt-select">
               <option value=""  selected></option>
               <?php
               include('../config.php');
			   $sql_show	=	"select  *  from  groups  order  by  group_name  asc";
			   $result_show	=	mysql_query($sql_show);
			   while($show	=	mysql_fetch_assoc($result_show))
			   			{
			   ?>
               <option value="<?=$show['group_id'];?>"  ><?=$show['group_name'];?></option>
               <?php
						}
			   ?>
            </select>
            </td>
          </tr>
   	      <tr>
   	        <td height="40" align="right"><span class="cl-red"> * </span> ชื่อสินค้า</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="pro_name" type="text" class="txt-field" id="pro_name" size="40" maxlength="100"></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right">รายละเอียด</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><textarea name="pro_detail" cols="42" rows="4" id="pro_detail" class="txt-area"></textarea></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right"><span class="cl-red"> * </span> จำนวน</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="pro_qty" type="text" class="txt-field" id="pro_qty" size="3" maxlength="3"  onKeyPress="return  check_number(event);"></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right"><span class="cl-red"> * </span> หน่วยนับ</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left">
            <select name="pro_unit" id="pro_unit" class="txt-select">
            	<option value="" selected></option>
				<option value="กล่อง">กล่อง</option>
   	          	<option value="หลอด">หลอด</option>
   	          	<option value="ชุด">ชุด</option>
   	          	<option value="ครั้ง">ครั้ง</option>
   	          	<option value="ขวด">ขวด</option>
            </select></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right"><span class="cl-red"> * </span> ราคาต้นทุน</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="pro_cost" type="text" class="txt-field" id="pro_cost" size="10" maxlength="10"  onKeyPress="return  check_number(event);"></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right"><span class="cl-red"> * </span> ราคาขาย</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="pro_sell" type="text" class="txt-field" id="pro_sell" size="10" maxlength="10"  onKeyPress="return  check_number(event);"></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right">รูปภาพ</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input type="file" name="pro_img" id="pro_img"  class="txt-field"></td>
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
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="Save"  class="btn"  onClick="return  check_add();"></td>
   	        <td width="150" height="70" align="center"><input type="reset" name="reset" id="reset" value="Reset"  class="btn"></td>
          </tr>
        </table>
  </form>

</div>

<?php
include('footer.php');

if($_SERVER['REQUEST_METHOD']  ==  'POST')
   {
	   include('../config.php');
		$group_id	=	$_POST['group_id'];
		$pro_name  =	$_POST['pro_name'];
		$pro_detail	=	$_POST['pro_detail'];
		$pro_qty	=	$_POST['pro_qty'];
		$pro_unit	=	$_POST['pro_unit'];
		$pro_cost	  =  $_POST['pro_cost'];
		$pro_sell	=	$_POST['pro_sell'];   
		
		$pro_img	=	$_FILES['pro_img']['name'];
		$img_type	=	$_FILES['pro_img']['type'];
		
		if($pro_img != NULL)
		  {
			$time = time(); 
			if($img_type == "image/gif") 
			  {
				$pro_img = date('Y')."_".$time.".gif";
			  }
			else if($img_type == "image/bmp") 
			  {
				$pro_img = date('Y')."_".$time.".bmp"; 
			  }
			else if($img_type == "image/png") 
			  {
				$pro_img = date('Y')."_".$time.".png"; 
			  }
			else if(($img_type == "image/jpg") or ($img_type=="image/jpeg") or ($img_type == "image/pjpeg")) 
			  {
				$pro_img = date('Y')."_".$time.".jpg"; 
			  }
			else
			  {
				echo "<script>alert('ขออภัย : ไม่สามารถ upload ชนิด file นี้ได้');history.back();</script>";
				exit();  
			  }
			  
			 $sql_add		=	"insert  into  products  ( pro_name , pro_detail , pro_qty , pro_unit , pro_cost , pro_sell , pro_img , group_id  )  values  ('".$pro_name."'  ,  '".$pro_detail."'  ,  '".$pro_qty."'  ,  '".$pro_unit."'  ,  '".$pro_cost."'  ,  '".$pro_sell."'  ,  '".$pro_img."'  ,  '".$group_id."' ) ";
			 $result_add		=	mysql_query($sql_add) or  die (mysql_error());
			 if($result_add  ==  true)
			   {
				   move_uploaded_file($_FILES['pro_img']['tmp_name'], '../img_product/'.$pro_img);
					echo  "<script>alert('Save  succeed  full');window.location='add-product.php?link=uri_product';</script>";   
			   }
		  }
		else
		  {
			  $sql_add		=	"insert  into  products  ( pro_name , pro_detail , pro_qty , pro_unit , pro_cost , pro_sell ,  group_id  )  values  ('".$pro_name."'  ,  '".$pro_detail."'  ,  '".$pro_qty."'  ,  '".$pro_unit."'  ,  '".$pro_cost."'  ,  '".$pro_sell."'  ,  '".$group_id."' ) ";
			 $result_add		=	mysql_query($sql_add) or  die (mysql_error());
			 if($result_add  ==  true)
			   {
					echo  "<script>alert('Save  succeed  full');window.location='add-product.php?link=uri_product';</script>";   
			   }
		  }
		  
		mysql_close($config);
   }
?>


<script>
function  check_add()
   {
	   var	check1	=	document.getElementById('group_id');
	   var	check3	=	document.getElementById('pro_name');
	   var	check4	=	document.getElementById('pro_qty');
	   var	check5	=	document.getElementById('pro_unit');
	   var	check6	=	document.getElementById('pro_cost');
	   var	check7	=	document.getElementById('pro_sell');

		if(check1.value  ==  '')
		  {
			  alert('เลือก  หมวดสินค้า');
			  check1.focus();
			  return  false;  
		  }
	  	else  if(check3.value  ==  '')
		 {
			  alert('กรอก  ชื่อสินค้า');
			  check3.focus();
			  return  false;  
		  }
	  	else  if(check4.value  ==  '')
		 {
			  alert('กรอก  จำนวนสินค้า');
			  check4.focus();
			  return  false;  
		  }		  
	  	else  if(check5.value  ==  '')
		 {
			  alert('กรอก  หน่วยสินค้า');
			  check5.focus();
			  return  false;  
		  }
	  	else  if(check6.value  ==  '')
		 {
			  alert('กรอก  ราคาต้นทุน');
			  check6.focus();
			  return  false;  
		  }	
	  else  if(check7.value  ==  '')
		 {
			  alert('กรอก  ราคาขาย');
			  check7.focus();
			  return  false;  
		  }	
	  else  
	     {
			return  true; 
		 }
   }

function	check_number(e)
	{
		var	input	=	"";
		if (window.event)//ตรวจสอบเหตุการณ์
			{
				input	=	e.keyCode;//รองรับไออี
			}
		else
			{
				input	=	e.which;//นอกจากไออี
			}
		
		if (input >= 48  &&  input <= 57)//เลข 0-10
			{
				return true;
			}
		else
			{
				alert('กรุณากรอกข้อมูลเป็นตัวเลข');
				return false;
			}
			
	}
</script>
</body>
</html>