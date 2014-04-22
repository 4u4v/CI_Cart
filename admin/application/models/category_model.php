<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Category_model extends CI_Model{

		public function __construct(){
			//调用父类构造函数
			parent::__construct();
			$this->load->database();
		}
		
		/*
		 * @access public
		 * @prama $data array
		 * @return bool  成功返回true，失败返回false
		 */		
		function add_category($data){
			//使用AR类完成插入操作
			return $this->db->insert('category',$data);//表名无需加前缀
		}
		
		function select_category($id){
			$this->db->select('title, author, content');
			$query = $this->db->get_where('category', array('id' => $id) );
			//echo $this->db->last_query();
			return $query->row_array();
		}
		
		function update_category($data){
			$id = $this->input->get('id', TRUE);
			$this->db->where('id', $id);
			return $this->db->update('category', $data);
		}
		/*
		 * @access  public
		 * @result 以array形式返回查询结果
		 */
		function category_list() {
			$query = $this->db->get('category');
			return $query->result_array();
		}
	}