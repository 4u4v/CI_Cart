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
			'img_path' => 'images/captcha/',
			'img_url' => base_url().'images/captcha/',
			'img_width' => 150,
			'img_height' => 30,
			'expiration' => 600
		);
		$cap = create_captcha($vals);
		$data['captcha_code'] = $cap['image'];

		//表单验证
		if ($this->form_validation->run() == FALSE){
		$this->load->view('login', $data);
		} else {
			$this->load->view('formsuccess');
		}
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
		$get_captcha = $this->input->post('captcha');
		if ($_SESSION['captcha'] == $get_captcha){
			if ($get_captcha == $cap['word']) {
				echo 'cap[word]';
			} elseif ($get_captcha == $_SESSION['captcha']){
				echo '_SESSION[captcha]';
			}
		}else{
			echo "验证码是".$_SESSION['captcha']." 不对哦~";
			//redirect('login/verifier');
		}
		return;
	}
	
	/*
	 * 保存登录信息
	 */
	function check_login() {
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');	
		
		$this->load->model('User_model');
		if($this->User_model->user_login()===TRUE) {
			$title = "登录验证成功";
			$content = "恭喜您，登录验证成功！即将自动进入用户中心.....";
			$target_url = site_url("user/index");;
			message($title, $content, $target_url, $delay_time = 3);
			//redirect('user/index', 'refresh');
		} else {
			//redirect('login/index', 'refresh');
			$title = "登录验证失败";
			$content = "抱歉~，您输入的登录信息不对！即将自动返回登录界面.....";
			$target_url = site_url("login/index");;
			message($title, $content, $target_url, $delay_time = 3);
		}
	}
}