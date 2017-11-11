<?php
session_start();


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
      		    <td width="100" height="40">
                <select name="select" id="select" class="txt-select">
                	<option  value="" selected>เลือก  เดือน</option>
   		        </select>
                </td>
      		    <td width="100" height="40">
                <select name="select2" id="select2" class="txt-select">
                	<option  value="" selected>เลือก  ปี</option>
   		        </select>
                </td>
      		    <td width="90" height="40" align="center"><input type="submit" name="btn_search" id="btn_search" value="search" class="btn"></td>
	      </tr>
	    </table>
  </form>
    
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูล</span></h3>
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
        include('../config.php');
		$sql_show	=	"select  *  from  news  order by  new_date  desc";
		$result_show  =  mysql_query($sql_show);
		$line  =  0;
		while($show 	=	mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
    	  <tr>
    	    <td width="30" height="35" align="left">&nbsp;</td>
    	    <td width="600" align="left">&nbsp;</td>
    	    <td width="125" align="left">&nbsp;</td>
    	    <td width="125" height="35" align="left">&nbsp;</td>
    	    <td width="60" height="35" align="left"><a href="#"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
    	    <td width="60" height="35" align="left"><a href="#" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
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