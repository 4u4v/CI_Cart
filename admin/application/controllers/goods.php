<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 商品管理
 * @Author 水木
 */
class Goods extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Check');//载入身份验证模型
		$this->load->helper(array('form', 'url'));//表单和URL辅助函数
		$this->load->library('form_validation');
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
		$this->load->model('goodstype_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
		$this->load->model('goods_model');
	}

	/*
	 * 默认分类列表首页
	 */
	public function index()
	{
		$data['title'] = "商品列表";
		//调用模型中goods_list方法得到数据
		$data['goods']=$this->goods_model->goods_list();
		//加载到视图文件
		$this->load->view('goods_list', $data);
	}
	
	// 显示添加表单
	public function add(){
		$data['title'] = "添加商品";
		//获取所有的商品类型信息
		$data['goodstypes'] = $this->goodstype_model->get_all_types();
		//获取分类信息
		$data['cates'] = $this->category_model->category_list();
		//获取品牌信息
		$data['brands'] = $this->brand_model->brand_list();
		// 初始化编辑器
		$data['ck'] = $this->ckeditor->editor('goods_desc');
		$this->load->view('add_goods', $data);
	}
	/*
	 * 完成分类的添加
	 */
	function insert(){
		//获取提交的数据
		$data['goods_desc'] = $this->input->post('goods_desc');
		$data['goods_name'] = $this->input->post('goods_name');
		$data['goods_sn'] = $this->input->post('goods_sn');
		$data['cat_id'] = $this->input->post('cat_id');
		$data['brand_id'] = $this->input->post('brand_id');
		$data['market_price'] = $this->input->post('market_price');
		$data['shop_price'] = $this->input->post('shop_price');
		$data['promote_price'] = $this->input->post('promote_price');
		$data['promote_start_time'] = strtotime($this->input->post('goods_name'));
		$data['promote_end_time'] = strtotime($this->input->post('goods_name'));
		$data['goods_number'] = $this->input->post('goods_number');
		$data['goods_brief'] = $this->input->post('goods_brief');
		$data['is_best'] = $this->input->post('is_best');
		$data['is_new'] = $this->input->post('is_new');
		$data['is_hot'] = $this->input->post('is_hot');
		$data['is_onsale'] = $this->input->post('is_onsale');

		//完成上传图片
		$config['upload_path'] = './upload/goods/';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size'] = 1024;
		$this->load->library('upload',$config);//载入文件上传类

		if ($this->upload->do_upload('goods_img')) {
			//上传成功，缩略处理
			$res = $this->upload->data(); //获取上传图片信息
			$data['goods_img'] = $res['file_name'];
			$config_img['source_image'] = "./upload/goods/" . $res['file_name'];
			$config_img['create_thumb'] = true;
			$config_img['maintain_ratio'] = true;
			$config_img['width'] = 160;
			$config_img['height'] = 160;

			//载入并初始化图像处理类
			$this->load->library('image_lib',$config_img);

			if ($this->image_lib->resize()) {
				// 缩略ok,得到缩略图的名称
				$data['goods_thumb'] = $res['raw_name'] . $this->image_lib->thumb_marker. $res['file_ext'];

				if ($this->goods_model->add_goods($data)) {
					// 添加商品成功,获取属性并插入到商品属性关联表中
					$attr_ids = $this->input->post('attr_id_list');
					$attr_values = $this->input->post('attr_value_list');
					foreach ($attr_values as $k => $v) {
						if (!empty($v)) {
							//$data2['goods_id'] = $goods_id;
							$data2['attr_id'] = $attr_ids[$k];
							$data2['attr_value'] = $v;
							//完成插入
							//$this->db->insert('goods_attr',$data2);
						}	
					}
					print_r($data);
					$title = "商品添加成功";
					$content = "商品添加成功！即将自动进入商品列表中心.....";
					$target_url = site_url("goods/index");
					message($title, $content, $target_url, $delay_time = 30);
				} else {
					# 失败
					$title = "商品添加失败";
					$content = "商品添加失败！即将自动进入商品列表中心.....";
					$target_url = site_url("goods/index");
					message($title, $content, $target_url, $delay_time = 30);
				}
				
			} else {
				# 缩略失败
				$title = "商品图缩略失败";
				$content = "商品图缩略失败！".$this->image_lib->display_errors();
				$target_url = site_url("goods/add");
				message($title, $content, $target_url, $delay_time = 50);
			}

		} else {
			# 上传失败
			$title = "产品图片上传失败";
			$content = "产品图片上传失败！".$this->upload->display_errors();
			$target_url = site_url("goods/add");
			message($title, $content, $target_url, $delay_time = 50);
		}
	}
	
	//显示编辑表单
	public function edit($goods_id){
		//获取当前这条记录的信息
		$data['current_goods'] = $this->goods_model->select_goods($goods_id);
		var_dump($data['current_goods']);
		$this->load->view('goods_edit', $data);
	}
	
	/*
	 * 更新数据
	 */
	function update(){
		$goods_id = $this->input->post('goods_id');
		/* if ($this->uri->segment(3) === FALSE) {
			echo "获取参数ID出错了~"; exit();
		} else {
			$goods_id = $this->uri->segment(3);
		} */
			//更新操作
			$this->form_validation->set_rules('goods_name','分类名称','trim|required');
			if ($this->form_validation->run() == false) {
				//未通过表单验证
				$title = "未通过表单验证";
				$content = validation_errors();
				$target_url = site_url("goods/edit");;
				message($title, $content, $target_url, $delay_time = 3);
			} else {
			    #上传参数配置
				$config['upload_path'] = './upload/goods/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '1024';
				$this->load->library('upload', $config);
				//处理图片上传
				if ($this->upload->do_upload('logo')) {
				# 上传成功，获取文件名
				$fileinfo = $this->upload->data();//返回上传文件相关信息
				$data['logo'] = $fileinfo['file_name'];//已上传的文件名
				//获取表单提交数据
				$data['goods_name'] = $this->input->post('goods_name');
				$data['url'] = $this->input->post('url');
				$data['goods_desc'] = $this->input->post('goods_desc');
				$data['sort_order'] = $this->input->post('sort_order');
				$data['is_show'] = $this->input->post('is_show');
				if($this->goods_model->update_goods($data,$goods_id))
				{
					$title = "";
					$content = "商品修改成功！即将自动进入商品列表中心.....";
					$target_url = site_url("goods/index");
					message($title, $content, $target_url, $delay_time = 20);
				} else {
					$title = "";
					$content = "商品分类失败！即将自动进入商品列表中心.....";
					$target_url = site_url("goods/index");
					message($title, $content, $target_url, $delay_time = 2);
				}
			} else {
				$title = "上传失败";
				$content = $this->upload->display_errors();
				$target_url = site_url("goods/add");;
				message($title, $content, $target_url, $delay_time = 5);
			}
		}
	}
	
	/*
	 * 删除记录
	 */
	function delete(){
			$goods_id = $this->uri->segment(3);
			if ($this->goods_model->delete_goods($goods_id)){
				$title = "商品删除成功";
				$content = "商品删除成功！即将自动进入商品列表中心.....";
				$target_url = site_url("goods/index");
				message($title, $content, $target_url, $delay_time = 2);
			} else {
				$title = "商品删除失败";
				$content = "商品删除失败！即将自动进入商品列表中心.....";
				$target_url = site_url("goods/index");
				message($title, $content, $target_url, $delay_time = 2);
			}
		
	}
	
}