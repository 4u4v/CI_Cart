<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 首页数据模型
 */
class Home_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
		
		/*
		 * @access  public
		 * @result 以array形式返回查询结果
		 */
		function article_list() {
			$this->db->order_by("add_time", "desc")->limit(10,0);//(链式方法)
			$query = $this->db->get('article');
			//echo $this->db->last_query();
			return $query->result_array();
		}
}