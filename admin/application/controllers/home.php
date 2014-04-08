<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Check_model');
	}

	/*
	 * 后台默认首页
	 */
	public function index()
	{
		$date['title'] = "后台管理中心";
		$this->load->view('home', $date);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */