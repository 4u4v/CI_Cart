<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/base.css">
<title>分类管理</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>
<body>

<div class="cat_menu"><span><a href="<?php echo site_url('category/add');?>">==>添加分类</a></span></div>
<form method="post" action="" name="listForm">
	<div class="list-div">
		<table width="98%" border="0" bordercolor="#FFFF99" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
			<tbody>
				<tr bgcolor="#E7E7E7">
					<th>分类名称</th>
					<th>商品数量</th>
					<th>数量单位</th>
					<th>导航栏</th>
					<th>是否显示</th>
					<th>价格分级</th>
					<th>排序</th>
					<th>操作</th>
				</tr>
        <?php foreach($cates as $cate) :?>
				<tr align="center" bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';">
					<td align="left" class="first-cell">
            <?php echo str_repeat("&nbsp;&nbsp;", $cate['level'])?>
						<img src="<?php echo base_url()?>images/icon/menu_minus.gif" id="icon_0_1" width="9" height="9" border="0" style="margin-left:0em" onclick="rowClicked(this)">
						<span><a href="<?php echo site_url('category/edit').'/'. $cate['cat_id'];?>"><?php echo $cate['cat_name'];?></a></span>
					 </td>
					<td width="10%">0</td>
					<td width="10%"><span onclick="listTable.edit(this, 'edit_measure_unit', 1)" title="点击修改内容" style=""><?php echo $cate['unit'];?></span></td>
					<td width="10%"><img src="<?php echo base_url()?>images/icon/no.gif" onclick="listTable.toggle(this, 'toggle_show_in_nav', 1)"></td>
					<td width="10%"><img src="<?php echo base_url()?>images/icon/yes.gif" onclick="listTable.toggle(this, 'toggle_is_show', 1)"></td>
					<td><span onclick="listTable.edit(this, 'edit_grade', 1)" title="点击修改内容" style="">5</span></td>
					<td width="10%"><span onclick="listTable.edit(this, 'edit_sort_order', 1)" title="点击修改内容" style=""><?php echo $cate['sort_order'];?></span></td>
					<td width="24%" align="center">
						<a href="<?php echo site_url('category/edit').'/'. $cate['cat_id'];?>">编辑</a> |
						<a href="<?php echo site_url('category/delete').'/'. $cate['cat_id'];?>" onclick="return confirm('您确认要删除这条记录吗?')" title="移除">移除</a>
					</td>
				</tr>
      <?php endforeach; ?>

	</tbody>
   </table>
  </div>
</form>

</body>
</html>