<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
/*
 * 品牌数据模型
 * @Author 水木
 */
class Product_model extends CI_Model {
	public function __construct() {
		// 调用父类构造函数
		parent::__construct ();
		$this->load->database ();
	}
	
	/*
	 * @access public
	 * @result 返回所有品牌信息
	 */
	function product_list() {
		$query = $this->db->get('product');
		return $query->result_array();
	}

	/*
	 * @access public 
	 * @prama $data array 
	 * @return bool 成功返回true，失败返回false
	 */
	function add_product($data) {
		// 使用AR类完成插入操作
		return $this->db->insert ( 'goods', $data ); // 表名无需加前缀
	}
	
	/*
	 * 获取某个品牌信息
	 */
	function select_product($product_id) {
		//$this->db->select ('product_id,product_name,product_desc,url,logo,sort_order,is_show');
		$query = $this->db->get_where ( 'product', array (
				'product_id' => $product_id 
		) );
		//echo $this->db->last_query();
		return $query->row_array ();
	}
	
	//更新品牌信息
	function update_product($data,$product_id){
		$condition['product_id'] = $product_id;
		return $this->db->where($condition)->update('product', $data);
	}
	
	//删除品牌
	function delete_product($product_id) {
		$condition['product_id'] = $product_id;
		$query = $this->db->where($condition)->delete('product');
		if ($query && $this->db->affected_rows() > 0)
		{
			return true;
		} else {
			return false;
		}
	}
}