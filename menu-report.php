

<? session_start();?>
<form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_group" method="post" name="show-debit" id="frm_add">
  <table width="794" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="135" align="right">ระยะเวลา:</td>
      <td width="549">
            
      <select name="book_date" id="select">
      <?  $se_re = mysql_query("select  * from  teaching  where  t_id = '".$_SESSION['t_id']."' group by sj_name ORDER BY sj_name ASC");
	  while($sh_re = mysql_fetch_array($se_re)){
	  
	  ?>
      <option value="<?=$sh_re['sj_id'];?>"><?=$sh_re['sj_name'];?></option><? }?>
      </select>
      &nbsp;&nbsp;
<input type="submit" name="button" id="button" value="Submit" /></td>
      <td width="102">&nbsp;</td>
    </tr>
  </table>
</form>
