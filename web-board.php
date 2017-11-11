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

</style>
</head>

<body>
<?php
include('bar-top.php');
?>

<div class="container">
  <div class="page-header ">
       <h1><span class="cl-green">กระดานสอบถาม</span></h1>
  </div>
  <br>
  <center><a href="add-topic.php"><h4>ตั้งกระทู้สอบถาม</h4></a></center>
  <div class="show">
    <table width="1000" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <th width="50" height="35" align="left" bgcolor="#F5F5F5">#</th>
        <th width="595" height="35" align="left" bgcolor="#F5F5F5">คำถาม</th>
        <th width="130" height="35" align="left" bgcolor="#F5F5F5">ผู้ตั้งกระทู้</th>
        <th width="140" height="35" align="left" bgcolor="#F5F5F5">วันที่โพส</th>
        <th width="85" height="35" align="left" bgcolor="#F5F5F5">ผู้ตอบกระทู้</th>
      </tr>
      <?php
      include('config.php');
	  $sql_show_board  = "SELECT  * FROM boards ORDER BY board_date  DESC ";
	  $result_show_board  = mysql_query($sql_show_board);
	  $lines = 0;
	  while($show_board = mysql_fetch_assoc($result_show_board))
	  		{
				$lines++;
	  ?>
      <tr > 
        <td width="50" height="50" align="left" id="size-new-line"><?=$lines;?></td>
        <td width="595" height="50" align="left" id="size-new-line"><a href="show-topic.php?link=show-board&ply_id=<?=$show_board['board_id']?>" style="text-decoration:none" ><?=$show_board['board_title'];?></a></td>
        <td width="130" height="50" align="left" id="size-new-line"><?=$show_board['board_post'];?></td>
        <td width="140" height="50" align="left" id="size-new-line"><?=$show_board['board_date'];?></td>
        <td width="85" height="50" align="left" id="size-new-line"><?=$show_board['board_topic'];?></td>
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