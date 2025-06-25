<?php

class LoanRequestModel extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();

        $this->table = "loan_request";

        $this->userTable = "users";
    }

    public function save($data){
    
        $result = $this->db->insert($this->table, $data);
        
        return $result;
    }

    public function getAll($where){
    
        $this->db->select($this->table.'.*, users.name, users.email, users.contact');
        $this->db->from('loan_request');
        $this->db->join($this->userTable, $this->userTable.'.id = '.$this->table.'.user_id');

        $result = $this->db->get()->result();
        
        return $result;
    }
    

    public function getSingle($where){
    
        $result = $this->db->where($where)->get($this->table)->row();
        
        return $result;
    }

    public function update($where, $data){
    
        $result = $this->db->where($where)->update($this->table, $data);
        
        return $result;
    }

    public function delete($where){
    
        $result = $this->db->where($where)->delete($this->table);
        
        return $result;
    }

    public function totalCounts($where){
    
        $result = $this->db->where($where)->get($this->table)->num_rows();
        
        return $result;
    }
}