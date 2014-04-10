<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Article_model extends CI_Model{

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
		function add_article($data){
			//使用AR类完成插入操作
			return $this->db->insert('article',$data);//表名无需加前缀
		}
		
		function select_article($id){
			$this->db->select('title, author, content');
			$query = $this->db->get_where('article', array('id' => $id) );
			//echo $this->db->last_query();
			return $query->row_array();
		}
		
		function update_article($data){
			$id = $this->input->get('id', TRUE);
			$this->db->where('id', $id);
			return $this->db->update('article', $data);
		}
		/*
		 * @access  public
		 * @result 以array形式返回查询结果
		 */
		function article_list() {
			$query = $this->db->get('article');
			return $query->result_array();
		}
	}