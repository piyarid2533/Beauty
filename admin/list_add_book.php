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
   	  <form action="?say_mem=<?=$_GET['say_mem']?>&say_book=<?=$_GET['say_book']?>&say_date=<?=$_GET['say_date']?>" method="post" name="frm_search" id="frm_search">
   		<table width="790" border="0" cellspacing="0" cellpadding="0">
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
                <input name="say_id" type="hidden" id="say_id" value="<?=$_GET['say_id'];?>">
                </td>
      		    <td width="90" align="center"><input type="submit" name="btn_search" id="btn_search" value="search" class="btn"  onClick="return  check_search();"></td>
      		    <td width="200" height="40" align="center"><input type="button" name="button" id="button" value="ย้อนกลับ" class="btn"  onClick="window.location='show-detail-list2.php?say=1&say_mem=<?=$_GET['say_mem']?>&say_book=<?=$_GET['say_book']?>&say_date=<?=$_GET['say_date']?>';"></td>
	      </tr>
	    </table>
  </form>
 <?php
 if($_REQUEST['btn_search'])
   {
	   
	   include('../config.php');
	   $group_id	=	$_POST['find_group']; 

	   
	   $sql_pro	=	"select  pro.* , spe. *  from  products as pro left join specials as spe  on  pro.pro_id =  spe.pro_id  where  pro.group_id  =  '".$group_id."' order by  spe.spe_price  desc";
	   $result_pro	=	mysql_query($sql_pro);
	   $line  =  0;
	   $check_rows  =  mysql_num_rows($result_pro);
	   if($check_rows  ==  false)
	     {
			 echo  "<script>alert('ไม่พบข้อมูล');window.location='list_add_book.php?say_mem=".$_GET['say_mem']."&say_book=".$_GET['say_book']."&say_date=".$_GET['say_date']."';</script>";
		 }
	   else
	     {
 ?>   
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงรายการจองสินค้าบริการ</span></h3>
   	</div>
  	</br>


	<form action="<?=$_SERVER['PHP_SELF'];?>?say_mem=<?=$_GET['say_mem']?>&say_book=<?=$_GET['say_book']?>&say_date=<?=$_GET['say_date']?>" method="post" name="frm_add" id="frm_add">
    <div class="show">
	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <th width="50" height="40" align="left" bgcolor="#F5F5F5">#</th>
	      <th width="80" align="left" bgcolor="#F5F5F5">รูป</th>
	      <th width="430" height="40" align="left" bgcolor="#F5F5F5">รายการสินค้า          
          <input name="say_id2" type="hidden" id="say_id2" value="<?=$_GET['say_book'];?>"></th>
	      <th width="100" align="left" bgcolor="#F5F5F5">สินค้าเหลือ</th>
	      <th width="120" height="40" align="left" bgcolor="#F5F5F5">ราคาเดิม</th>
	      <th width="120" align="left" bgcolor="#F5F5F5">ราคาโปรโมชั่น</th>
	      <th width="100" height="40" align="left" bgcolor="#F5F5F5">เลือกจอง</th>
        </tr>
        <?php
        	   while($pro		=	mysql_fetch_assoc($result_pro))
	   			{
					$line++;
		?>
	    <tr>
	      <td width="50" height="80" align="left"><?=$line;?></td>
	      <td width="80" height="80" align="left"><img src="../img_product/<?=$pro['pro_img'];?>"  alt="" width="60" height="60"/></td>
	      <td width="430" height="80" align="left">
		  <?=$pro['pro_name'];?>
          <input name="pro_id<?=$line;?>" type="hidden" id="pro_id<?=$line;?>" value="<?=$pro['pro_id'];?>">
          <input name="last_price<?=$line;?>" type="hidden" id="last_price<?=$line;?>" value="<?=$pro['pro_sell'];?>">
          <input name="spe_price<?=$line;?>" type="hidden" id="spe_price<?=$line;?>" value="<?=$pro['spe_price'];?>">
          
          </td>
	      <td width="100" align="left"><?=$pro['pro_qty'];?></td>
	      <td width="120" height="80" align="left"><?=$pro['pro_sell'];?></td>
	      <td width="120" height="80" align="left">
		  <?
          if($pro['spe_price']  ==  NULL)
		  	{
				echo  "ไม่ได้จัดโปร";
			}
		  else
		   {
			   $new_pro  =  $pro['spe_price'];
			   echo  $new_pro;
		   }
		  ?>
          
          </td>
	      <td width="100" height="80" align="center"><input name="tick<?=$line;?>" type="checkbox" id="tick<?=$line;?>"value="1"></td>
        </tr>
        <?php
				}
		?>
	    <tr>
	      <td height="70" colspan="3" align="left">&nbsp;</td>
	      <td width="100" align="left">&nbsp;</td>
	      <td width="120" height="70" align="left"><input type="button" name="button2" id="button2" value="ย้อนกลับ" class="btn"  onClick="window.location='show-detail-list2.php?say=1&say_mem=<?=$_GET['say_mem']?>&say_book=<?=$_GET['say_book']?>&say_date=<?=$_GET['say_date']?>';"></td>
	      <td width="120" height="70" align="left">&nbsp;</td>
	      <td width="100" height="70" align="center"><input type="submit" name="btn_add" id="btn_add" value="Save" class="btn"  onClick="return  check_add();"></td>
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
		$say_id	=	$_POST['say_id2'];
		for($i = 1; $i <= $row_count; $i++)
		    {
				
				$tick	  =  $_POST['tick'.$i];
				if($tick  ==  1)
				  {
					  	$pro_id	=	$_POST['pro_id'.$i];
						
						if($_POST['spe_price'.$i]  !=  NULL)
						  {
							  $det_price	=	$_POST['spe_price'.$i];
						  }
						else
						  {
							  $det_price	=	$_POST['last_price'.$i];
						  }

					  	$sql_check	=	"select  *  from  detail_books  where  pro_id = '".$pro_id."'  and  book_id  =  '".$say_id."' ";
						$result_check	=	mysql_query($sql_check);
						$rows_check	=	mysql_num_rows($result_check);
						if($rows_check  ==  true)
						  {
							  echo  "<script>alert('ขออภัย  รายการที่  $i  มีในรายการจองแล้ว');</script>";
						  }
						else
						  {
							  $sql_add	=	"insert into detail_books (det_price , pro_id , book_id) values ('".$det_price."' , '".$pro_id."' , '".$say_id."' )";
							  mysql_query($sql_add);
							  
						  }
				  }
			}
		
		echo  "<script>alert('Save Succeed full');window.location='list_add_book.php?say_mem=".$_GET['say_mem']."&say_book=".$_GET['say_book']."&say_date=".$_GET['say_date']."';</script>";
  }


?>

<script>
	
function check_add()
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

	
</script>
</body>
</html>