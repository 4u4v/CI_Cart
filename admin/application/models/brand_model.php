<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
/*
 * 品牌数据模型
 * @Author 水木
 */
class Brand_model extends CI_Model {
	public function __construct() {
		// 调用父类构造函数
		parent::__construct ();
		$this->load->database ();
	}
	
	/*
	 * @access public
	 * @result 返回所有品牌信息
	 */
	function brand_list() {
		$query = $this->db->get('brand');
		return $query->result_array();
	}

	/*
	 * @access public 
	 * @prama $data array 
	 * @return bool 成功返回true，失败返回false
	 */
	function add_brand($data) {
		// 使用AR类完成插入操作
		return $this->db->insert ( 'brand', $data ); // 表名无需加前缀
	}
	
	function select_brand($id) {
		$this->db->select ( 'title, author, content' );
		$query = $this->db->get_where ( 'brand', array (
				'id' => $id 
		) );
		// echo $this->db->last_query();
		return $query->row_array ();
	}
	
	//获取单条分类信息
	function get_cate($cat_id){
		//$condition['cat_id'] = $cat_id;
		$query = $this->db->where('cat_id',$cat_id)->get('brand');
		//返回单条记录
		return $query->row_array();
	}
	
	//更新分类信息
	function update_brand($data,$cat_id){
		$condition['cat_id'] = $cat_id;
		return $this->db->where($condition)->update('brand', $data);
	}
	
	//删除分类
	function delete_cate($cat_id) {
		$condition['cat_id'] = $cat_id;
		$query = $this->db->where($condition)->delete('brand');
		if ($query && $this->db->affected_rows() > 0)
		{
			return true;
		} else {
			return false;
		}
	}
}