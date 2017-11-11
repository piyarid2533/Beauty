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
   	  <form action="" method="post" name="frm_search" id="frm_search">
   		<table width="500" border="0" cellspacing="0" cellpadding="0">
      		  <tr>
      		    <td width="200" height="40" align="center" bgcolor="#43BF94"><h3 ><span class="cl-write"> menu search</span></h3></td>
      		    <td width="10" height="40">&nbsp;</td>
      		    <td width="200" height="40">
                <select name="find_group" id="find_group" class="txt-select">
                	<option  value="" selected>เลือก  หมวดสินค้า</option>
                    <?php
                    include('../config.php');
					$sql_group	=	"select  *  from  groups  order by  group_name  asc";
					$result_group  =  mysql_query($sql_group);
					while($group  =  mysql_fetch_assoc($result_group))
							{
					?>
                  <option  value="<?=$group['group_id']?>" ><?=$group['group_name'];?></option>
                    <?php
							}
					mysql_close($config);		
					?>
                    
   		        </select>
                </td>
      		    <td width="90" height="40" align="center"><input type="submit" name="btn_search" id="btn_search" value="search" class="btn"  onClick="return  check_search();"></td>
	      </tr>
	    </table>
  </form>
 <?php
 if($_REQUEST['btn_search'])
   {
	   include('../config.php');
	   $group_id	=	$_POST['find_group']; 

	   
	   $sql_pro	=	"select  *  from  products  where  group_id  =  '".$group_id."' order by  pro_sell  asc";
	   $result_pro	=	mysql_query($sql_pro);
	   $line  =  0;
	   $check_rows  =  mysql_num_rows($result_pro);
	   if($check_rows  ==  false)
	     {
			 echo  "<script>alert('ไม่พบข้อมูล');window.location='show-product.php?link=uri_pro';</script>";
		 }
	   else
	     {
 ?>   
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลสินค้าในการจัดโปรโมชั่น</span></h3>
   	</div>
  	</br>


	<form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_pro" method="post" name="frm_add" id="frm_add">
    <div class="add">
      <table width="460" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="150" height="50" align="center" bgcolor="#F5F5F5">ชื่อชุดโปรโมชั่น</td>
          <td height="50">&nbsp;</td>
          <td width="300" height="50"><input name="spe_name" type="text" id="spe_name" size="40" maxlength="100" class="txt-field"></td>
        </tr>
        <tr>
          <td width="150" height="50" align="center" bgcolor="#F5F5F5">เริ่มต้นการจัดโปรโมชั่น</td>
          <td width="10" height="50">&nbsp;</td>
          <td width="300" height="50"><input name="spe_start" type="date" id="spe_start" max="2018-12-31" min="2013-01-01" class="txt-field"></td>
        </tr>
        <tr>
          <td width="150" height="50" align="center" bgcolor="#F5F5F5">สิ้นสุดการจัดโปรโมชั่น</td>
          <td width="10" height="50">&nbsp;</td>
          <td width="300" height="50"><input name="spe_end" type="date" id="spe_end" max="2018-12-31" min="2013-01-01" class="txt-field"></td>
        </tr>
      </table>
    </div>
    <br>
    <div class="show">
	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <th width="50" height="40" align="left" bgcolor="#F5F5F5">#</th>
	      <th width="80" align="left" bgcolor="#F5F5F5">รูป</th>
	      <th width="430" height="40" align="left" bgcolor="#F5F5F5">รายการสินค้า</th>
	      <th width="150" height="40" align="left" bgcolor="#F5F5F5">ราคาเดิม</th>
	      <th width="130" align="left" bgcolor="#F5F5F5">เลือกจัดโปร</th>
	      <th width="160" height="40" align="left" bgcolor="#F5F5F5">New ราคา</th>
        </tr>
        <?php
        	   while($pro		=	mysql_fetch_assoc($result_pro))
	   			{
					$line++;
		?>
	    <tr>
	      <td width="50" height="80" align="left"><?=$line;?></td>
	      <td width="80" height="80" align="left"><img src="../img_product/<?=$pro['pro_img'];?>"  alt="" width="60" height="60"/></td>
	      <td width="430" height="80" align="left"><?=$pro['pro_name'];?>
          <input name="pro_id<?=$line;?>" type="hidden" id="pro_id<?=$line;?>" value="<?=$pro['pro_id'];?>"></td>
	      <td width="150" height="80" align="left"><?=$pro['pro_sell'];?></td>
	      <td width="130" height="80" align="left"><input name="tick<?=$line;?>" type="checkbox" id="tick<?=$line;?>" onClick="return  check_click(this.value);" value="1"></td>
	      <td width="160" height="80" align="left"><input name="new_price<?=$line;?>" type="text" id="new_price<?=$line;?>" size="13" maxlength="10" class="txt-field"  onKeyPress="return check_number(event);"></td>
        </tr>
        <?php
				}
		?>
	    <tr>
	      <td height="70" colspan="4" align="left">&nbsp;</td>
	      <td width="130" height="70" align="left"><input type="submit" name="btn_add" id="btn_add" value="Save" class="btn"  onClick="return  check_add();"></td>
	      <td width="160" height="70" align="left"><input type="button" name="button" id="button" value="New search" class="btn"></td>
        </tr>
      </table>
    </div>	
    <input name="row_count" type="hidden" id="row_count" value="<?=$line;?>">
  	</form>
<?php
		 }
?>		 
	  <input name="row_count" type="hidden" id="row_count" value="<?=$line;?>">
<?php      
   }
