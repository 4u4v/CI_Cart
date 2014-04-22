<?php 

class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		$this->load->model('category_model');
	}

	/*
	 * 默认分类列表首页
	 */
	public function index()
	{
		$data['title'] = "分类目录列表";
		//调用模型中category_list方法得到数据
		$data['category']=$this->category_model->category_list();
		//加载到视图文件
		$this->load->view('category', $data);
	}
	
	/*
	 * 完成分类的添加
	 */
	function insert(){
		$data['cat_name'] = $this->input->post('name');
		$data['cat_ename'] = $this->input->post('alias');
		$data['sort_id'] = $this->input->post('weizhi');
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
	
	/*
	 * 更新数据
	 */
	function update(){
		$where['id']=$this->input->post('id');
		$arr['cat_name']=$this->input->post('name');
		$arr['cat_ename']=$this->input->post('alias');
		$arr['sort_id']=$this->input->post('weizhi');
		$res=$this->db->update('category', $arr, $where);
		if($res)
		{
			$title = "";
			$content = "分类修改成功！即将自动进入分类列表中心.....";
			$target_url = site_url("category/index");
			message($title, $content, $target_url, $delay_time = 2);
		}
		else
		{
			$title = "";
			$content = "修改分类失败！即将自动进入分类列表中心.....";
			$target_url = site_url("category/index");
			message($title, $content, $target_url, $delay_time = 2);
		}
	}
	
	/*
	 * 删除记录
	 */
	function delete($id){
		$this->db->where('id', $id);
		$result = $this->db->delete('category');
		if ($result){
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
	}
}