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
   	  <form action="<?=$_SERVER['PHP_SELF']; ?>?link=uri_user&say_user=<?=$_GET['say_user'];?>" method="post" name="frm_search" id="frm_search">
   		<table width="700" border="0" cellspacing="0" cellpadding="0">
      		  <tr>
      		    <td width="200" height="40" align="center" bgcolor="#43BF94"><h3 ><span class="cl-write"> menu search</span></h3></td>
      		    <td width="10" height="40">&nbsp;</td>
      		    <td width="200" height="40">
                <select name="find_year" id="find_year" class="txt-select">
                	<option  value="" selected>เลือก  ปีใช้บริการ</option>
                    <?php
					include('../config.php');
					$sql_show_year	=	"SELECT DISTINCT DATE_FORMAT(book_date , '%Y') AS new_year FROM books  order by  book_date   DESC";
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
      		    <td width="90" align="center"><input type="submit" name="btn_search" id="btn_search" value="search" class="btn"  onClick="return  check_search();"></td>
      		    <td width="200" height="40" align="center"><input type="button" name="button" id="button" value="ย้อนกลับ" class="btn"  onClick="window.location='show-member.php?link=uri_user';"></td>
	      </tr>
	    </table>
  </form>
<?php

if($_SERVER['REQUEST_METHOD']  ==  'POST'  or  $_GET['say']  == 1)
  {
	  if($_GET['say'] == 1)
	    {
			$find_date  =  $_GET['say_date'];
		}
      else
	    {
			$find_date  =  $_POST['find_date'];
		}

?>
  <div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลใช้บริการ</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="30" height="40" align="left">#</th>
    	    <th width="100" align="left">ปี</th>
    	    <th width="100" align="left">เดือน</th>
    	    <th width="450" height="40" align="left">จำนวนครั้งที่ใช้บริการ</th>
    	    <th width="120" height="40" align="left">รายละเอียด</th>
   	    </tr>
        
        <?php
		include('../config.php');
        $sql_show   =  "select count(DATE_FORMAT(book_date , '%Y-%m')) as  num_count , book_date  , DATE_FORMAT(book_date , '%Y-%m')  as  id_date      FROM books  where  book_date  like  '".$find_date."%' and  member_user = '".$_GET['say_user']."'    group by  DATE_FORMAT(book_date , '%Y-%m')   order by  book_date   DESC";
		$result_show  =  mysql_query($sql_show) or die (mysql_error());
		$line  =  0;
		while($show  =  mysql_fetch_assoc($result_show))
		        {
					$line++;
		?>
    	  <tr>
    	    <td width="30" height="35" align="left"><?=$line;?></td>
    	    <td width="100" align="left"><?=date('Y' , strtotime($show['book_date']))?></td>
    	    <td width="100" align="left">
			<? 
			$month  =  date('n' , strtotime($show['book_date'])) ;
			echo convert_month($month);
			?>
            
            
            </td>
    	    <td width="450" height="35" align="left"><?=$show['num_count']?></td>
    	    <td width="120" height="35" align="left"><a href="detail-resume.php?say_date=<?=$show['id_date']?>&say_user=<?=$_GET['say_user']?>"><img src="../img/Search.png" width="24" height="24"  alt=""/></a></td>
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

function convert_month( $input )
  {
 
    $arr_month = array( '' , 'มกราคม' , 'กุมภาพันธ์' , 'มีนาคม' , 'เมษายน' , 'พฤษภาคม' , 'มิถุนายน' , 'กรกฎาคม' ,'สิงหาคม' , 'กันยายน' , 'ตุลาคม' , 'พฤศจิกายน' , 'ธันวาคม' ) ;
    return $arr_month[ $input ] ;
 
 }
?>
</body>
</html>