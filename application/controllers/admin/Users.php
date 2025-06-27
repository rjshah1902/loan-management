<?php

class Users extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('UserModel', 'users');

        if($this->session->userdata('logged_in') !== true){
            redirect(base_url().'login');
        }

        $this->pageUrl = "admin/users";
    }

    public function index(){

        $data['page_name'] = "pages/admin/users/list";

        $data['page_title'] = "Manage Users";

        $data['current_page'] = "users";

		$where = array('status'=>1, 'user_type'=>'user');

        $data['users'] = $this->users->getAll($where);
        
        $this->load->view('pages/admin/main', $data);
    }
    

    public function delete($requestId){

        $where = array('id'=>$requestId);

        $result = $this->loanRequest->delete($where);

        if ($result) {
            $this->session->set_flashdata('success_message', 'Loan Request Deleted Successfully');
            redirect(base_url().$this->pageUrl);
        } else {
            $this->session->set_flashdata('error_message', 'Something went wrong');
            redirect(base_url().$this->pageUrl);
        }
    }
}