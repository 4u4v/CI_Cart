
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>main</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/main.css" />
</head>
<body leftmargin="8" topmargin='8'>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div style='float:left'> <img height="14" src="<?php echo base_url()?>images/frame/book1.gif" width="20" />&nbsp;欢迎使用CI后台管理系统，CodeIgniter——PHP网站开发的首选框架。 </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="<?php echo base_url()?>images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td background="<?php echo base_url()?>images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>消息</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr>
    <td colspan="2" background="<?php echo base_url()?>images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'>
    	<div style='float:left'><span>快捷操作</span></div>
    	<div style='float:right;padding-right:10px;'></div>
   </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="30" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="15%" height="31" align="center"><img src="<?php echo base_url()?>images/frame/qc.gif" width="90" height="30" /></td>
          <td width="85%" valign="bottom"><div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>images/frame/addnews.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>文档列表</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>images/frame/menuarrow.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>评论管理</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>images/frame/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>内容发布</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>images/frame/file_dir.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>栏目管理</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>images/frame/part-index.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>更新系统缓存</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>images/frame/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>修改系统参数</u></a></div>
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr bgcolor="#EEF4EA">
    <td colspan="2" background="<?php echo base_url()?>images/frame/wbg.gif" class='title'><span>系统基本信息</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" bgcolor="#FFFFFF">使用环境：</td>
    <td width="75%" bgcolor="#FFFFFF"><?php echo PHP_OS;?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>WEB服务器版本：</td>
    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>php版本</td>
    <td><?php echo PHP_VERSION;?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>MYSQL版本</td>
    <td><?php
    mysql_connect ("localhost",  "root",  "52mysql1314", "ci_cart");
     echo mysql_get_server_info();?>
     </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>产品缩略图目录</td>
    <td><?php 
	if(is_writable("./cphoto")){echo "可写";}else {echo "<span style='color:red'>不可写</span>";}
	?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>编辑器上传目录</td>
    <td><?php if(is_writable("./js/kindeditor/attached")){echo "可写";}else {echo "<span style='color:red'>不可写</span>";}?></td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC">
  <tr bgcolor="#EEF4EA">
    <td colspan="2" background="<?php echo base_url()?>images/frame/wbg.gif" class='title'><span>使用帮助</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="32">水木科技：</td>
    <td><a href="http://www.4u4v.net" target="_blank"><u>http://www.4u4v.net</u></a></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="32">地址:</td>
    <td>互联网-水木社区-水木工作室</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" height="32">客服：</td>
    <td width="75%">QQ:35991353 Email：admin@4u4v.net</td>
  </tr>
</table>
</body>
</html>