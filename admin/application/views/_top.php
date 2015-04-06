<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link href="<?php echo base_url()?>css/general.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url()?>js/jquery.js"></script>


<script language="JavaScript"> 
<!--
var menuFrame = parent.document.getElementById('menu-frame');
var frmBody = parent.document.getElementById('frame-body');
function changeMenu(menuSrc)
{   	
    $(menuFrame).attr('src',menuSrc);
}

$(document).ready(function() {
	$('#nav1').find('li').click(function(){
		$('#nav1').find('a').removeClass();
		$(this).find('a').addClass('tab-front');
		frmBody.cols="230, *";
	})
});
 //--> 
</script>


<style type="text/css">
#nav1{height:28px;left:24px;position:absolute;top:5px;width:768px;z-index:100;float:left}
#nav1 ul{width:572px;height:25px;}
#nav1 li{float:left;line-height:22px;word-spacing:6px;margin-right:3px}
#nav1 li a{color:#15428b;padding:2px 10px;text-decoration:none;font:bold 13px Arial, Helvetica,sans-serif;}
#nav1 li a:hover{text-decoration:none;color:#fff;background:#abc7ec}
#nav1 .tab-front{color:#fff;background:#abc7ec}

#admin{
	height:28px;
	right:10px;
	position:absolute;
	top:5px;
	width:180px;
	z-index:100;
	float:left;
	font:bold 13px Arial, Helvetica,sans-serif;
}
#admin  a{color:#15428b;padding:2px;text-decoration:none;font:normal 12px Arial, Helvetica,sans-serif;}

#menu-div {
  background: #80BDCB;
  font-weight: bold;
  height: 24px;
  line-height:24px;
}

#menu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#menu-div li {
  float: left;
  border-right: 1px solid #192E32;
  border-left:1px solid #BBDDE5;
}

#menu-div a:visited, #menu-div a:link {
  display:block;
  padding: 0 20px;
  text-decoration: none;
  color: #335B64;
  background:#9CCBD6;
}

#menu-div a:hover {
  color: #000;
  background:#80BDCB;
}

#submenu-div a.fix-submenu{ clear:both; margin-left:5px; padding:1px 5px; *padding:3px 5px 5px; background:#DDEEF2; color:#278296; }
#submenu-div a.fix-submenu:hover{ padding:1px 5px; *padding:3px 5px 5px; background:#FFF; color:#278296; }
#menu-div li.fix-spacel{ width:30px; border-left:none; }
#menu-div li.fix-spacer{ border-right:none; }

</style>
</head>
<body class=" x-border-layout-ct">
<div id="menu-div"> <!--主菜单布局-->
	<ul>
	<li ><a href="<?php echo site_url('dashboard')?>" target="main-frame" onclick="changeMenu('<?php echo site_url('frameset/menu/dashboard');?>')">控制面板</a></li>
	<li><a href="<?php echo site_url('order')?>" target="main-frame" onclick="changeMenu('<?php echo site_url('frameset/menu/sales');?>')">订单管理</a></li>
	<li><a class="tab-front"href="<?php echo site_url('product')?>" target="main-frame" onclick="changeMenu('<?php echo site_url('frameset/menu/product');?>')">商品管理</a></li>
	<li><a href="<?php echo site_url('customer')?>" target="main-frame" onclick="changeMenu('<?php echo site_url('frameset/menu/customer');?>')">用户管理</a></li>
	<li><a href="<?php echo site_url('report')?>" target="main-frame" onclick="changeMenu('<?php echo site_url('frameset/menu/dashboard');?>')">插件模块</a></li>
	<li><a href="<?php echo site_url('payment')?>" target="main-frame" onclick="changeMenu('<?php echo site_url('frameset/menu/system');?>')">系统管理</a></li>
	</ul>
</div>
<div id="admin">&nbsp;&nbsp;<a target="_blank" href="<?php echo front_url();?>">网站前台<a/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('name');?>&nbsp;&nbsp;&nbsp;&nbsp;<a target="_top" href="<?php echo site_url('logout')?>">退出<a/></div>


</body>
<html>

