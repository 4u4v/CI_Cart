<?php if (!defined('BASEPATH')) 
exit('No direct script access allowed');

/*
 * 单页编辑模块
 * @auth 水木工作室
 */
class Dy extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Check');
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		// CKeditor载入
		$this->load->library ('ckeditor');
		$this->ckeditor->basePath = base_url().'ckeditor/';
		$this->ckeditor->returnOutput = true;
		// CKFinder载入
		$this->load->library ('ckfinder');
		$this->ckfinder->basePath = base_url().'ckfinder/';
		// 让CKEditor和CKFinder结合起来
		$this->ckfinder->SetupCKEditorObject($this->ckeditor);
	}
	/*
	 * 单页内容列表
	 */
	function index() {
		$temp['check'] = "wu";
		$temp['title'] = "";
		$temp['weizhi']= "";
		$temp['biaoshi'] = "";
		$this->db->order_by('weizhi', 'desc');
		$query = $this->db->get('dy');
		$temp['res'] = $query->result();
		// 初始化编辑器
		$temp['ck'] = $this->ckeditor->editor('content');
		$this->load->view('other/dy', $temp);
	}
	
	/*
	 * 添加单页内容
	 */
	function add_dy() {
		$arr['title'] = $this->input->post('title');
		$arr['content'] = $this->input->post('content');
		$arr['weizhi'] = $this->input->post('weizhi');
		$arr['biaoshi'] = $this->input->post('biaoshi');
		$check = $this->input->post('check');
		if ($check == "wu") {
			$result = $this->db->insert('dy', $arr);
			if ($result) {
				$title = "单面内容添加成功";
				$content = "单面内容添加成功！即将自动进入单面内容列表中心.....";
				$target_url = site_url("dy/index");
				message($title, $content, $target_url, $delay_time = 3);
			} else {
				$title = "单面内容添加失败";
				$content = "单面内容添加失败！即将自动进入单面内容添加页面.....";
				$target_url = site_url("dy/add_dy");
				message($title, $content, $target_url, $delay_time = 3);
			}
		} 
		else {
			$where['id'] = $check;
			$res = $this->db->update('dy',$arr,$where);
			if ($res) {
				$title = "单面内容修改成功";
				$content = "单面内容修改成功！即将自动进入单面内容列表中心.....";
				$target_url = site_url("dy/index");
				message($title, $content, $target_url, $delay_time = 3);
			} else {
				$title = "单面内容添加失败";
				$content = "单面内容添加失败！即将自动进入单面内容修改页面.....";
				$target_url = site_url("dy/add_dy");
				message($title, $content, $target_url, $delay_time = 3);
			}
		}
	}
	
	/*
	 * 修改单页内容
	 */
	function change_dy() {
		$where['id'] = $this->input->post('id');
		$query = $this->db->get_where('dy', $where);
		foreach ($query->result() as $key)
		{
			$temp['title'] = $key->title;
			$temp['weizhi'] = $key->weizhi;
			$temp['biaoshi'] = $key->biaoshi;
			$temp['ck']=$this->ckeditor->editor('content',$key->content);//将内容载入到编辑中
		}
		$temp['check'] = $this->input->post('id');
		$this->db->order_by('weizhi', 'desc');
		$query = $this->db->get('dy');
		$temp['res'] = $query->result();
		$this->load->view('other/dy', $temp);
	}
	
}