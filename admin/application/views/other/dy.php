<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/base.css">
<title>单页管理</title>
</head>

<body>
<!--  内容列表   -->
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
  <tr bgcolor="#E7E7E7">
    <td height="24" colspan="5" background="<?php echo base_url()?>images/tbg.gif" bgcolor="#E7E7E7">&nbsp;单页管理&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FAFAF1" height="22">
    <td width="7%">位置</td>
    <td width="26%" align="center">名称</td>
    <td width="10%" align="center">标识</td>
    <td width="34%" align="center">地址</td>
    <td width="23%" align="center">操作</td>
  </tr>
  <?php if(!empty($res)){ 
  foreach($res as $key) :
  ?>
  <?php echo form_open('dy/change_dy');?>
  <input type="hidden" name="id" value="<?php echo $key->id;?>" />
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center"><input name="weizhi" type="text" id="textfield" size="5" value="<?php echo $key->weizhi;?>" /></td>
    <td align="center"><input name="name" type="text" id="textfield3"  value="<?php echo $key->title;?>" size="35" /></td>
    <td align="center"><input name="biaoshi" type="text" id="biaoshi" size="15"  value="<?php echo $key->biaoshi;?>"/></td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="submit" name="button" id="button" value="修改" /> 
      <?php echo anchor('dy/del_dy/'.$key->id,"删除");?></td>
  </tr>
  </form>
  <?php endforeach;
	}?>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td colspan="5" align="center">&nbsp;</td>
  </tr>
  <tr align="right" bgcolor="#EEF4EA">
    <td height="32" colspan="5" align="center"><!--翻页代码 --></td>
  </tr>
</table>

<?php echo form_open('dy/add_dy');?>
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
  <tr bgcolor="#E7E7E7">
    <td height="24" colspan="5" background="<?php echo base_url()?>images/tbg.gif" bgcolor="#E7E7E7">&nbsp;添加单页内容&nbsp;</td>
  </tr>
    <tr align="center" bgcolor="#FAFAF1" height="22">
    <td width="7%">位置</td>
    <td width="26%" align="center">名称</td>
    <td width="10%" align="center">标识</td>
    <td width="34%" align="center">地址</td>
    <td width="23%" align="center">操作</td>
  </tr>
  <input type="hidden" name="check" value="<?php echo $check;?>" />
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center"><input name="weizhi" type="text" id="weizhi" size="5"  value="<?php echo $weizhi;?>"/></td>
    <td align="center"><input name="title" type="text" id="textfield4"  value="<?php echo $title;?>" size="35"/></td>
    <td align="center"><input name="biaoshi" type="text" id="biaoshi" size="15" value="<?php echo $biaoshi;?>" /></td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center">内容</td>
    <td colspan="4" align="left"><?php echo $ck;?></td>
  </tr>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center">&nbsp;</td>
    <td colspan="4" align="left"><input type="submit" name="button2" id="button2" value="<?php if($check=="wu"){?>添加<?php }else{echo "修改";}?>" /></td>
  </tr>
  <tr bgcolor="#FAFAF1">
    <td height="28" colspan="5">&nbsp;</td>
  </tr>
</table>
</form>

</body>
</html>
