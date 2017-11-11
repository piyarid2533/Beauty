<?php
session_start();
if($_SESSION['se_status']  ==  NULL)
  {
	  echo  "<script>alert('ขออภัย  =  กรุณาเข้าสู่ระบบก่อน');window.location='web-board.php';</script>";  
  }
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
  <div class="page-header ">
       <h1 class="center"><span class="cl-green">ตั้งกระทู้สอบถาม</span></h1>
  </div>
  <br>
  <div class="add">
    <form action="<?=$_SERVER['PHP_SELF'];?>?link=add-board" method="post" name="frm-add" id="frm-add" autocomplete="off">
      <table width="460" border="0" cellpadding="0" cellspacing="0">
         <tr>
           <td height="15" align="right">&nbsp;</td>
           <td height="15">&nbsp;</td>
           <td height="15" colspan="2">&nbsp;</td>
         </tr>
         <tr>
           <td width="90" height="40" align="right">หัวข้อสอบถาม</td>
           <td width="10" height="40">&nbsp;</td>
           <td height="40" colspan="2"><input name="board_title" type="text" id="board_title" size="50" maxlength="255" class="txt-field"></td>
        </tr>
         <tr>
           <td width="90" height="60" align="right">รายละเอียด</td>
           <td width="10" height="60">&nbsp;</td>
           <td height="60" colspan="2"><textarea name="board_msg" cols="52" rows="4" id="board_msg" class="txt-area"></textarea></td>
        </tr>
         <tr>
           <td width="90" height="40" align="right">ID ผู้สอบถาม</td>
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
           <td width="90" height="60">&nbsp;</td>
           <td width="10" height="60">&nbsp;</td>
           <td width="180" height="60" align="center"><input type="button" name="button" id="button" value="ย้อนกลับ" class="btn" onClick="window.location='web-board.php';"></td>
           <td width="180" height="60" align="center"><input type="submit" name="submit" id="submit" value="ตกลง" class="btn" onClick="return  check_post();"></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php
include('footer.php');
?>

<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST')
   {
	   include('config.php');
	   $board_title   =  $_POST['board_title'];
	   $board_msg  =  $_POST['board_msg'];
	   
	   $sql_add  =  "INSERT INTO  boards  (board_title , board_msg , board_date , board_post)  VALUES  ('".$board_title."' , '".$board_msg."' , SYSDATE() , '".$_SESSION['se_id']."')";
	   $result_add =  mysql_query($sql_add);
	   if($result_add  == true)
	     {
			 echo "<script>alert('เพิ่มคำถามเสร็จเรียบร้อยแล้ว');window.location='web-board.php';</script>";
		 }
	   
	   mysql_close($config);
   }
?>

<script>
function  check_post()
   {
	   var  data1  =  document.getElementById('board_title');
	   var  data2  =  document.getElementById('board_msg');
	   if(data1.value  ==  '')
	      {
			  alert('กรอก  หัวเรื่อง');
			  data1.focus();
			  return  false;
		  }
		else   if(data2.value  ==  '')
	      {
			  alert('กรอก  รายละเอียด');
			  data2.focus();
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