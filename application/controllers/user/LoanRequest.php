<?php

class LoanRequest extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('LoanRequestModel', 'loanRequest');

        if($this->session->userdata('logged_in') !== true){
            redirect(base_url().'login');
        }

        $this->pageUrl = "user/loan-request";
    }

    public function index(){

        $data['page_name'] = "pages/user/loan-request/index";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "loan-request";

		$where = array('loan_request.status'=>1);

        $data['loanRequest'] = $this->loanRequest->getAll($where);

        $this->load->view('pages/user/main', $data);
    }

    
    public function list(){

        $data['page_name'] = "pages/user/loan-request/list";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "request-list";

        $userId = $this->session->userdata('user_id');

		$where = array('loan_request.status'=>1, 'loan_request.user_id'=>$userId);

        $data['loanRequest'] = $this->loanRequest->getAll($where);

        $this->load->view('pages/user/main', $data);
    }

    
    public function applyForLoan(){
        
        $this->form_validation->set_rules('loan_amount', 'Loan Amount', 'required|numeric|greater_than_equal_to[10000]');

        $this->form_validation->set_rules('tenure', 'Loan Tenure', 'required|integer|greater_than_equal_to[12]|less_than_equal_to[72]');

        $this->form_validation->set_rules('purpose', 'Purpose', 'required|trim');


        if ($this->form_validation->run() === FALSE) {
            
            $this->index();

        } else {

            $userId = $this->session->userdata('user_id');
           
            $data = [
                'loan_amount' => $this->input->post('loan_amount'),
                'tenure'    => $this->input->post('tenure'),
                'purpose'  => $this->input->post('purpose'),
                'user_id'  => $userId,
            ];

            $insert = $this->loanRequest->save($data);

            if ($insert) {
                $this->session->set_flashdata('success_message', 'Loan Request submitted successfully');
                redirect(base_url().'user/loan-request');
            } else {
                $this->session->set_flashdata('error_message', 'Something went wrong...!');
                redirect(base_url().'user/loan-request');
            }
        }

    }
}