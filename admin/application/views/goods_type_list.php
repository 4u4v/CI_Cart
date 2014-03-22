<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/base.css">
<title>商品类型管理</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>
<body>

<div class="cat_menu"><span><a href="<?php echo site_url('goods_type/add');?>">==>添加商品类型</a></span></div>
<form method="post" action="" name="listForm">
<!-- start goods type list -->
<div class="list-div" id="listDiv">

	<table width="98%" border="0" bordercolor="#FFFF99" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
		<tbody>
			<tr bgcolor="#E7E7E7">
				<th>商品类型名称</th>
				<th>属性分组</th>
				<th>属性数</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
      <?php foreach($goodstypes as $goodstype) :?>
			<tr bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';">
				<td class="first-cell"><span onclick="javascript:listTable.edit(this, 'edit_type_name', 1)"><?php echo $goodstype['type_name']?></span></td>
				<td></td>
				<td align="right">12</td>
				<td align="center"><img src="<?php echo base_url('')?>images/icon/yes.gif"></td>
				<td align="center">
				  <a href="<?php echo site_url('attribute/list').'/'.$goodstype['type_id'];?>" title="属性列表">属性列表</a> |
				  <a href="<?php echo site_url('goods_type/edit').'/'.$goodstype['type_id'];?>" title="编辑">编辑</a> |
				  <a href="javascript:;" onclick="listTable.remove(1, '删除商品类型将会清除该类型下的所有属性。\n您确定要删除选定的商品类型吗？')" title="移除">移除</a>
				</td>
			</tr>
      <?php endforeach; ?>
    
      <tr>
      <td align="right" nowrap="true" colspan="6" style="background-color: rgb(255, 255, 255);">
            <?php echo $pageinfo;?>
      </td>
    </tr>
  </tbody></table>

</div>
<!-- end goods type list -->
</form>

</body>
</html>