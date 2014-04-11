<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 登录、注册模型
 */
class User_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database(); //载入数据库连接配置
	}
	
	/*
	 * 添加管理员数据
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
		return $this->db->insert('manager', $data); //快捷插入方式
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
		$query = $this->db->get_where('manager', array('administrator' => $user_name, 'password' => $password));
		//var_dump($query->num_rows());
		return  $query->num_rows(); //返回查询结果行数
	}
}