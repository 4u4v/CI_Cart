<?php
/*
 * 分类目录数据模型
 */
class Category_Model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
		
	/**
	 * 获取分类数据
	 * @ return array
	 */
	public function get_category()
	{
		$data = $this->db->where('pid', 0)->get('category')->result_array();
		return  $data;
	}
}