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
   	  <form action="<?=$_SERVER['PHP_SELF']; ?>?link=uri_pro" method="post" name="frm_search" id="frm_search">
   		<table width="500" border="0" cellspacing="0" cellpadding="0">
      		  <tr>
      		    <td width="200" height="40" align="center" bgcolor="#43BF94"><h3 ><span class="cl-write"> menu search</span></h3></td>
      		    <td width="10" height="40">&nbsp;</td>
      		    <td width="200" height="40">
                <select name="find_year" id="find_year" class="txt-select">
                	<option  value="" selected>เลือก  ปีจัดโปรโมชั่น</option>
                    <?php
					include('../config.php');
					$sql_show_year	=	"SELECT DISTINCT DATE_FORMAT(spe_start , '%Y') AS new_year FROM specials ORDER BY spe_start  DESC";
					$result_show_year	=	mysql_query($sql_show_year);
					while($show_year 	=	mysql_fetch_assoc($result_show_year))
						{				  
					?>
					<option value="<?=$show_year['new_year'];?>"><?=$show_year['new_year'];?></option>
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
		if($_SERVER['REQUEST_METHOD']  == 'POST'  or  $_GET['say']  == 1)
		  {
			  if($_GET['say']  == 1)
			    {
					$new_year	=	$_GET['say_year'];
				}
			  else
			    {
					$new_year	=	$_POST['find_year'];
				}
		?>	 
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
			  include('../config.php');
			  $sql_show	=	"select  count(pro_id) as num_list ,  spe_name , spe_start , spe_end   from  specials    where  spe_start  like '".$new_year."%' group by spe_name order by spe_start desc ";
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
    	    <td width="100" height="35" align="center"><a href="detail-spe.php?link=uri_pro&say_name=<?=$show['spe_name']?>&say_year=<?=$new_year;?>"><img src="../img/Document2.png" width="24" height="24"  alt=""/></a></td>
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

<script>
function check_search()
  {
	var	check1	=	document.getElementById('find_year');  
	
	if(check1.value == '')
	  {
		alert('กรุณาเลือก ปี');
		check1.focus();
		return false;  
	  }
	else
	  {
		return  true;  
	  }
  }
  
  
</script>
</body>
</html>