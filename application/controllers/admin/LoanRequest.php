<?php

class LoanRequest extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('LoanRequestModel', 'loanRequest');

        if($this->session->userdata('logged_in') !== true){
            redirect(base_url().'login');
        }

        $this->pageUrl = "admin/loan-request";
    }

    public function index(){

        $data['page_name'] = "pages/admin/loan-request/index";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "loan-request";

		$where = array('status'=>1);

        $data['loanRequest'] = $this->loanRequest->getAll($where);

        $this->load->view('pages/admin/main', $data);
    }
    

    public function edit($requestId){

        $data['page_name'] = "pages/admin/loan-request/edit";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "loan-request";

		$where = array('status'=>1, 'id'=>$requestId);

        $data['loanRequest'] = $this->loanRequest->getSingle($where);

        $this->load->view('pages/admin/main', $data);
    }
    

    public function updte($requestId){

        $request_status = $this->input->post('request_status');
        
        $remark = $this->input->post('remark');

        $where = array('id'=>$requestId);

        $updateData = [
                        'request_status'=>$request_status,
                        'remark'=>$remark,
                    ];

        $result = $this->loanRequest->update($where, $updateData);

        if ($result) {
            $this->session->set_flashdata('success_message', 'Loan Request Updated Successfully');
            redirect(base_url().$this->pageUrl);
        } else {
            $this->session->set_flashdata('error_message', 'Something went wrong');
            redirect(base_url().$this->pageUrl);
        }
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