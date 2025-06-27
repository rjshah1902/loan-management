<?php

class LoanTenureModel extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();

        $this->table = "loan_tenure";
    }

    public function save($data){
    
        $result = $this->db->insert($this->table, $data);
        
        return $result;
    }

    public function getAll($where){
    
        $result = $this->db->where($where)->get($this->table)->result();
        
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

    public function insertBatch($data){
    
        $result = $this->db->insert_batch($this->table, $data);
        
        return $result;
    }
}