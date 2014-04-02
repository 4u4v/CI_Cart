<?php 
/*
 * 产品分类目录
 * @author: 水木
 * 
 */
class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {

		$data = array();
		$data['title'] = "产品分类目录";
		
		$this->load->view('category/list',$data);

	}


}