<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">
<title>分类管理</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>

<body>

<!--  内容列表   -->
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
  <tr bgcolor="#E7E7E7">
    <td height="24" colspan="4" background="<?php echo base_url()?>skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;分类列表&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FAFAF1" height="22">
    <td width="8%">栏目排序</td>
    <td width="30%" align="center">栏目名称</td>
    <td width="30%" align="center">英文名称</td>
    <td width="32%" align="center">操作</td>
  </tr>
  <?php if(!empty($category)){ 
  foreach($category as $key) {
  ?>
  <?php 
  echo form_open("category/update");
  //跨站请求伪造CSRF保护(后面加."?id=".$key['id']无效！)
  ?>
  <input type="hidden" name="id" value="<?php echo $key['id'];?>" />
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center"><input name="weizhi" type="text" id="textfield" size="5" value="<?php echo $key['sort_id'];?>" /></td>
    <td align="center"><input type="text" name="name" id="textfield3"  value="<?php echo $key['cat_name'];?>" /></td>
    <td align="center"><input name="alias" type="text" id="textfield5" size="40"  value="<?php echo $key['cat_ename'];?>" /></td>
    <td align="left"> &nbsp; <input type="submit" name="button" id="button" value="修改" /> &nbsp; &nbsp;
    <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo site_url('category/delete').'/'.$key['id'];?>'" >删除</a></td>
  </tr>
  </form>
  <?php }}?>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <?php echo form_open('category/insert');?>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center"><input name="weizhi" type="text" id="textfield2" size="5" /></td>
    <td align="center"><input type="text" name="name" id="textfield4" /></td>
    <td align="center"><input name="alias" type="text" id="textfield6" size="40" /></td>
    <td align="left"> &nbsp; <input type="submit" name="button2" id="button2" value="添加" /></td>
  </tr>
  </form>
  <tr bgcolor="#FAFAF1">
    <td height="28" colspan="4">&nbsp;</td>
  </tr>
  <tr align="right" bgcolor="#EEF4EA">
    <td height="36" colspan="4" align="center"><!--翻页代码 --></td>
  </tr>
</table>

</body>
</html>
