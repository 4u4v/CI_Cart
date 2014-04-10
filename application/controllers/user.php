<?php 
/*
 * 会员中心模块
 * @author: 水木
 * 
 */
class User extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('redirect');
		$this->load->model('User_model');
	}

	function index() {

		$data = array();
		$data['title'] = "会员中心";
		//先判断用户是否已登录
		//print_r($this->session->all_userdata());
		if ($this->User_model->check_login()=="1") {
			$this->load->view('user', $data);
		} else {
			$title = "未授权的访问";
			$content = "您还没有访问权限，请登录后再操作，谢谢合作...";
			$target_url = site_url("login");
			message($title, $content, $target_url, $delay_time = 5);
		}
		
	}

	/*
	 * 注销会话并退出
	 */
	function login_out() {
		$this->session->unset_userdata('user_data');
		if ($this->session->userdata('user_data')==FALSE){
		$title = "成功注销退出";
		$content = "您现已退出会员中心，即将自动转入网站首页.....";
		$target_url = site_url("home");
		message($title, $content, $target_url, $delay_time = 3);
		}
	}

}