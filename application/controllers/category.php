<?php 
/*
 * 产品分类目录
 * @author: 水木
 * 
 */
class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function index() {

		$data = array();
		$data['title'] = "产品分类目录";
		//获取分类数据
		$data['categories']=$this->Category_model->get_category();
		$this->load->view('category/list', $data);

	}


}