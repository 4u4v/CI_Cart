<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//商品类型模型
class Goodstype_model extends CI_Model{

	const TBL_GT = 'goods_type';

	public function add_goodstype($data){
		return $this->db->insert(self::TBL_GT,$data);
	}

	#获取分页数据
	public function goodstype_list($limit,$offset){
		$query = $this->db->limit($limit,$offset)->get(self::TBL_GT);
		return $query->result_array();
	}

	#统计商品类型的总数
	public function count_goodstype(){
		return $this->db->count_all(self::TBL_GT);
	}
}