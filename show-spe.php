<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
<?php
include('bar-top.php');
?>

<div class="container">
  <div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลโปรโมชั่น</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="40" height="40" align="left">#</th>
    	    <th width="450" height="40" align="left">ชื่อชุดโปรโมชั่น</th>
    	    <th width="140" align="left">วันที่จัดโปรโมชั่น</th>
    	    <th width="140" align="left">สิ้นสุดวันที่</th>
    	    <th width="130" height="40" align="left">จำนวนรายที่จัด</th>
    	    <th width="100" height="40" align="left">รายละเอียด</th>
   	    </tr>
 
		<?php	  
			  include('config.php');
			  $sql_show	=	"select  count(pro_id) as num_list ,  spe_name , spe_start , spe_end   from  specials  group by spe_name order by spe_start desc limit 0,4 ";//countคือการนับจำนวนใช้กับ grop by
			  $result_show	=	mysql_query($sql_show);
			  $line  = 0;
			  while($show  =  mysql_fetch_assoc($result_show))
						{
							$line++;
		?>
    	  <tr>
    	    <td width="40" height="35" align="left"><?=$line;?></td>
    	    <td width="450" height="35" align="left"><?=$show['spe_name'];?></td>
    	    <td width="140" align="left"><?=date('d-m-Y' , strtotime( $show['spe_start']));?></td>
    	    <td width="140" align="left"><?=date('d-m-Y' , strtotime( $show['spe_end']));?></td>
    	    <td width="130" height="35" align="left"><?=$show['num_list'];?></td>
    	    <td width="100" height="35" align="center"><a href="detail-spe.php?say_name=<?=$show['spe_name']?>"><img src="img/Document2.png" width="24" height="24"  alt=""/></a></td>
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