<?php 
/*
 * 会员中心模块
 * @author: 水木
 * 
 */
class User extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {

		$data = array();
		$data['title'] = "会员中心";

		$this->load->view('user', $data);
	}


}