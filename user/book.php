<?php
session_start();

if($_SESSION['se_status']  !=  'user')
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
<div class="clear-fix"></div>
<div class="container">
	<form action="<?=$_SERVER['PHP_SELF']; ?>?link=uri_book" method="post" name="frm_search" id="frm_search">
   		<table width="500" border="0" cellspacing="0" cellpadding="0">
      		  <tr>
      		    <td width="200" height="40" align="center" bgcolor="#43BF94"><h3 ><span class="cl-write"> menu search</span></h3></td>
      		    <td width="10" height="40">&nbsp;</td>
      		    <td height="40"><input name="find_date" type="date" id="find_date" max="2020-12-31" min="2014-01-01" class="txt-field"></td>
      		    <td width="90" height="40" align="center"><input type="submit" name="btn_search" id="btn_search" value="search" class="btn"></td>
	      </tr>
	    </table>
  </form>
    <?php
    if(($_SERVER['REQUEST_METHOD']  == 'POST' and $_REQUEST['btn_search'])  or  $_GET['say']  == 1)
		{
			include('../config.php');
			if($_GET['say'] == 1)
			  {
					$find_date	=	$_GET['say_date'];
			  }
			else
			  {
				  	$find_date	=	$_POST['find_date'];
			  }
			
			$sql_show	=	"select * from books  where  book_date  = '".$find_date."' ";
			$result_show  = mysql_query($sql_show) or die(mysql_error());
			$cell1 = 0;
			$cell2 = 0;
			$cell3 = 0;
			$cell4 = 0;
			$cell5 = 0;
			$cell6 = 0;
			$cell7 = 0;
			$cell8 = 0;
			$cell9 = 0;
			$cell10 = 0;
			$cell11 = 0;
			while($show  =  mysql_fetch_assoc($result_show))
					{
						
						if($show['book_time']  ==  '09.00')
						  {
							  $cell1	=	1;
						  }
						
						if($show['book_time']  ==  '10.00')
						  {
							  $cell2	=	1;
						  }
						  
						if($show['book_time']  ==  '11.00')
						  {
							  $cell3	=	1;
						  } 
						
						if($show['book_time']  ==  '12.00')
						  {
							  $cell4	=	1;
						  }
						
						if($show['book_time']  ==  '13.00')
						  {
							  $cell5	=	1;
						  }
						  
						if($show['book_time']  ==  '14.00')
						  {
							  $cell6	=	1;
						  } 
						 
						 if($show['book_time']  ==  '15.00')
						  {
							  $cell7	=	1;
						  }
						
						if($show['book_time']  ==  '16.00')
						  {
							  $cell8	=	1;
						  }
						  
						if($show['book_time']  ==  '17.00')
						  {
							  $cell9	=	1;
						  } 
						
						if($show['book_time']  ==  '18.00')
						  {
							  $cell10	=	1;
						  }
						  
						if($show['book_time']  ==  '19.00')
						  {
							  $cell11	=	1;
						  } 
					}
	?>

  	<div class="page-header">
    	<h1><span class="cl-green">จองเวลา</span></h1>
    </div>
    <br>

    
    
  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_book" method="post" name="form1" id="form1" autocomplete="off">
  <div class="show">
	  <table width="1000" border="0" cellpadding="0" cellspacing="0">
	    <tr>
	      <th height="50" colspan="11" align="center" bgcolor="#F5F5F5" class="cl-pink"><h4>
	        <input name="hid_date" type="hidden" id="hid_date" value="<?=$find_date;?>">
          ตารางจองเวลา ประจำวันที่ &nbsp;&nbsp;<?=date('d - m - Y', strtotime($find_date));?></h4></th>
        </tr>
	    <tr >
	      <th width="90" height="40" align="left" >09.00 น.</th>
	      <th width="90" align="left">10.00 น.</th>
	      <th width="90" align="left">11.00 น.</th>
	      <th width="90" align="left">12.00 น.</th>
	      <th width="90" align="left">13.00 น.</th>
	      <th width="90" height="40" align="left">14.00 น.</th>
	      <th width="90" height="40" align="left">15.00 น.</th>
	      <th width="90" align="left">16.00 น.</th>
	      <th width="90" align="left">17.00 น.</th>
	      <th width="90" align="left">18.00 น.</th>
	      <th width="90" height="40" align="left">19.00 น.</th>
        </tr>
	    <tr>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell1  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
	        	<input type="radio" name="radio" id="radio" value="09.00">
          		<label for="radio"  class="cl-green" >จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell2  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
	        	<input type="radio" name="radio" id="radio2" value="10.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          
            
          </td>
	      <td width="90" height="80" align="left">
           <?php
		  
          if($cell3  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
	        	<input type="radio" name="radio" id="radio3" value="11.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell4  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
           	 	<input type="radio" name="radio" id="radio4" value="12.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell5  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
            	<input type="radio" name="radio" id="radio5" value="13.00">
         		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
         
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell6  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
            	<input type="radio" name="radio" id="radio6" value="14.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell7  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
            	<input type="radio" name="radio" id="radio7" value="15.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
         
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell8  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
            	<input type="radio" name="radio" id="radio8" value="16.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell9  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
            	<input type="radio" name="radio" id="radio9" value="17.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell10  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
            	<input type="radio" name="radio" id="radio10" value="18.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
          
          
          </td>
	      <td width="90" height="80" align="left">
          <?php
		  
          if($cell11  ==  0)
		    {
		  ?>
          		<img src="../img/clock.png" width="16" height="16"  alt=""/>
           		<input type="radio" name="radio" id="radio11" value="19.00">
          		<label for="radio"  class="cl-green">จอง </label>
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
         <?php	  
		  	}
		 ?>
         
          
          </td>
        </tr>
	    <tr>
	      <td height="80" colspan="2" align="left" ><img src="../img/clock.png" width="16" height="16"  alt=""/> = <span  class="cl-pink">สามารถจองได้</span></td>
	      <td height="80" colspan="7" align="left"><img src="../img/cross.png" width="16" height="16"  alt=""/> = <span  class="cl-pink">ไม่สามารถจองได้</span></td>
	      <td height="80" colspan="2" align="left"><input type="submit" name="submit" id="submit" value="บันทึกการจองเวลา" class="btn" ></td>
        </tr>
      </table>
  </div>
  
  </form>

<?php
		}
?>  
</div>

<?php
include('footer.php');


if($_SERVER['REQUEST_METHOD']  ==  'POST'  and  $_REQUEST['submit'])
	{
		$book_date	=	$_POST['hid_date'];
		$book_time	=	$_POST['radio'];
		
		if($book_time  ==  NULL)
		  {
				echo  "<script>alert('กรุณาเลือกข้อมูล');window.location='book.php?link=uri_book&say=1&say_date=".$book_date."';</script>";  
		  }
		else
		  {
			  	include('../config.php');
				
				$sql_check  =  "select  book_status  from  books  where  book_status  =  0  and  member_user = '".$_SESSION['se_id']."'  ";
				$result_check  =  mysql_query($sql_check);
				$row_check	=	mysql_num_rows($result_check);
				if($row_check  ==  true)
				  {
					  	echo  "<script>alert('ขออภัย  ไม่สามารถจองเวลาซ้ำซ้อนได้ \\n กรุณาดำเนินการ  การจองครั้งที่แล้วให้เสร็จสมบูรณ์ก่อน');window.location='book.php?link=uri_book';</script>";  
				  }
				else
				  {
						$sql_add	=	"insert into  books  (book_date , book_time , member_user) values ('".$book_date."' , '".$book_time."' , '".$_SESSION['se_id']."') ";
						$result_add   =  mysql_query($sql_add);
						if($result_add  == true)
						  {
							  echo  "<script>alert('Save succeed full');window.location='book.php?link=uri_book';</script>";  
						  }
				  }
				mysql_close($config);
		  }
	}
?>


</body>
</html>