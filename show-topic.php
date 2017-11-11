<?php
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="design.css">
<style type="text/css">
#size-new-line{
	font-size: 12px;
}
#size-new-line2{
	font-size: 10px;
}
</style>
</head>

<body>
<?php
include('bar-top.php');
?>

<?php
if($_GET['ply_id']  != NULL) 
  {
?>
<div class="container">
  <div class="page-header ">
       <h1><span class="cl-green">ถาม - ตอบ</span></h1>
  </div>
  <br>
  <center><a href="web-board.php">
  <h4>กระดานสอบถาม</h4></a></center>
  <div class="show">
    <table width="1000" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <th width="50" height="35" align="left" bgcolor="#F5F5F5">#</th>
        <th width="680" height="35" align="left" bgcolor="#F5F5F5">คำถาม</th>
        <th width="130" height="35" align="left" bgcolor="#F5F5F5">ผู้ตั้งกระทู้</th>
        <th width="140" height="35" align="left" bgcolor="#F5F5F5">วันที่โพส</th>
      </tr>
<?php
      $ply_id  =  $_GET['ply_id'];

      include('config.php');
	 
	  $sql_show_board  = "SELECT  boards. * , replys. * FROM boards  LEFT JOIN replys ON boards.board_id =  replys.board_id WHERE boards.board_id  =  '".$ply_id."'    ";
	  $result_show_board  = mysql_query($sql_show_board);
	  $show_board = mysql_fetch_assoc($result_show_board);
?>
      <tr > 
        <td width="50" height="50" align="left" id="size-new-line"><?=$_GET['ply_id'];?></td>
        <td width="680" height="50" align="left" id="size-new-line"><?=$show_board['board_title'];?></td>
        <td width="130" height="50" align="left" id="size-new-line"><?=$show_board['board_post'];?></td>
        <td width="140" height="50" align="left" id="size-new-line"><?=$show_board['board_date'];?></td>
      </tr>
    </table>
  </div>
  
  <?php
  if($show_board['board_topic']  != 0)
    {
		$result_reply  =  mysql_query($sql_show_board);
		$lines  = 0;
		while($show_reply  = mysql_fetch_assoc($result_reply))
				{
					$lines++;
					
  ?>
  <br>
  <div class="show">
    <table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="50" height="50" align="left" bgcolor="#F5F5F5">#</th>
        <th width="130" height="50" align="left" bgcolor="#F5F5F5">คำตอบ</th>
        <td height="50" colspan="3"><?=$show_reply['reply_msg'];?></td>
      </tr>
      <tr >
        <td width="50" height="15" bgcolor="#F5F5F5" id="size-new-line2"><?=$lines;?></td>
        <th width="130" height="15" align="left" bgcolor="#F5F5F5" id="size-new-line2">ผู้ตอบคำถาม</th>
        <td width="205" height="15" bgcolor="#F5F5F5" id="size-new-line2"> <?=$show_reply['reply_post'];?></td>
        <th width="100" height="15" align="center" bgcolor="#F5F5F5" id="size-new-line2">วันที่ตอบ </th>
        <td width="515" height="15" bgcolor="#F5F5F5" id="size-new-line2"><?=$show_reply['reply_date'];?></td>
      </tr>
    </table>
  </div>
  <br>
  <?php
				}
	}

  if($_SESSION['se_status']  !=  NULL)//ต้องมีสถานะถึงจะตอบคำถามได้
    {
  ?>
  <div class="page-header ">
       <h1 class="center"><span class="cl-green">ตอบคำถาม</span></h1>
  </div>
  <br>
  <div class="add">
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" name="frm-add" id="frm-add" autocomplete="off">
      <table width="460" border="0" cellpadding="0" cellspacing="0">
         <tr>
           <td height="15" align="right">&nbsp;</td>
           <td height="15">&nbsp;</td>
           <td height="15" colspan="2">&nbsp;</td>
         </tr>
         <tr>
           <td width="90" height="60" align="right">รายละเอียด</td>
           <td width="10" height="60">&nbsp;</td>
           <td height="60" colspan="2"><textarea name="reply_msg" cols="52" rows="4" id="reply_msg" class="txt-area"></textarea></td>
        </tr>
         <tr>
           <td width="90" height="40" align="right">ID ผู้ตอบ</td>
           <td width="10" height="40">&nbsp;</td>
           <td height="40" colspan="2"><input name="textfield" type="text" disabled="disabled" id="textfield" readonly class="txt-field" value="<?=$_SESSION['se_id'];?>"></td>
        </tr>
         <tr>
           <td height="15">&nbsp;</td>
           <td height="15">&nbsp;</td>
           <td height="15" align="center">&nbsp;</td>
           <td height="15" align="center">&nbsp;</td>
        </tr>
         <tr>
           <td width="90" height="60"><input name="hid_id" type="hidden" id="hid_id" value="<?=$_GET['ply_id'];?>"></td>
           <td width="10" height="60">&nbsp;</td>
           <td width="180" height="60" align="center">&nbsp;</td>
           <td width="180" height="60" align="center"><input type="submit" name="submit" id="submit" value="ตกลง" class="btn"  onClick="return  check_post();"></td>
        </tr>
      </table>
    </form>
  </div>
  <?php
	}
  ?>
  
  
  
  <div class="clear-fix"></div>
</div>
<?php
     mysql_close($config);
  }
?>

<?php
include('footer.php');
?>



<?php
if($_SERVER['REQUEST_METHOD']  == 'POST')
  {
	  include('config.php');
	   $reply_msg  =  $_POST['reply_msg'];
	   $hid_id  = $_POST['hid_id'];
	   
	   $sql_reply  =  "insert into  replys  (reply_msg  ,  reply_date  ,  reply_post  , board_id) values ('".$reply_msg."'  ,  SYSDATE() ,  '".$_SESSION['se_id']."'  ,  '".$hid_id."'  )  "; 
	   $result_reply  =  mysql_query($sql_reply);
	   if($result_reply  ==  true)
	      {
			  $sql_up  =  "update  boards  set  board_topic  =  board_topic  + 1  where  board_id  =  '".$hid_id."'  ";
			  $result_up  =  mysql_query($sql_up);
			  echo  "<script>alert('ตอบกระทู้สำเร็จแล้ว');window.location='show-topic.php?ply_id=".$hid_id."';</script>";
		  }
	  mysql_close($config);  
	   
  }
?>


<script>
function  check_post()
   {
	   var  data1  =  document.getElementById('reply_msg');
	   if(data1.value  ==  '')
	      {
			  alert('กรอกข้อมูล');
			  data1.focus();
			  return  false;
		  }
	   else
	      {
			  return  true  
		  }
	   
   }
</script>

</body>
</html>