<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 商品类型控制器
 * @Author 水木
 */
class Goods_type extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');//载入身份验证模型
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->library('form_validation');
		$this->load->helper('redirect'); //自定义的跳转辅助函数
		$this->load->model('goodstype_model');
		
	}

	public function index($offset = ''){
		$this->load->library('pagination');
		#配置分页信息
		$config['base_url'] = site_url('goods_type/index/');
		$config['total_rows'] = $this->goodstype_model->count_goodstype();
		$config['per_page'] = 2;
		$config['uri_segment'] = 3;
		#自定义分页链接
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';

		#初始化分页类
		$this->pagination->initialize($config);
		
		#生成分页信息
		$data['pageinfo'] = $this->pagination->create_links();

		$limit = $config['per_page'];
		$data['goodstypes'] = $this->goodstype_model->goodstype_list($limit,$offset); 
		$this->load->view('goods_type_list',$data);
	}

	public function add(){
		$this->load->view('goods_type_add');
	}

	public function edit(){
		$this->load->view('goods_type_edit');
	}

	#添加商品类型
	public function insert(){
		#设置验证规则
		$this->form_validation->set_rules('type_name','商品类型名称','required');

		if ($this->form_validation->run() == false) {
			# code...
			$data['message'] = validation_errors();
			$data['wait'] = 3;
			$data['url'] = site_url('goods_type/add');
			$this->load->view('message.html',$data);
		} else {
			# code...
			$data['type_name'] = $this->input->post('type_name',true);

			if ($this->goodstype_model->add_goodstype($data)) {
				$data['message'] = '添加商品类型成功';
				$data['wait'] = 3;
				$data['url'] = site_url('admin/goodstype/index');
				$this->load->view('message.html',$data);
			} else {
				# code...
				$data['message'] = '添加商品类型失败';
				$data['wait'] = 3;
				$data['url'] = site_url('admin/goodstype/add');
				$this->load->view('message.html',$data);
			}
			
		}
		
	}
}