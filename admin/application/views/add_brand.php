<?php echo $this->load->view('header');?>

<body>

<h3>
<span class="action-span"><a href="<?php echo site_url('brand/index');?>">商品品牌</a></span>
<span class="action-span1"><a href="<?php echo site_url();?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h3>
<!-- start add new brand form -->
<div class="main-div">
  <form method="post" action="<?php echo site_url('brand/insert');?>" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
<table cellspacing="1" cellpadding="3" width="98%">
  <tbody><tr>
    <td class="label">品牌名称</td>
    <td><input type="text" name="brand_name" maxlength="60" value=""><span class="require-field">*</span></td>
  </tr>
  <tr>
    <td class="label">品牌网址</td>
    <td><input type="text" name="url" maxlength="60" size="40" value=""></td>
  </tr>
  <tr>
    <td class="label"><a href="javascript:showNotice('warn_brandlogo');" title="点击此处查看提示信息">
        <img src="images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>品牌LOGO</td>
    <td><input type="file" name="logo" id="logo" size="45">    <br><span class="notice-span" style="display:block" id="warn_brandlogo">
        请上传图片，做为品牌的LOGO！        </span>
    </td>
  </tr>
  <tr>
    <td class="label">品牌描述</td>
    <td><textarea name="brand_desc" cols="60" rows="4"></textarea></td>
  </tr>
  <tr>
    <td class="label">排序</td>
    <td><input type="text" name="sort_order" maxlength="40" size="15" value="50"></td>
  </tr>
  <tr>
    <td class="label">是否显示</td>
    <td><input type="radio" name="is_show" value="1" checked="checked"> 是        <input type="radio" name="is_show" value="0"> 否        (当品牌下还没有商品的时候，首页及分类页的品牌区将不会显示该品牌。)
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br>
      <input type="submit" class="button" value=" 确定 ">
      <input type="reset" class="button" value=" 重置 ">
      <input type="hidden" name="act" value="insert">
      <input type="hidden" name="old_brandname" value="">
      <input type="hidden" name="id" value="">
      <input type="hidden" name="old_brandlogo" value="">
    </td>
  </tr>
</tbody>
</table>
</form>
</div>

<?php $this->load->view('footer');?>