<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Check');
		$this->load->helper('form');
		$this->load->helper('redirect'); //自定义的跳转辅助函数
	}

	/*
	 * 后台默认首页
	 */
	public function index()
	{
		$date['title'] = "后台管理中心";
		$this->load->view('home', $date);
	}
	
	function password()
	{
		$temp['info']="";
		$this->load->view('other/pass',$temp);
	}
	/*
	 * 修改密码
	*/
	function changpass()
	{
		$oldpass=$this->input->post('oldpass');
		$newpass=$this->input->post('newpass');
		$qrpass=$this->input->post('qrpass');
		if($qrpass != $newpass)
		{
			$temp['info']="新密码必须和确认密码一致!";
			$this->load->view('other/pass',$temp);
		}
		else
		{
			$where['password']=md5($oldpass);
			$query=$this->db->get_where('manager',$where);
			//echo $this->db->last_query();
			$count=$query->num_rows();
			if($count>0)
			{
				$where_name['administrator']=$this->session->userdata('manager');
				$arr['password']=md5($newpass);
				$res=$this->db->update('manager',$arr,$where_name);
				if($res)
				{
					//$this->message->showmessage('修改成功','main/password');exit();
					$title = "修改密码成功";
					$content = "恭喜您，修改密码成功！即将自动进入管理中心.....";
					$target_url = site_url("home");;
					message($title, $content, $target_url, $delay_time = 3);
				}
				else
				{
					//$this->message->showmessage('抱歉~，修改失败','main/password');exit();
					$title = "修改密码失败";
					$content = "抱歉~，您输入的用户名或者密码不对！即将自动返回上一页.....";
					$target_url = site_url("main/password");
				}
			}
			else
			{
				$temp['info']="旧密码输入错误";
				$this->load->view('other/pass',$temp);
			}
		}
	}
	
	/*
	 * 网站系统设置
	 */
	function sysconfig() {
		$date['title'] = "网站系统设置";
		$this->load->view('sysconfig', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */