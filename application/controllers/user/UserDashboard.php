<?php

class UserDashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('LoanRequestModel', 'loanRequest');
        
        if($this->session->userdata('logged_in') !== true){
        
            redirect(base_url().'login');
        
        }
    }

    public function index(){

        $data['page_name'] = "pages/user/home/dashboard";

        $data['page_title'] = "User Dashboard";

        $data['current_page'] = "user-dashboard";

        $userId = $this->session->userdata('user_id');

		$where = array('status'=>1, 'user_id'=>$userId);

        $data['totalLoanRequestCount'] = $this->loanRequest->totalCounts($where);

        $this->load->view('pages/user/main', $data);
    }
}