<?php

class LoanRequest extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('LoanRequestModel', 'loanRequest');
        $this->load->model('LoanTenureModel', 'loanTenure');
        $this->load->library('user_agent');
        
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
    
    

    public function details(){

        $data['page_name'] = "pages/user/loan-request/details";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "request-list";

        $requestId = $this->input->get('request_id');

		$where = array('loan_request.status'=>1, 'loan_request.id'=>$requestId);

        $data['loanRequest'] = $this->loanRequest->getSingle($where);

		$where2 = array('status'=>1, 'loan_request_id'=>$requestId);

        $data['loanTenure'] = $this->loanTenure->getAll($where2);

        $this->load->view('pages/user/main', $data);
    }

    public function markAsPaid($tenureId)
    {
        $updateData = ['payment_status' => 'paid'];

        $where = ['id'=>$tenureId];
            
        $update = $this->loanTenure->update($where, $updateData);

        if ($update) {
            $this->session->set_flashdata('success_message', 'Payment marked as paid successfully.');
        } else {
            $this->session->set_flashdata('error_message', 'Failed to update payment status.');
        }

        redirect($this->agent->referrer());
    }
}