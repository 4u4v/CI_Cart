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
		
		$this->load->view('register', $data);
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
	 * 保存登录信息
	*/
	function save() {
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		echo "用户名：".$user_name;
		
	}
	
}