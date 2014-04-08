<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Menu extends CI_Controller {
	function __construct(){
		parent::__construct();
		
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
	function article()
	{
		$this->load->view('menu/article');
	}
	function qita()
	{
		$this->load->view('menu/qita');
	}
	
}
