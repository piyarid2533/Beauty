<?php
$config	=	mysql_connect('localhost','root','') or die ('No connect Host');
  				mysql_query('set names utf8',$config);
				mysql_select_db('db_salon' , $config) or die('No connect Database');
?>
