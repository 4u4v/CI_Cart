<?php 
/*
 * 注册模块
 * @author: 水木
 * 
 */
class Register extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->load->library('session');
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
	}
	public function index() {
		$this->load->library('form_validation'); //载入表单验证类
		$this->form_validation->set_rules('user_name', 'User_name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_pwd', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$data = array();
		$data['title']="会员注册";
		
		//生成验证码
		$this->load->helper('captcha');
		$vals = array(
			'word' => rand(100000, 999999),
			'img_path' => 'images/captcha/',
			'img_url' => base_url().'images/captcha/',
			'img_width' => 150,
			'img_height' => 30,
			'expiration' => 600
		);
		$cap = create_captcha($vals);
		$data['captcha_code'] = $cap['image'];
		$session_captcha = $cap['word'];

		//表单验证
		if ($this->form_validation->run() == FALSE){
		$this->load->view('register', $data);
		} else {
			$this->load->view('formsuccess');
		}
		
		//$this->output->enable_profiler(TRUE);
	}
	
	/*
	 * 验证码
	 */
	public function captcha() {
		$this->load->helper('captcha');
		$vals = array(
				//'word' => rand(10000, 99999),
				'img_path' => 'images/captcha/',
				'img_url' => base_url().'images/captcha/',
				//'font_path' => './path/to/fonts/texb.ttf',
				'img_width' => 150,
				'img_height' => 30,
				'expiration' => 600
		);
		$cap = create_captcha($vals);
		header('Content-type: image/jpeg');
		imagejpeg($cap);
		//imagedestroy($cap);
		//echo base_url().'images/captcha/'.$cap['time'].".jpg";
		//echo $cap['image'];
		//echo $cap['word'];
	}
	
	/*
	 * 核对验证码
	 */
	function check_captcha()
	{
		session_start();
		$post_captcha = $this->input->post('captcha');
		if ($post_captcha == $cap['word']){
			$right_captcha = TRUE;
		}else{
			$right_captcha = FALSE;
			$this->load->helper('redirect'); //自定义的跳转辅助函数
			$title = "校验验证码";
			$content = "验证码是".$_SESSION['captcha']." 不对哦~即将返回操作.....";
			$target_url = site_url("register/index");;
			message($title, $content, $target_url, $delay_time = 3);
		}
		return $right_captcha;
	}

	/*
	 * 保存注册信息
	*/
	public function save() {
		if ($this->check_captcha()) {
			$this->load->model('User_model');
			$this->User_model->create_user();
			echo "插入数据成功";
		} else {
			$title = "注册失败";
			$content = "抱歉~，您输入的注册信息不完整或者错误！即将自动返回注册页面.....";
			$target_url = site_url("register/index");;
			message($title, $content, $target_url, $delay_time = 5);
		}
	}
	
}