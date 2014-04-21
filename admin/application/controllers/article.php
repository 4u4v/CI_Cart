<?php 

class Article extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		#载入article_model，载入之后，可以使用$this->article_model来操作
		$this->load->model('article_model');
	}

	/*
	 * 文章中心默认列表首页
	 */
	public function index()
	{
		$data['title'] = "文章中心列表";
		//调用article_list方法得到数据
		$data['article']=$this->article_model->article_list();
		//加载到视图文件
		$this->load->view('article_list', $data);
	}
	
	function add() {
		//载入添加文章表单
		$this->load->view('add_article');
	}
	
	/*
	 * 完成文章的添加
	 */
	function insert(){
		$data['title'] = $_POST['title'];
		$data['author'] = $_POST['author'];
		$data['content'] = $_POST['content'];
		$data['add_time'] = date("Y-m-d H:i:s");
		if($this->article_model->add_article($data)){
			$title = "文章添加成功";
			$content = "文章添加成功！即将自动进入文章列表中心.....";
			$target_url = site_url("article/index");
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "文章添加失败";
			$content = "抱歉~，您输入的内容有误或不完整！即将自动返回文章添加页面.....";
			$target_url = site_url("article/add");;
			message($title, $content, $target_url, $delay_time = 3);
		}
	}
	

	/*
	 * 编辑文章
	*/
	function edit() {
		//载入编辑文章表单
		$data['id']= $id = $this->input->get('id', TRUE);
		$result=$this->article_model->select_article($id);
		//var_dump($result);
		$data['title'] = $result['title'];
		$data['author'] = $result['author'];
		$data['content'] = $result['content'];
		/* 
		foreach ($result as $row) {	
			$data['title']= $row['title'];
			$data['author'] = $row['author'];
			$data['content'] = $row['content'];
			//$data['add_time'] = $row['add_time'];
		} */
		$this->load->view('edit_article', $data);
		
	}

	/*
	 * 更新数据
	 */
	function update(){
		$data['title'] = $_POST['title'];
		$data['author'] = $_POST['author'];
		$data['content'] = $_POST['content'];
		print_r($data);
		if($this->article_model->update_article($data)){
			echo "更新成功！";
		} else {
			echo "更新失败！";
		}
	}
	
	function delete($id){
		$this->db->where('id', $id);
		$result = $this->db->delete('article');
		if ($result){
			$title = "文章删除成功";
			$content = "文章删除成功！即将自动进入文章列表中心.....";
			$target_url = site_url("article/index");
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "文章删除失败";
			$content = "文章删除失败！即将自动进入文章列表中心.....";
			$target_url = site_url("article/index");
			message($title, $content, $target_url, $delay_time = 3);
		}
	}
}