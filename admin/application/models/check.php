<?php
class Check extends CI_Model { 
   
    function __construct()
     {
         parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
		 //$this->load->model('sessions');
		 $this->load->helper('redirect');
		 
		 if($this->session->userdata('manager')=="")
		 {
		 	$title = "身份验证失败";
			$content = "抱歉~，后台身份验证失败！即将自动返回登录入口.....";
			$target_url = site_url("login");
			message($title, $content, $target_url, $delay_time=3);
		 }
		 //$this->session->all_userdata();
     }
}