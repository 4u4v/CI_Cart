<?php
class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');//载入身份验证模型
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->library('form_validation');
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		$this->load->model('category_model');
	}

	/*
	 * 默认分类列表首页
	 */
	public function index()
	{
		$data['title'] = "商品分类列表";
		//调用模型中category_list方法得到数据
		$data['cates']=$this->category_model->category_list();
		//加载到视图文件
		$this->load->view('category', $data);
	}
	
	// 显示添加表单
	public function add(){
		$data['title'] = "添加商品分类";
		$data['cates'] = $this->category_model->category_list();
		$this->load->view('cat_add', $data);
	}
	/*
	 * 完成分类的添加
	 */
	function insert(){
		//设置验证规则
		$this->form_validation->set_rules('cat_name','分类名称','trim|required');
		if ($this->form_validation->run() == false) {
			//未通过验证
			$title = "未通过表单验证";
			$content = validation_errors();
			$target_url = site_url("category/add");;
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$data['cat_name'] = $this->input->post('cat_name',true);
			$data['parent_id'] = $this->input->post('parent_id');
			$data['unit'] = $this->input->post('unit',true);
			$data['sort_order'] = $this->input->post('sort_order',true);
			$data['cat_desc'] = $this->input->post('cat_desc',true);
			$data['is_show'] = $this->input->post('is_show');
			//var_dump($data);
		if($this->category_model->add_category($data)){
			$title = "分类添加成功";
			$content = "分类添加成功！即将自动进入分类列表中心.....";
			$target_url = site_url("category/index");
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "分类添加失败";
			$content = "抱歉~，您输入的内容有误或不完整！即将自动返回分类添加页面.....";
			$target_url = site_url("category/add");;
			message($title, $content, $target_url, $delay_time = 3);
		}
	  }
	}
	
	//显示编辑表单
	public function edit($cat_id){
		#获取所有的分类信息
		$data['cates'] = $this->category_model->category_list();
		#获取当前这条记录的信息
		//获取cat_id
		$data['current_cat'] = $this->category_model->get_cate($cat_id);
		$this->load->view('cat_edit', $data);
	}
	
	/*
	 * 更新数据
	 */
	function update(){
		$cat_id=$this->input->post('cat_id');
		//获取该cat_id 分类下的所有后代分类
		$sub_cate = $this->category_model->category_list('$cat_id');
		//获取这些后代分类的cat_id
		$sub_ids = array();
		foreach ($sub_cate as $v){
			$sub_ids[] = $v['cat_id'];
		}
		$parent_id = $this->input->post('parent_id');
		//判断所选的父分类是否为当前分类或其后代分类
		if ($parent_id==$cat_id || in_array($parent_id, $sub_ids))
		{
			$title = "操作有误";
			$content = "不能将分类放置到当前分类或其子分类！";
			$target_url = site_url("category/edit") . '/'.$cat_id;
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			//更新操作
			$this->form_validation->set_rules('cat_name','分类名称','trim|required');
			if ($this->form_validation->run() == false) {
				//未通过表单验证
				$title = "未通过表单验证";
				$content = validation_errors();
				$target_url = site_url("category/edit");;
				message($title, $content, $target_url, $delay_time = 3);
			} else {
			    //通过表单验证时
				$data['cat_name'] = $this->input->post('cat_name',true);
				$data['parent_id'] = $this->input->post('parent_id');
				$data['unit'] = $this->input->post('unit',true);
				$data['sort_order'] = $this->input->post('sort_order',true);
				$data['cat_desc'] = $this->input->post('cat_desc',true);
				$data['is_show'] = $this->input->post('is_show');
				if($this->category_model->update_category($data,$cat_id))
				{
					$title = "";
					$content = "分类修改成功！即将自动进入分类列表中心.....";
					$target_url = site_url("category/index");
					message($title, $content, $target_url, $delay_time = 2);
				} else {
					$title = "";
					$content = "修改分类失败！即将自动进入分类列表中心.....";
					$target_url = site_url("category/index");
					message($title, $content, $target_url, $delay_time = 2);
				}
			}
		}
	}
	
	/*
	 * 删除记录
	 */
	function delete(){
		$cat_id = $this->uri->segment(3);
		//如果不是底层分类,则不允许删除
		$sub_cates = $this->category_model->category_list($cat_id);
		if (empty($sub_cates)) {
			if ($this->category_model->delete_cate($cat_id)){
				$title = "分类删除成功";
				$content = "分类删除成功！即将自动进入分类列表中心.....";
				$target_url = site_url("category/index");
				message($title, $content, $target_url, $delay_time = 2);
			} else {
				$title = "分类删除失败";
				$content = "分类删除失败！即将自动进入分类列表中心.....";
				$target_url = site_url("category/index");
				message($title, $content, $target_url, $delay_time = 2);
			}
		} else {
			$title = "操作有误";
			$content = "该分类下面还包含其他分类，先删除其子分类！即将自动进入分类列表中心.....";
			$target_url = site_url("category/index");
			message($title, $content, $target_url, $delay_time = 5);
		}
		
	}
	
}