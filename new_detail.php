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
    <h1><span class="cl-green">ข่าวสาร</span></h1>
  </div>
  <br>
  <div class="show">
<?php  
if($_GET['say_id']  !=  NULL)	  
        include('config.php');
		$sql_new	=	"select  *  from news  where  new_id  =  '".$_GET['say_id']."' ";
		$result_new		=	mysql_query($sql_new);
		while($new	=	mysql_fetch_assoc($result_new))
				{

?>
    <table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="150" height="35" align="left">หัวเรื่องข่าวสาร</th>
        <td width="750" align="left"><?=$new['new_title'];?></td>
        <th width="100" rowspan="2" align="left"><input type="button" name="button" id="button" value="exit" class="btn" onClick="window.location='news.php';"></th>
      </tr>
      <tr>
        <td width="150" height="100" align="left">รายละเอียด</td>
        <td width="750" align="left" valign="middle"><?=$new['new_msg'];?></td>
      </tr>
      <?php
				}
		?>
    </table>
  </div>
</div>
<?PHP
include('footer.php');
?>
</body>
</html>