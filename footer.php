<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
<div class="footer">
&copy; 2013 ICT Mahasarakham University

	<div class="wel-come">
    	<?php
        if($_SESSION['se_status'] == 'user')
		  {
		?>
    			<h1><a href="user/index-user.php" style="text-decoration:none;" class="cl-pink">Welcome for user</a></h1>
         <?php
		  }
		 else if($_SESSION['se_status'] == 'admin')
		 {
		 ?>       
        		<h1><a href="admin/index-admin.php" style="text-decoration:none;" class="cl-pink">Welcome for admin</a></h1>
        <?php
		 }
		?>
    </div>

<div class="clear-fix"></div>
</div>
</body>
</html>