<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 友情链接控制器
 * @Author 水木工作室
 */
class Friend_links extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');//载入身份验证模型
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->library('form_validation');
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		$this->load->model('links_model');
	}

	/*
	 * 
	 */
	public function index(){
		$data['title'] = "友情链接列表";
		//调用模型中links_list方法得到数据
		$data['links']=$this->links_model->links_list();
		//加载到视图文件
		$this->load->view('other/friend_links', $data);
	}

	/*
	 * 完成链接的添加
	 */
	function insert(){
		$data['name'] = $this->input->post('name');
		$data['url'] = $this->input->post('url');
		$data['weizhi'] = $this->input->post('weizhi');
		$data['logo'] = $this->input->post('logo');
		if($this->links_model->add_links($data)){
			$title = "链接添加成功";
			$content = "链接添加成功！即将自动进入链接列表中心.....";
			$target_url = site_url("friend_links/index");
			message($title, $content, $target_url, $delay_time = 3);
		} else {
			$title = "链接添加失败";
			$content = "抱歉~，您输入的内容有误或不完整！即将自动返回链接添加页面.....";
			$target_url = site_url("friend_links/add");;
			message($title, $content, $target_url, $delay_time = 3);
		}
	}

	/*
	 * 更新链接
	 */
	function update() {
		$where['id']=$this->input->post('id');
		$arr['name']=$this->input->post('name');
		$arr['url']=$this->input->post('url');
		$arr['weizhi']=$this->input->post('weizhi');
		$arr['logo'] = $this->input->post('logo');
		$result=$this->db->update('links', $arr, $where);
		if($result)
		{
			$title = "链接修改成功！";
			$content = "链接修改成功！即将自动进入链接列表中心.....";
			$target_url = site_url("friend_links/index");
			message($title, $content, $target_url, $delay_time = 2);
		}
		else
		{
			$title = "修改链接失败！";
			$content = "修改链接失败！即将自动进入链接列表中心.....";
			$target_url = site_url("friend_links/index");
			message($title, $content, $target_url, $delay_time = 2);
		}
	}

	/*
	 * 删除记录
	 */
	function delete($id){
		$this->db->where('id', $id);
		$result = $this->db->delete('links');
		if ($result){
			$title = "链接删除成功";
			$content = "链接删除成功！即将自动进入链接列表中心.....";
			$target_url = site_url("friend_links/index");
			message($title, $content, $target_url, $delay_time = 2);
		} else {
			$title = "链接删除失败";
			$content = "链接删除失败！即将自动进入链接列表中心.....";
			$target_url = site_url("friend_links/index");
			message($title, $content, $target_url, $delay_time = 2);
		}
	}
	
}