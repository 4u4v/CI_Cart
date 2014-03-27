<?php 
/*
 * 注册模块
 * @author: 水木
 * 
 */
class register extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index() {
		$data = array();
		$data['title']="会员注册";
		
		$this->load->view('register', $data);
	}
}