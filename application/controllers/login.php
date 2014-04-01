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
	/*
	 * 登录默认页面
	 */
	public function index() {
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
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
		if($this->User_model->user_login()==TRUE) {
			echo "登录验证成功！";
			//redirect('user/index');
		} else {
			echo "登录验证失败！";
			//redirect('login/index');
		}
	}
}