<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 分类目录数据模型
 */
class Category_model extends CI_Model {
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
		$data = $this->db->get('category')->result_array();
		return  $data;
	}
}