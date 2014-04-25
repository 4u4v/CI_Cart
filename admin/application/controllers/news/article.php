<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Article extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		// CKeditor载入
		$this->load->library ( 'ckeditor' );
		$this->ckeditor->basePath = base_url () . 'ckeditor/';
		$this->ckeditor->returnOutput = true;		 
		// CKFinder载入
		$this->load->library ( 'ckfinder' );
		$this->ckfinder->basePath = base_url () . 'ckfinder/';		 
		// 让CKEditor和CKFinder结合起来
		$this->ckfinder->SetupCKEditorObject ( $this->ckeditor );
		
		//载入article_model，载入之后，可以使用$this->article_model来操作
		$this->load->model('news/article_model');
	}

	/*
	 * 文章中心默认列表首页
	 */
	public function index($offset = '')
	{
		$this->load->library('pagination');//载入分页类
		//配置分页信息
		$config['base_url'] = site_url('news/article/index/');//分页链接
		$config['total_rows'] = $this->article_model->count_article();
		$config['per_page'] = 3;//每页显示条数
		$config['uri_segment'] = 4;//URI的哪个部分包含页数
		//自定义分页链接样式
		$config['first_link']= '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		//初始化分页类
		$this->pagination->initialize($config);
		//生成分页信息
		$data['pageinfo'] = $this->pagination->create_links();
		
		$data['title'] = "文章中心列表";
		$limit = $config['per_page'];
		//调用article_list方法得到数据
		$data['article']=$this->article_model->article_list($limit, $offset);
		//加载到视图文件
		$this->load->view('news/article_list', $data);
	}
	
	function add() {
		$this->db->select('id,cat_name');
		$query = $this->db->get('art_cat');
		//echo $this->db->last_query();
		$data['cat_list'] = $query->result_array();
		// 初始化编辑器
		$data ['ck'] = $this->ckeditor->editor ( 'content' );
		// 之后在试图view中，就直接可以 echo $ck; 就可以在页面中看到编辑器了。
		$this->load->view('news/add_article', $data);
	}
	
	/*
	 * 完成文章的添加
	 */
	function insert(){
		$data['title'] = $_POST['title'];
		$data['author'] = $_POST['author'];
		$data['cat_id'] = $_POST['cat_list'];
		$data['content'] = $_POST['content'];
		$data['add_time'] = date("Y-m-d H:i:s");
		if($this->article_model->add_article($data)){
			$title = "文章添加成功";
			$content = "文章添加成功！即将自动进入文章列表中心.....";
			$target_url = site_url("news/article/index");
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "文章添加失败";
			$content = "抱歉~，您输入的内容有误或不完整！即将自动返回文章添加页面.....";
			$target_url = site_url("news/article/add");;
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
		$data['select_cat'] = $result['cat_name'];
		//获取文章分类
		$this->db->select('id,cat_name');
		$query = $this->db->get('art_cat');
		$data['cat_list'] = $query->result_array();
		// 初始化CK编辑器
		$data ['ck'] = $this->ckeditor->editor ( 'content' );
		$this->load->view('news/edit_article', $data);
		
	}

	/*
	 * 更新数据
	 */
	function update(){
		$data['title'] = $_POST['title'];
		$data['author'] = $_POST['author'];
		$data['cat_id'] = $_POST['select_cat'];
		$data['content'] = $_POST['content'];
		//print_r($data);
		if($this->article_model->update_article($data)){
			$title = "文章更新成功";
			$content = "文章更新成功！即将自动进入文章列表中心.....";
			$target_url = site_url("news/article/index");
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "文章更新失败";
			$content = "文章更新失败！即将自动进入文章列表中心.....";
			$target_url = site_url("news/article/index");
			message($title, $content, $target_url, $delay_time = 3);
		}
	}
	
	/*
	 * 删除文章
	 */
	function delete($id){
		$this->db->where('id', $id);
		$result = $this->db->delete('article');
		if ($result){
			$title = "文章删除成功";
			$content = "文章删除成功！即将自动进入文章列表中心.....";
			$target_url = site_url("news/article/index");
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "文章删除失败";
			$content = "文章删除失败！即将自动进入文章列表中心.....";
			$target_url = site_url("news/article/index");
			message($title, $content, $target_url, $delay_time = 3);
		}
	}
}