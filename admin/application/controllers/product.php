<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 商品管理
 * @Author 水木
 */
class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');//载入身份验证模型
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->library('form_validation');
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		$this->load->model('product_model');
	}

	/*
	 * 默认分类列表首页
	 */
	public function index()
	{
		$data['title'] = "商品列表";
		//调用模型中propduct_list方法得到数据
		$data['propducts']=$this->propduct_model->propduct_list();
		//加载到视图文件
		$this->load->view('propduct_list', $data);
	}
	
	// 显示添加表单
	public function add(){
		$data['title'] = "添加商品";
		$this->load->view('add_product', $data);
	}
	/*
	 * 完成分类的添加
	 */
	function insert(){
		//设置验证规则
		$this->form_validation->set_rules('propduct_name','商品名称','trim|required');
		if ($this->form_validation->run() == false) {
			//未通过验证
			$title = "未通过表单验证";
			$content = validation_errors();
			$target_url = site_url("propduct/add");;
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			#上传参数配置
			$config['upload_path'] = './upload/propductlogo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1024';
			$this->load->library('upload', $config);
			//处理图片上传
			if ($this->upload->do_upload('logo')) {
				# 上传成功，获取文件名
				$fileinfo = $this->upload->data();//返回上传文件相关信息
				$data['logo'] = $fileinfo['file_name'];//已上传的文件名
				//获取表单提交数据
				$data['propduct_name'] = $this->input->post('propduct_name');
				$data['url'] = $this->input->post('url');
				$data['propduct_desc'] = $this->input->post('propduct_desc');
				$data['sort_order'] = $this->input->post('sort_order');
				$data['is_show'] = $this->input->post('is_show');
				//var_dump($data);
				if($this->propduct_model->add_propduct($data)){
					$title = "商品添加成功";
					$content = "商品添加成功！即将自动进入商品列表中心.....";
					$target_url = site_url("propduct/index");
					message($title, $content, $target_url, $delay_time = 3);
				} else {
					$title = "商品添加失败";
					$content = "抱歉~，您输入的内容有误或不完整！即将自动返回商品添加页面.....";
					$target_url = site_url("propduct/add");;
					message($title, $content, $target_url, $delay_time = 3);
				}
			} else {
				$title = "上传失败";
				$content = $this->upload->display_errors();
				$target_url = site_url("propduct/add");;
				message($title, $content, $target_url, $delay_time = 5);
			}
	    }
	}
	
	//显示编辑表单
	public function edit($propduct_id){
		//获取当前这条记录的信息
		$data['current_propduct'] = $this->propduct_model->select_propduct($propduct_id);
		var_dump($data['current_propduct']);
		$this->load->view('propduct_edit', $data);
	}
	
	/*
	 * 更新数据
	 */
	function update(){
		$propduct_id = $this->input->post('propduct_id');
		/* if ($this->uri->segment(3) === FALSE) {
			echo "获取参数ID出错了~"; exit();
		} else {
			$propduct_id = $this->uri->segment(3);
		} */
			//更新操作
			$this->form_validation->set_rules('propduct_name','分类名称','trim|required');
			if ($this->form_validation->run() == false) {
				//未通过表单验证
				$title = "未通过表单验证";
				$content = validation_errors();
				$target_url = site_url("propduct/edit");;
				message($title, $content, $target_url, $delay_time = 3);
			} else {
			    #上传参数配置
				$config['upload_path'] = './upload/propductlogo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '1024';
				$this->load->library('upload', $config);
				//处理图片上传
				if ($this->upload->do_upload('logo')) {
				# 上传成功，获取文件名
				$fileinfo = $this->upload->data();//返回上传文件相关信息
				$data['logo'] = $fileinfo['file_name'];//已上传的文件名
				//获取表单提交数据
				$data['propduct_name'] = $this->input->post('propduct_name');
				$data['url'] = $this->input->post('url');
				$data['propduct_desc'] = $this->input->post('propduct_desc');
				$data['sort_order'] = $this->input->post('sort_order');
				$data['is_show'] = $this->input->post('is_show');
				if($this->propduct_model->update_propduct($data,$propduct_id))
				{
					$title = "";
					$content = "商品修改成功！即将自动进入商品列表中心.....";
					$target_url = site_url("propduct/index");
					message($title, $content, $target_url, $delay_time = 20);
				} else {
					$title = "";
					$content = "商品分类失败！即将自动进入商品列表中心.....";
					$target_url = site_url("propduct/index");
					message($title, $content, $target_url, $delay_time = 2);
				}
			} else {
				$title = "上传失败";
				$content = $this->upload->display_errors();
				$target_url = site_url("propduct/add");;
				message($title, $content, $target_url, $delay_time = 5);
			}
		}
	}
	
	/*
	 * 删除记录
	 */
	function delete(){
			$propduct_id = $this->uri->segment(3);
			if ($this->propduct_model->delete_propduct($propduct_id)){
				$title = "商品删除成功";
				$content = "商品删除成功！即将自动进入商品列表中心.....";
				$target_url = site_url("propduct/index");
				message($title, $content, $target_url, $delay_time = 2);
			} else {
				$title = "商品删除失败";
				$content = "商品删除失败！即将自动进入商品列表中心.....";
				$target_url = site_url("propduct/index");
				message($title, $content, $target_url, $delay_time = 2);
			}
		
	}
	
}