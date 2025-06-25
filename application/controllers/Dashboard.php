<?php

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){

        if($this->session->userdata('logged_in') === true){
         
            if($this->session->userdata('user_type') === 'admin'){
         
                redirect(base_url().'admin/dashboard');
         
            }else{
         
                redirect(base_url().'user/dashboard');
         
            }
        }
    }
    
    public function logout(){

        $this->session->sess_destroy();

        redirect(base_url().'login');
    }
}