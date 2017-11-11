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
<style>
new_size{
	font-size: 12px;	
}
</style>
</head>

<body>
<?php
include('bar-top.php');
?>

<div class="container">
   	  
<?php
$say_name  =  $_GET['say_name'];

if($say_name !=  NULL)
	{
		include('../config.php');

		$sql_show	=	"select    spe. *  ,  pro. *  , gro. *  from specials  as  spe  inner  join  products  as pro  on  spe.pro_id  =  pro.pro_id  inner  join  groups as gro  on  pro.group_id =  gro.group_id  where  spe.spe_name  =  '".$say_name."'  order by  gro.group_name , spe.spe_price asc ";
?>	 
  <div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลรายการโปรโมชั่น</span></h3>
   	</div>
  	</br>
    <div class="add">
    <?php
    $result_title  =  mysql_query($sql_show);
	$show_title  = mysql_fetch_assoc($result_title);
	?>
      <table width="460" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="150" height="50" align="center" bgcolor="#F5F5F5">ชื่อชุดโปรโมชั่น</td>
          <td height="50">&nbsp;</td>
          <td width="300" height="50"><?=$show_title['spe_name'];?></td>
        </tr>
        <tr>
          <td width="150" height="50" align="center" bgcolor="#F5F5F5">เริ่มต้นการจัดโปรโมชั่น</td>
          <td width="10" height="50">&nbsp;</td>
          <td width="300" height="50"><?=date('d-m-Y' , strtotime($show_title['spe_start']));?></td>
        </tr>
        <tr>
          <td width="150" height="50" align="center" bgcolor="#F5F5F5">สิ้นสุดการจัดโปรโมชั่น</td>
          <td width="10" height="50">&nbsp;</td>
          <td width="300" height="50"><?=date('d-m-Y' , strtotime($show_title['spe_end']));?></td>
        </tr>
        <tr>
          <td height="50" align="center">&nbsp;</td>
          <td height="50" align="center">&nbsp;</td>
          <td height="50" align="center"><input type="button" name="button" id="button" value="ย้อนกลับ" onClick="window.location='show-spe.php?link=uri_pro&say=1&say_year=<?=$_GET['say_year'];?>';" ></td>
        </tr>
      </table>
    </div>
  <br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="40" height="40" align="left">#</th>
    	    <th width="100" align="left">รูปภาพ</th>
    	    <th width="300" height="40" align="left">ชื่อสินค้า</th>
    	    <th width="180" align="left">กลุ่มสิ้นค้า</th>
    	    <th width="130" align="left">ราคาเดิม</th>
    	    <th width="130" height="40" align="left">ราคาที่จัดโปร</th>
    	    <th width="60" align="left">แก้ไข</th>
    	    <th width="60" height="40" align="left">ลบ</th>
   	    </tr>
 
		<?php	  

			 
			  $result_show	=	mysql_query($sql_show);
			  $line  = 0;
			  while($show  =  mysql_fetch_assoc($result_show))
						{
							$line++;
		?>
    	  <tr>
    	    <td width="40" height="70" align="left"><?=$line;?></td>
    	    <td width="100" height="70" align="left"><img src="../img_product/<?=$show['pro_img'];?>"  alt="" width="60" height="60"/></td>
    	    <td width="300" height="70" align="left"><?=$show['pro_name'];?></td>
    	    <td width="180" height="70" align="left"><?=$show['group_name'];?></td>
    	    <td width="130" height="70" align="left"><?=$show['pro_sell'];?></td>
    	    <td width="130" height="70" align="left"><?=$show['spe_price'];?></td>
    	    <td width="60" height="70" align="left"><a href="add-spe.php"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
    	    <td width="60" height="70" align="left"><a href="del-spe.php?say_id=<?=$show['spe_id'];?>&say_name=<?=$say_name;?>"  onClick="return  confirm('ยืนยันลบข้อมูล');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
   	    </tr>
        <?php
						}
		?>
  	  </table>
      <?php
		  }
	  ?>
  </div>
</div>

<?php
include('footer.php');
?>

</body>
</html>