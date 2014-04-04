<?php
class Check_model extends CI_Model { 
   
    function __construct()
     {
         parent::__construct();
		 $this->load->database();
		
		 //$this->load->model('sessions');

     }
}