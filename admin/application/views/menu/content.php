<html>
<head>
<title>menu</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/base.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="<?php echo base_url()?>js/frame/menu.js"></script>
<base target="main" />
</head>
<body target="main">
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td style='padding-left:3px;padding-top:8px' valign="top">
	<!-- Item 1 Strat -->

      <!-- Item 1 End -->
      <!-- Item 2 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>文章管理</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='<?php echo site_url('news/category/index');?>' target='main'>分类管理</a></li>
            <li><a href='<?php echo site_url('news/article/add');?>' target='main'>添加文章</a></li>
            <li><a href='<?php echo site_url('news/article/index');?>' target='main'>文章管理</a></li>

          </ul>
        </dd>
      </dl>
      <!-- Item 2 End -->
          
       <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>产品管理</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='<?php echo site_url('category/index');?>' target='main'>分类管理</a></li>
            <li><a href='<?php echo site_url('product/add');?>' target='main'>添加产品</a></li>
            <li><a href='<?php echo site_url('product/index');?>' target='main'>产品管理</a></li>
          </ul>
        </dd>
      </dl>
      
        <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>品牌属性</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='<?php echo site_url('brand/index');?>' target='main'>品牌管理</a></li>
            <li><a href='<?php echo site_url('brand/add');?>' target='main'>添加品牌</a></li>
            <li><a href='<?php echo site_url('goods_type/index');?>' target='main'>属性管理</a></li>
          </ul>
        </dd>
      </dl>
           
	  </td>
  </tr>
</table>
</body>
</html>