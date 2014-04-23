<?php echo $this->load->view('header');?>

<body>

<h3>
<span class="action-span"><a href="<?php echo site_url('category/index');?>">商品分类</a></span>
<span class="action-span1"><a href="<?php echo site_url();?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h3>
<!-- start add new category form -->
<div class="main-div">
  <form action="<?php echo site_url('category/insert');?>" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
	 <table width="98%" id="general-table">
		<tbody>
			<tr>
				<td class="label">分类名称:</td>
				<td><input type="text" name="cat_name" maxlength="20" value="" size="27"> <font color="red">*</font></td>
			</tr>
			<tr>
				<td class="label">上级分类:</td>
				<td>
					<select name="parent_id">
						<option value="0">顶级分类</option>
						<?php foreach($cates as $cate) : ?>
						<option value="<?php echo $cate['cat_id'];?>">
							<?php echo str_repeat('&nbsp;&nbsp;',$cate['level'])?>
							<?php echo $cate['cat_name'];?>
						</option>
						<?php endforeach;?>      
					</select>
				</td>
			</tr>

			<tr id="measure_unit">
				<td class="label">数量单位:</td>
				<td><input type="text" name="unit" value="" size="12"></td>
			</tr>
			<tr>
				<td class="label">排序:</td>
				<td><input type="text" name="sort_order" value="50" size="15"></td>
			</tr>

			<tr>
				<td class="label">是否显示:</td>
				<td><input type="radio" name="is_show" value="1" checked="true"> 是<input type="radio" name="is_show" value="0"> 否  </td>
			</tr>
			<tr>
				<td class="label">是否显示在导航栏:</td>
				<td><input type="radio" name="show_in_nav" value="1"> 是  <input type="radio" name="show_in_nav" value="0" checked="true"> 否    </td>
			</tr>
			<tr>
				<td class="label">设置为首页推荐:</td>
				<td>
					<input type="checkbox" name="cat_recommend[]" value="1"> 精品          
					<input type="checkbox" name="cat_recommend[]" value="2"> 最新          
					<input type="checkbox" name="cat_recommend[]" value="3"> 热门       
				</td>
			</tr>
      <tr>
        <td class="label">分类描述:</td>
        <td>
          <textarea name="cat_desc" rows="6" cols="48"></textarea>
        </td>
      </tr>
      </tbody></table>
      <div class="button-div">
        <input type="submit" value=" 确定 ">
        <input type="reset" value=" 重置 ">
      </div>
    <input type="hidden" name="act" value="insert">
    <input type="hidden" name="old_cat_name" value="">
  </form>
</div>

<?php $this->load->view('footer');?>