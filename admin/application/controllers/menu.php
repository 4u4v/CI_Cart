<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Menu extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Check');//载入身份验证模型
	}
	
	/*
	 * 后台顶部导航
	 */
	function top () {
		//$data['username']=$this->session->userdata('manager');
		$this->load->view('top');
	}
	
	function main()
	{
		$this->load->view('main');
	}
	
	function left()
	{
		$this->load->view('menu/menu');
	}
	function content()
	{
		$this->load->view('menu/content');
	}
	function qita()
	{
		$this->load->view('menu/qita');
	}
	
}
