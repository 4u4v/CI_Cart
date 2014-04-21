<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Check');
		$this->load->helper('redirect');
	}

	/*
	 * 后台默认首页
	 */
	public function index()
	{
		$date['title'] = "后台管理中心";
		$this->load->view('home', $date);
	}
	
	/*
	 * 注销会话,退出帐号
	 */
	function logout() {
		$this->session->unset_userdata('manager'); //删除 Session数据项
		if($this->session->userdata('manager')=="")
		{
			$title = "注销退出成功";
			$content = "您现已成功注销退出后台！即将跳转到登录入口.....";
			$target_url = site_url("login");
			message($title, $content, $target_url, $delay_time = 5);
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */