<?php

class AdminDashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel', 'users');
        $this->load->model('LoanRequestModel', 'loanRequest');

        if($this->session->userdata('logged_in') !== true){
            redirect(base_url().'login');
        }
    }

    public function index(){

        $data['page_name'] = "pages/admin/home/dashboard";

        $data['page_title'] = "Admin Dashboard";

        $data['current_page'] = "admin-dashboard";

		$where = array('status'=>1, 'user_type'=>'user');

        $data['totalUserCount'] = $this->users->totalUserCount($where);

		$where = array('status'=>1);

        $data['totalLoanRequestCount'] = $this->loanRequest->totalCounts($where);

        $this->load->view('pages/admin/main', $data);
    }
    

    public function loanRequest(){

        $data['page_name'] = "pages/admin/loan-request/index";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "loan-request";

		$where = array('status'=>1);

        $data['loanRequest'] = $this->loanRequest->getAll($where);

        $this->load->view('pages/admin/main', $data);
    }
}