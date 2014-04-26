<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/base.css">
<title>品牌管理</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>
<body>

<div class="cat_menu"><span><a href="<?php echo site_url('brand/add');?>">==>添加品牌</a></span></div>
<form method="post" action="" name="listForm">
	<div class="list-div">
		<table width="98%" border="0" bordercolor="#FFFF99" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
		    <tbody>
		<tr bgcolor="#E7E7E7">
			<th>品牌名称</th>
			<th>品牌LOGO</th>
			<th>品牌网址</th>
			<th>品牌描述</th>
			<th>排序</th>
			<th>是否显示</th>
			<th>操作</th>
		</tr>
    <?php foreach($brands as $brand) :?>
    <tr bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';">
			<td class="first-cell">
			<span onclick="javascript:listTable.edit(this, 'edit_brand_name', 1)" title="点击修改内容" style=""><?php echo $brand['brand_name'];?></span>
			</td>
			<td><span style="float:right"><a href="<?php echo $brand['url'];?>" target="_brank"><img src="<?php echo base_url('upload/brandlogo').'/'.$brand['logo'];?>" width="100" height="31" border="0" alt="品牌LOGO" /></a></span></td>
			<td><a href="http://<?php echo $brand['url'];?>" target="_brank"><?php echo $brand['url'];?></a></td>
			<td align="left" ><?php echo $brand['brand_desc'];?></td>
			<td align="right"><span onclick="javascript:listTable.edit(this, 'edit_sort_order', 1)"><?php echo $brand['sort_order'];?></span></td>
			<td align="center"><img src="<?php echo base_url('')?>images/icon/yes.gif" onclick="listTable.toggle(this, 'toggle_show', 1)"></td>
			<td align="center">
				<a href="<?php echo site_url('brand/edit').'/'.$brand['brand_id'];?>" title="编辑">编辑</a> |
				<a href="javascript:if(confirm('确实要删除吗?')) location='<?php echo site_url('brand/delete').'/'.$brand['brand_id'];?>'" >删除</a>
			</td>
		</tr>
  <?php endforeach;?>
    <tr>
		<td align="right" nowrap="true" colspan="6">
            <div id="turn-page">
			总计  <span id="totalRecords">11</span>
        个记录分为 <span id="totalPages">2</span>
        页当前第 <span id="pageCurrent">1</span>
        页，每页 <input type="text" size="3" id="pageSize" value="10" onkeypress="return listTable.changePageSize(event)">
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <option value="1">1</option><option value="2">2</option>          </select>
        </span>
      </div>
      </td>
    </tr>
  </tbody>
  </table>
  </div>
</form>

</body>
</html>