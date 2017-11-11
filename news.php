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
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="30" height="35" align="left">#</th>
    	    <th width="670" height="35" align="left">หัวเรื่องข่าวสาร</th>
    	    <th width="100" align="left">วันที่โพส</th>
    	    <th width="100" align="left">ผู้โพส</th>
    	    <th width="100" height="35" align="left">อ่านข่าวสาร</th>
  	    </tr>
        <?php
        include('config.php');
		$sql_new	=	"select  *  from news  order by  new_date  desc  limit 0,20";
		$result_new		=	mysql_query($sql_new);
		$line  =  0;
		while($new	=	mysql_fetch_assoc($result_new))
				{
					$line++;
		?>
    	  <tr>
    	    <td width="30" height="35" align="left"><?=$line;?></td>
    	    <td width="670" height="35" align="left"><?=$new['new_title'];?></td>
    	    <td width="100" align="left"><?=$new['new_date'];?></td>
    	    <td width="100" align="left"><?=$new['admin_user'];?></td>
    	    <td width="100" height="35" align="center"><a href="new_detail.php?say_id=<?=$new['new_id']?>" style="text-decoration:none;">คลิก &gt;&gt;</a></td>
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