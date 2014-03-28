<?php
class User_model extends CI_Model {

	var $user_name="";
	var $password = "";
	var $email = "";

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function create_user() {

		$data = array(
				'user_name' => $user_name,
				'password' => md5($password),
				'email' => $email
				);

		$this->db->insert('user', $data); 
		
	}
}
