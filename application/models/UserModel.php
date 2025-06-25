<?php

class UserModel extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();

        $this->table = "users";
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

    public function login($where, $password)
    {
        $user = $this->db->where($where)->get($this->table)->row();

        if ($user && password_verify($password, $user->password)) {
           
            return $user;
        
        }

        return false;
    }

    public function totalUserCount($where){
    
        $result = $this->db->where($where)->get($this->table)->num_rows();
        
        return $result;
    }
}