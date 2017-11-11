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
   	  <form action="<?=$_SERVER['PHP_SELF']; ?>?link=uri_product" method="post" name="frm_search" id="frm_search">
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
 if($_SERVER['REQUEST_METHOD']  == 'POST'  or  $_GET['say']  ==  1)
   {
	   include('../config.php');
	   if($_GET['say']  == 1)
	     {
			$group_id	=	$_GET['say_group']; 
		 }
	   else
		 {
			 $group_id	=	$_POST['find_group']; 
		 }
	   
	   $sql_pro	=	"select  *  from  products  where  group_id  =  '".$group_id."' ";
	   $result_pro	=	mysql_query($sql_pro);
	   $line  =  0;
	   $check_rows  =  mysql_num_rows($result_pro);
	   if($check_rows  ==  false)
	     {
			 echo  "<script>alert('ไม่พบข้อมูล');window.location='show-product.php?link=uri_product';</script>";
		 }
	   else
	     {
 ?> 
  
  <div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลสินค้า</span></h3>
   	</div>
  	</br>
	<div class="show">
	  <table width="1013" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <th width="36" height="40" align="left">#</th>
	      <th width="127" align="left">รูปภาพ</th>
	      <th width="172" align="left">ชื่อสินค้า</th>
	      <th width="81" align="left">หน่วย</th>
	      <th width="93" align="left">ราคาต้นทุน</th>
	      <th width="166" align="left">ราคาขาย</th>
	      <th width="166" align="left">แก้ไข</th>
	      <th width="166" align="left">ลบ</th>
        </tr>
	    <?php
        	   while($pro		=	mysql_fetch_assoc($result_pro))
	   			{
					$line++;
		?>
	    <tr>
	      <td width="36" height="125" align="left"><?=$line;?></td>
	      <td width="127" height="125" align="left"><img src="../img_product/<?=$pro['pro_img'];?>"  alt="" width="100" height="100"/></td>
	      <td width="172" height="125" align="left"><?=$pro['pro_name'];?></td>
	      <td width="81" align="left"><?=$pro['pro_unit'];?></td>
	      <td width="93" height="125" align="left"><?=$pro['pro_cost'];?></td>
	      <td width="166" align="left"><?=$pro['pro_sell'];?></td>
	      <td width="166" align="left"><a href="edit-product.php?link=uri_product&say_id=<?=$pro['pro_id'];?>&say_img=<?=$pro['pro_img'];?>&say_group=<?=$group_id;?>"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
	      <td width="166" height="125" align="left"><a href="del-product.php?link=uri_product&say_id=<?=$pro['pro_id'];?>&say_img=<?=$pro['pro_img'];?>&say_group=<?=$group_id;?>" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
	      
	    <?php
				}
		?>
      </table>
	</div>
  <?php
		 }
   }
  ?>
</div>

<?php
include('footer.php');
?>


<script>
function  check_search()
  {
		var	check1	=	document.getElementById('find_group');  
		
		if(check1.value  ==  '')
		   {
				alert('กรุณาเลือก  หมวดสินค้า'); 
				check1.focus();
				return  false ;
		   }
		else 
		   {
			   return  true;
		   }
  }
</script>
</body>
</html>