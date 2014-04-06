<?php 

class Article extends CI_Controller {
	function __construct() {
		parent::__construct();
		#载入article_model，载入之后，可以使用$this->article_model来操作
		$this->load->model('article_model');
	}

	/*
	 * 文章中心默认首页
	 */
	public function index()
	{
		//调用article_list方法得到数据
		$data['article']=$this->article_model->article_list();
		//加载到视图文件
		$this->load->view('article_list', $data);
	}
	
	/*
	 * 添加文章表单
	 */
	function add() {
		$this->load->view('add_article');
	}
	
	/*
	 * 完成文章的添加
	 */
	function insert(){
		$data['title'] = $_POST['title'];
		$data['author'] = $_POST['author'];
		$data['content'] = $_POST['content'];
		$data['add_time'] = time();
		if($this->article_model->add_article($data)){
			echo "插入成功！";
		} else {
			echo "操作失败！";
		}
	}
}