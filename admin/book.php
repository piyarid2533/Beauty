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
<div class="clear-fix"></div>
<div class="container">
	<form action="<?=$_SERVER['PHP_SELF']; ?>" method="post" name="frm_search" id="frm_search">
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
							  $book1	=	$show['book_id'];
							  $mem1	=	$show['member_user'];
							 
						  }
						
						if($show['book_time']  ==  '10.00')
						  {
							  $cell2	=	1;
							  $book2		=	$show['book_id'];
							  $mem2	=	$show['member_user'];
						  }
						  
						if($show['book_time']  ==  '11.00')
						  {
							  $cell3	=	1;
							  $book3		=	$show['book_id'];
							  $mem3	=	$show['member_user'];
						  } 
						
						if($show['book_time']  ==  '12.00')
						  {
							  $cell4	=	1;
							  $book4		=	$show['book_id'];
							  $mem4	=	$show['member_user'];
						  }
						
						if($show['book_time']  ==  '13.00')
						  {
							  $cell5	=	1;
							  $book5		=	$show['book_id'];
							  $mem5	=	$show['member_user'];
						  }
						  
						if($show['book_time']  ==  '14.00')
						  {
							  $cell6	=	1;
							  $book6		=	$show['book_id'];
							  $mem6	=	$show['member_user'];
						  } 
						 
						 if($show['book_time']  ==  '15.00')
						  {
							  $cell7	=	1;
							  $book7		=	$show['book_id'];
							  $mem7	=	$show['member_user'];
						  }
						
						if($show['book_time']  ==  '16.00')
						  {
							  $cell8	=	1;
							  $book8		=	$show['book_id'];
							  $mem8	=	$show['member_user'];
						  }
						  
						if($show['book_time']  ==  '17.00')
						  {
							  $cell9	=	1;
							  $book9		=	$show['book_id'];
							  $mem9	=	$show['member_user'];
						  } 
						
						if($show['book_time']  ==  '18.00')
						  {
							  $cell10	=	1;
							  $book10		=	$show['book_id'];
							  $mem10	=	$show['member_user'];
						  }
						  
						if($show['book_time']  ==  '19.00')
						  {
							  $cell11	=	1;
							  $book11		=	$show['book_id'];
							  $mem11	=	$show['member_user'];
						  } 
					}
	?>

  	<div class="page-header">
    	<h1><span class="cl-green">จองเวลา</span></h1>
    </div>
    <br>

    

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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
              <a href="show-detail-list.php?say_book=<?=$book1;?>&say_mem=<?=$mem1?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book2;?>&say_mem=<?=$mem2?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book3;?>&say_mem=<?=$mem3?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book4;?>&say_mem=<?=$mem4?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
                
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book5;?>&say_mem=<?=$mem5?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book6;?>&say_mem=<?=$mem6?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book7;?>&say_mem=<?=$mem7?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book8;?>&say_mem=<?=$mem8?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book9;?>&say_mem=<?=$mem9?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book10;?>&say_mem=<?=$mem10?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
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
          		
          <?php
			}
          else
		  	{
		 ?>
         		<img src="../img/cross.png" width="16" height="16"  alt=""/>
                <a href="show-detail-list.php?say_book=<?=$book11;?>&say_mem=<?=$mem11?>" target="_blank" ><img src="../img/75.png" width="16" height="16"  alt=""/></a>
         <?php	  
		  	}
		 ?>
         
          
          </td>
        </tr>
	    <tr>
	      <td height="80" colspan="2" align="left" ><img src="../img/clock.png" width="16" height="16"  alt=""/> = <span  class="cl-pink">เวลาว่าง</span></td>
	      <td height="80" colspan="2" align="left"><img src="../img/cross.png" width="16" height="16"  alt=""/> = <span  class="cl-pink">จองแล้ว</span></td>
	      <td height="80" colspan="7" align="left"><img src="../img/75.png" width="16" height="16"  alt=""/>  = <span  class="cl-pink">ดูรายละเอียด</span></td>
        </tr>
      </table>
  </div>

  <div class="page-header">
    	<h1><span class="cl-green">รายการ</span><span class="cl-green">จอง</span></h1>
  </div>
    <br>
    <div class="show">
    
    <table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="55" height="40" bgcolor="#F5F5F5">รายการ</td>
        <td width="235" bgcolor="#F5F5F5">หมวดสินค้า</td>
        <td width="90" bgcolor="#F5F5F5">รูป</td>
        <td width="300" height="40" bgcolor="#F5F5F5">ชื่อสินค้า</td>
        <td width="100" bgcolor="#F5F5F5">จำนวนคงเหลือ</td>
        <td width="100" height="40" bgcolor="#F5F5F5">ยอดจอง</td>
        <td width="100" height="40" bgcolor="#F5F5F5">เติมสินค้า</td>
      </tr>
      <?php
      include('../config.php');
	  echo "select  count(dt.pro_id) as num_det ,  bk.book_id , bk.book_date  ,  dt.det_id , dt.pro_id , dt.book_id , pro.pro_id , pro.pro_name , pro.pro_img , pro.pro_qty , pro.group_id  ,  gp. * from  books as bk  inner  join  detail_books as  dt  on  bk.book_id =  dt.book_id  inner join  products as pro  on  dt.pro_id  =  pro.pro_id inner join  groups as gp  on  pro.group_id  =  gp.group_id  where  bk.book_date  =  '".$find_date."'    group by  dt.pro_id  order by gp.group_id  asc   ";
	  
	  
	  $sql_list	=	"select  count(dt.pro_id) as num_det ,  bk.book_id , bk.book_date  ,  dt.det_id , dt.pro_id , dt.book_id , pro.pro_id , pro.pro_name , pro.pro_img , pro.pro_qty , pro.group_id  ,  gp. * from  books as bk  inner  join  detail_books as  dt  on  bk.book_id =  dt.book_id  inner join  products as pro  on  dt.pro_id  =  pro.pro_id inner join  groups as gp  on  pro.group_id  =  gp.group_id  where  bk.book_date  =  '".$find_date."'    group by  dt.pro_id  order by gp.group_id  asc   ";
	  $result_list  =  mysql_query($sql_list);
	  $rows_check	=	mysql_num_rows($result_list);
	  if($rows_check  ==  true)
	  	{
		  $line = 0;
		  while($show_list  =  mysql_fetch_assoc($result_list))
				{
					$line++;
	  ?>
      <tr>
        <td width="55" height="70"><?=$line;?></td>
        <td width="235" height="70"><?=$show_list['group_name'];?></td>
        <td width="90" height="70">
        <img src="../img_product/<?=$show_list['pro_img'];?>"  alt="" width="60" height="60"/></td>
        <td width="300" height="70"><?=$show_list['pro_name'];?></td>
        <td width="100" height="70"><?=$show_list['pro_qty'];?></td>
        <td width="100" height="70"><?=$show_list['num_det'];?></td>
        <td width="100" height="70">
					<?php
                    if($show_list['pro_qty']  < $show_list['num_det']  )
                        {
                            echo  "<span class='cl-red'>ไม่พอ</span>";	
                        }
                    else
                        {
                            echo   "<span class='cl-green'>พอ</span>";
                        }
                    ?>
        </td>
      </tr>
      <?php
				}
		}
	  else
		 {    
	  ?>
      <tr>
        <td height="70" colspan="7" align="center"><h1><span class='cl-green'>ไม่มีรายการจอง</span></h1></td>
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