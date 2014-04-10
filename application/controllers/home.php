<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); //调用父类构造函数(防止子类覆盖父类)
	}
	
	/*
	 * 默认网站首页
	 */
	public function index()
	{
		$data=array();
		$data['title']="网站标题";
		
		$data['body'] = "<p>Body内容。。。</p>";
		
		$this->load->model('home_model');
		//调用article_list方法得到数据
		$data['article']=$this->home_model->article_list();
		//加载到视图文件
		
		$this->load->view('home', $data);
		
		//$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */