<?php
/*
 * 登录、注册模型
 */
class User_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database(); //载入数据库连接配置
	}
	
	/*
	 * 用户注册数据
	 */
	function create_user() {
		$user_name = trim($this->input->post('user_name',TRUE));
		$password = $this->input->post('password',TRUE);
		$email = trim($this->input->post('email',TRUE));
		$data = array(
				'user_name' => $user_name,
				'password' => md5($password),
				'email' => $email
		);
		echo "用户名：".$user_name." 密码：".$password." Email：".$email;
		return $this->db->insert('user', $data); //快捷插入方式
	}

	/*
	* 保存验证码入库
	*/
	function insert_captcha() {
		$data = array(
	    'captcha_time' => $cap['time'],
	    'ip_address' => $this->input->ip_address(),
	    'word' => $cap['word']
	    );
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
	}
	
	/*
	 * 登录信息
	 */
	function user_login() {
		$user_name = trim($this->input->post('user_name',TRUE));
		$password = md5($this->input->post('password',TRUE));
		$sql = "SELECT COUNT(*) AS count FROM mc_user WHERE user_name='$user_name' AND password='$password'";
		echo $sql."<br>";
		$query = $this->db->query($sql);
		$row = $query->row();
		//var_dump($row->count);
		return $row->count;
	}
}