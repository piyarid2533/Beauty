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
	
   	  <form action="<?=$_SERVER['PHP_SELF']; ?>?link=uri_new" method="post" name="frm_search" id="frm_search">
   		<table width="500" border="0" cellspacing="0" cellpadding="0">
      		  <tr>
      		    <td width="200" height="40" align="center" bgcolor="#43BF94"><h3 ><span class="cl-write"> menu search</span></h3></td>
      		    <td width="10" height="40">&nbsp;</td>
      		    <td width="200" height="40">
                <select name="find_year" id="find_year" class="txt-select">
                	<option  value="" selected>เลือก  ปี  ประกาศข่าวสาร</option>
                    <?php
                    include('../config.php');
					$sql_year	=	"select  distinct  date_format(new_date , '%Y') as new_year from news order by new_date desc";
					$result_year	=	mysql_query($sql_year);
					while($year	=	mysql_fetch_assoc($result_year))
							{
					?>
                  <option  value="<?=$year['new_year'];?>" ><?=$year['new_year'];?></option>
                    <?php
							}
					mysql_close($config);		
					?>
                    
   		        </select>
                </td>
      		    <td width="90" height="40" align="center"><input type="submit" name="btn_search" id="btn_search" value="search" class="btn"></td>
	      </tr>
	    </table>
  </form>
<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST'  or  ($_GET['say']  == 1))
  {
	  include('../config.php');
	  if($_GET['say']  == 1)
	    {
			$year  =  $_GET['say_year'];
		}
	 else
	    {
			$year  =  $_POST['find_year'];
		}
	
	 $sql_new	=	"select  *  from news  where  new_date  like '".$year."%'  order by  new_date  desc";
	 $result_new	=	mysql_query($sql_new);
?>    
  <div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลข่าวสาร</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="30" height="40" align="left">#</th>
    	    <th width="600" align="left">หัวข้อข่าวสาร</th>
    	    <th width="125" align="left">วันที่ประกาศ</th>
    	    <th width="125" height="40" align="left">ผู้ประกาศ</th>
    	    <th width="60" height="40" align="left">แก้ไข</th>
    	    <th width="60" height="40" align="left">ลบ</th>
  	    </tr>
        <?php
		$line  =  0;
		while($show 	=	mysql_fetch_assoc($result_new))
				{
					$line++;
		?>
    	  <tr>
    	    <td width="30" height="35" align="left"><?=$line?></td>
    	    <td width="600" align="left"><?=$show['new_title'];?></td>
    	    <td width="125" align="left"><?=$show['new_date'];?></td>
    	    <td width="125" height="35" align="left"><?=$show['admin_user'];?></td>
    	    <td width="60" height="35" align="left"><a href="edit-new.php?link=uri_new&say_id=<?=$show['new_id'];?>&say_year=<?=$year;?>"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
    	    <td width="60" height="35" align="left"><a href="del-new.php?say_id=<?=$show['new_id'];?>&say_year=<?=$year;?>" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
  	    </tr>
        <?php
				}
		?>
  	  </table>
  </div>
<?php
  }
?>  
</div>

<?php
include('footer.php');
?>
</body>
</html>