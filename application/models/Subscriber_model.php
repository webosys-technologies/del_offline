<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriber_model extends CI_Model
{
	var $table='subscriber';

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}
        
        
        function getall($where,$row)
        {
            $this->db->from($this->table);            
            
            if(isset($where))
            {
               $this->db->where($where); 
            }
            $query=$this->db->get();
            
            if(isset($row))
            {
             return $query->row();   
            }
            else
            {
            return $query->result();
            }
            
        }
        
        function insert_data($data)
        {
            $this->db->insert($this->table,$data);
            return $this->db->insert_id();
        }
        
        function member_delete($where)
        {
            $this->db->delete($this->table,$where);
            return $this->db->affected_rows();
        }
}