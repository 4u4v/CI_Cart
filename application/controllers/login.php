<?php 
/*
 * 登录模块
 * @author: 水木
 * 
 */
class login extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index() {
		$data = array();
		$data['title']="会员登录";
		
		$this->load->view('login', $data);
	}
}