<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Category_model extends CI_Model {
	public function __construct() {
		// 调用父类构造函数
		parent::__construct ();
		$this->load->database ();
	}
	
	/*
	 * @access public 
	 * @prama $pid 节点的父ID
	 * @result 返回该节点的所有后代节点
	 */
	function category_list($pid=0) {
		$query = $this->db->get ('category');
		$cates = $query->result_array();
		//对类别进行重组，并返回
		return $this->_tree($cates,$pid);
	}
	
	/*
	 * @access private
	 * @param $arr 要遍历的数组
	 * @param $pid 节点的上级pid, 默认为0
	 * @param $level 表示层级 默认为0
	 * @param array 排好序的所有后代节点
	 */
	private function _tree ($arr, $pid=0, $level=0) {
		static $tree = array();//用于保存重组的结果，注意使用静态变量
		foreach ($arr as $v) {
			if ($v['parent_id']==$pid) {
				//说明找到了以$pid为父节点的子节点,将其保存
				$v['level'] = $level;
				$tree[] = $v; 
				//然后以当前节点为父节点，继续找其后代节点
				$this->_tree($arr, $v['cat_id'], $level+1);
			}
		}
		return $tree; 	
	}
	
	/*
	 * @access public 
	 * @prama $data array 
	 * @return bool 成功返回true，失败返回false
	 */
	function add_category($data) {
		// 使用AR类完成插入操作
		return $this->db->insert ( 'category', $data ); // 表名无需加前缀
	}
	
	function select_category($id) {
		$this->db->select ( 'title, author, content' );
		$query = $this->db->get_where ( 'category', array (
				'id' => $id 
		) );
		// echo $this->db->last_query();
		return $query->row_array ();
	}
	
	function update_category($data) {
		$id = $this->input->get ( 'id', TRUE );
		$this->db->where ( 'id', $id );
		return $this->db->update ( 'category', $data );
	}
}