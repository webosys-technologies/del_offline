<?php 

class Cities_model extends CI_Model
{
	var $table='cities';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
        function getall_cities($state)
        {
            $this->db->from($this->table);
            $this->db->where('stateID',$state);
            $query=$this->db->get();
            return $query->result();
        }      
        
        function query()
        {
            $data=array('city_state'=>'Maharashtra');
            $where=array('city_state'=>'Maharastra');
           $this->db->update($this->table,$data,$where);
        }
}

 ?>