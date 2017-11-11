<?php
session_start();//เริ่มต้นใช้
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

<div class="con-login">
  <form method="post" name="frm-add" id="frm-add" autocomplete="off" action="<?=$_SERVER['PHP_SELF'];?>">
    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="130" align="center"><img src="img/icon-man.png" width="128" height="128"  alt=""/></td>
        <td height="130">&nbsp;</td>
        <td height="130" colspan="2" align="left" valign="bottom"><h1><span class="cl-green">สมัครสมาชิก</span></h1></td>
      </tr>
      <tr>
        <td width="150" height="15">&nbsp;</td>
        <td width="10" height="15">&nbsp;</td>
        <td width="150" height="15">&nbsp;</td>
        <td width="150" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>Username</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><strong>
          <input name="member_user" type="text" class="txt-field" id="member_user" maxlength="10">
        </strong></td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>Password</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><strong>
          <input name="member_pass" type="password" class="txt-field" id="member_pass" maxlength="10">
        </strong></td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>ชื่อ - นามสกุล</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><strong>
          <input name="member_name" type="text" class="txt-field" id="member_name" size="35" maxlength="50">
        </strong></td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>เพศ</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><p>
          <strong>
          <label>
            <input type="radio" name="member_sex" value="ชาย" id="member_sex1">
            ชาย</label>
          <label>
            <input type="radio" name="member_sex" value="หญิง" id="member_sex2">
            หญิง</label>
          <br>
        </strong></p></td>
      </tr>
      <tr>
        <td height="40" align="right"><strong>ที่อยู่</strong></td>
        <td height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><strong>
          <textarea name="member_address" cols="37" rows="4" class="txt-area" id="member_address"></textarea>
        </strong></td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>เบอร์โทรศัพท์</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><strong>
          <input name="member_tel" type="tel" class="txt-field" id="member_tel" maxlength="10">
        </strong></td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
      </tr>
      <tr>
        <td width="150" height="60">&nbsp;</td>
        <td width="10" height="60">&nbsp;</td>
        <td width="150" height="60"><input name="reset" type="reset" class="btn" id="reset" form="frm-add" value="เคลียร์ข้อมูล"></td>
        <td width="150" height="60"><input name="submit" type="submit" class="btn" id="submit" form="frm-add" value="ตกลง"  onClick="return  check_regis();"></td>
      </tr>
    </table>
  </form>
</div>


<?PHP
include('footer.php');
?>


<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST')
  {
	  include('config.php');
	  $member_user  =  $_POST['member_user'];
	  $member_pass  =  $_POST['member_pass'];
	  $member_name  =  $_POST['member_name'];
	  $member_sex  =  $_POST['member_sex'];
	  $member_address  =  $_POST['member_address'];
	  $member_tel  =  $_POST['member_tel'];
	  
	  $sql_check_user  =  "select member_user  from  members where  member_user  =  '".$member_user."'  ";
	  $result_check_user  = mysql_query($sql_check_user);
	  $row_check_user  = mysql_num_rows($result_check_user);
	  if($row_check_user  ==  true)
	    {
			echo  "<script>alert('ขออภัย  username  นี้มีในระบบแล้ว');history.back();</script>";
		}
	 else
	    {
			$sql_regis  =  "insert into  members (member_user  ,  member_pass  ,  member_name  ,  member_sex  ,  member_address  ,  member_tel  ,  member_status)  values  ('".$member_user."'  ,  '".$member_pass."'  ,  '".$member_name."'  ,  '".$member_sex."'  ,  '".$member_address."'  ,  '".$member_tel."'  ,  'user')  ";
			$result_regis  =  mysql_query($sql_regis);
			if($result_regis  == true)
			  {
				  echo  "<script>alert('สมัครสมาชิกเสร็จเรียบร้อยแล้ว');window.location='register.php';</script>";  
			  }
		}
		
	mysql_close($config);
  }
?>


<script>
function  check_regis()
   {
	    var   data1  =  document.getElementById('member_user');   
		var   data2  =  document.getElementById('member_pass');   
		var   data3  =  document.getElementById('member_name');   
		var   data4  =  document.getElementById('member_sex1');   
		var   data5  =  document.getElementById('member_sex2');   
		var   data6  =  document.getElementById('member_address');   
		var   data7  =  document.getElementById('member_tel');   
		
		
		if(data1.value  ==  '')
		   {
			   alert('กรอก  username');
			   data1.focus();
			   return  false;
		   }
		else if(data1.value.length  < 4)//เล้งชจำนวนตัวอักษร
		   {
			   alert('กรอก  username  4 ตัวขึ้นไป');
			   data1.focus();
			   return  false;
		   }		
		else if(data2.value  ==  '')
		   {
			   alert('กรอก  password');
			   data2.focus();
			   return  false;
		   }
		else if(data2.value.length  < 4)
		   {
			   alert('กรอก  password  4 ตัวขึ้นไป');
			   data2.focus();
			   return  false;
		   }	
		else if(data3.value  ==  '')
		   {
			   alert('กรอก  ชื่อ - นามสกุล');
			   data3.focus();
			   return  false;
		   }   
		else if(data4.checked  ==  false  &&  data5.checked  ==  false)//checked คือการเลือก
		   {
			   alert('เลือก  เพศ');
			   data4.focus();
			   return  false;
		   }   
		else if(data6.value  ==  '')
		   {
			   alert('กรอก  ที่อยู่');
			   data6.focus();
			   return  false;
		   }   
		else if(data7.value  ==  '')
		   {
			   alert('กรอก  เบอร์โทรศัพท์');
			   data7.focus();
			   return  false;
		   }
		else if(data7.value.length  !=  10)
		   {
			   alert('กรอก  เบอร์โทรศัพท์ให้ถูกต้อง');
			   data7.focus();
			   return  false;
		   }	
	    else if(isNaN(data7.value))//isnan คือการตรวจสอบตัวเลข
		   {
			   alert('กรอก  เบอร์โทรศัพท์  เป็นตัวเลข');
			   data7.value  =  '';
			   data7.focus();
			   return  false;
		   }
		else
		   {
			   return  true;   
		   }
   }
</script>

</body>
</html>