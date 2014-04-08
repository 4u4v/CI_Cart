<?php 
/*
 * 登录模块
 * @author: 水木
 * 
 */
class login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		$this->load->database();
	}
	/*
	 * 登录默认页面
	 */
	public function index() {
		$this->load->library('form_validation'); //载入表单验证类
		$this->form_validation->set_rules('user_name', 'User_name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$data = array();
		$data['title']="会员登录";
		
			
		//生成验证码
		$this->load->helper('captcha');
		$vals = array(
			'word' => rand(100000, 999999),
			'img_path' => '../images/captcha/',
			'img_url' => front_url().'images/captcha/',
			'img_width' => 150,
			'img_height' => 30,
			'expiration' => 600
		);
		$cap = create_captcha($vals);
		$data['captcha_code'] = $cap['image'];
		$captcha_time = $cap['time'];
		$word = $cap['word'];
		$ip_address = $this->input->ip_address();
		//$this->load->model('User_model');
		//$this->User_model->insert_captcha();
		$sql = "INSERT INTO mc_captcha (captcha_time, ip_address, word) VALUES ($captcha_time, '$ip_address', '$word')";
		//echo $sql;
		$this->db->query($sql);

		//表单验证
		if ($this->form_validation->run() == FALSE){
		$this->load->view('login', $data);
		} else {
			$this->load->view('formsuccess');
		}
	}
	
	/*
	 * 保存登录信息
	 */
	function check_login() {
		// 首先删除旧的验证码
		$expiration = time()-600; // 1小时限制
		$this->db->query("DELETE FROM mc_captcha WHERE captcha_time < ".$expiration); 

		// 然后再看是否有验证码存在:
		$sql = "SELECT COUNT(*) AS count FROM mc_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count == 0)
		{
			$title = "校验验证码";
			$content = "请正确输入图像上显示的验证码！即将返回操作.....";
			$target_url = site_url("login/index");;
			message($title, $content, $target_url, $delay_time = 3);
		} else {

		$this->load->model('User_model');
		if($this->User_model->user_login()=="1") {
			$title = "登录验证成功";
			$content = "恭喜您，登录验证成功！即将自动进入用户中心.....";
			$target_url = site_url("main");;
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "登录验证失败";
			$content = "抱歉~，您输入的用户名或者密码不对！即将自动返回登录界面.....";
			$target_url = site_url("login/index");;
			message($title, $content, $target_url, $delay_time = 3);
		}
	   }
	}
}