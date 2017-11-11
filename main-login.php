<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body  onLoad="MM_preloadImages('img/icon-man-low.png')">
<?php
include('bar-top.php');
?>
<div class="con-login">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150" height="128"><a href="login-user.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','img/icon-man-low.png',1)"><img src="img/icon-man.png" alt="" width="128" height="128" id="Image8"></a></td>
      <td width="200" height="128"><h1>Sign in for <span class="cl-green">User</span></h1></td>
      <td width="150" height="128"><a href="login-admin.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image9','','img/icon-man-low.png',1)"><img src="img/icon-man.png" alt="" width="128" height="128" id="Image9"></a></td>
      <td width="200" height="128"><h1>Sign in for <span class="cl-green">Admin</span></h1></td>
    </tr>
  </table>
</div>
<?php
include('footer.php');
?>


<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</body>
</html>