?>	
</div>

<?php
include('footer.php');

if($_SERVER['REQUEST_METHOD']  ==  'POST'  and  $_REQUEST['btn_add'])
  {
	  	include('../config.php');
		$row_count	=	$_POST['row_count'];	  
		$spe_name  =  $_POST['spe_name'];
		$spe_start	=	$_POST['spe_start'];
		$spe_end		=	$_POST['spe_end'];
		
		for($i = 1; $i <= $row_count; $i++)
		    {
				
				$tick	  =  $_POST['tick'.$i];
				if($tick  ==  1)
				  {
					  	$pro_id	=	$_POST['pro_id'.$i];
					  	$new_price	=	$_POST['new_price'.$i];
					  	$sql_check	=	"select  *  from  specials  where spe_end  > '".$spe_start."'  and  pro_id  =  '".$pro_id."' ";
						$result_check	=	mysql_query($sql_check);
						$rows_check	=	mysql_num_rows($result_check);
						if($rows_check  ==  true)
						  {
							  echo  "<script>alert('ขออภัย  รายการที่  $i  อยู่ในช่วงโปรโมชั่น');</script>";
						  }
						else
						  {
							  $sql_add	=	"insert into specials (spe_name , spe_start , spe_end , spe_price , pro_id) values ('".$spe_name."' , '".$spe_start."' , '".$spe_end."' , '".$new_price."' , '".$pro_id."')";
							  mysql_query($sql_add);
							  
							  $sql_up	=	"update products set pro_status = '1' where pro_id = '".$pro_id."'";
							  mysql_query($sql_up);
							  
						  }
				  }
			}
		
		echo  "<script>alert('Save Succeed full');window.location='add-spe.php?link=uri_pro';</script>";
  }


?>

<script>

function	check_number(e)
	{
		var	input	=	"";
		if (window.event)
			{
				input	=	e.keyCode;
			}
		else
			{
				input	=	e.which;
			}
		
		if (input >= 48  &&  input <= 57)
			{
				return true;
			}
		else
			{
				alert('กรุณากรอกข้อมูลเป็นตัวเลข');
				return false;
			}
			
	}
	
function check_add()
  {
	var	check	=	document.getElementById('spe_name');	
	var	check1	=	document.getElementById('spe_start');	
	var	check2	=	document.getElementById('spe_end');	
	
	if(check.value  ==  '')
	   {
			alert('กรุณากรอก  ชื่อชุดโปรโมชั่น');
			check.focus();
			return  false;   
	   }
	else if(check1.value  ==  '')
	   {
			alert('กรุณาเลือก  วันเริ่มต้นโปรโมชั่น');
			check1.focus();
			return  false;   
	   }
	else if(check2.value  ==  '')
	   {
			alert('กรุณาเลือก  วันสิ้นสุดโปรโมชั่น');
			check2.focus();
			return  false;   
	   }
	else if(check1.value  >  check2.value)
	  {
		  	alert('ห้ามกำหนดวันสิ้นสุดโปรโมชั่น  น้อยกว่า  มันเริ่มโปรโมชั่น');
			check2.focus();
			return  false;
	  }
	else 
	   {
		   	var line = document.getElementById('row_count'); 
			var	check_data  =  0;
			for(i = 1; i <= line.value; i++)
				{
					var	check3=	document.getElementById('tick'+i);
					if(check3.checked  ==  true)
					   {
							check_data++;   
					   }
					   
					var	check4	=	document.getElementById('new_price'+i)
					
					if(check3.checked  ==  true  && check4.value  ==  '')
					   {
						   alert('กรุณากรอก  ราคา  ในลำดับที่  ' + i);   
						   check4.focus();
						   return  false;
					   }
				}
			
			if(check_data  ==  0)
			   {
					alert('กรุณาเลือก  รายการอย่างน้อย 1  รายการ');
					return  false;   
			   }
			else
			  {
				  	return  true;
			  }
	   }
  }


function  check_click(data)
	{
		var	line	=	document.getElementById('row_count');
		for(i = 1; i <= line.value; i++)
		     {
				 var	check1	=	document.getElementById('tick'+i);
				 var	check2	=	document.getElementById('new_price'+i)
				 if(check1.checked  == false)
				    {
						check2.value  =  '';
					}
			 }
	}
	
</script>
</body>
</html>