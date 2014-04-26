<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Links_model extends CI_Model{

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
		function add_links($data){
			//使用AR类完成插入操作
			return $this->db->insert('links',$data);//表名无需加前缀
		}

		/*
		 * @access  public
		 * @result 以array形式返回查询结果
		 */
		function links_list() {
			$query = $this->db->get('links');
			return $query->result_array();
		}
	}