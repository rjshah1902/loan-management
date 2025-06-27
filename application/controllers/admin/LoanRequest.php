<?php

class LoanRequest extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('LoanRequestModel', 'loanRequest');
        $this->load->model('LoanTenureModel', 'loanTenure');

        if($this->session->userdata('logged_in') !== true){
            redirect(base_url().'login');
        }

        $this->pageUrl = "admin/loan-request";
    }

    public function index(){

        $data['page_name'] = "pages/admin/loan-request/index";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "loan-request";

		$where = array('loan_request.status'=>1);

        $requestStatus = $this->input->get('request_status');

        if(isset($requestStatus)){
            $where += array('loan_request.request_status'=>$requestStatus);
        }

        $data['loanRequest'] = $this->loanRequest->getAll($where);
        
        $data['selectedStatus'] = $requestStatus;

        $this->load->view('pages/admin/main', $data);
    }
    

    public function edit($requestId){

        $data['page_name'] = "pages/admin/loan-request/edit";

        $data['page_title'] = "Manage Loan Request";

        $data['current_page'] = "loan-request";

		$where = array('loan_request.status'=>1, 'loan_request.id'=>$requestId);

        $data['loanRequest'] = $this->loanRequest->getSingle($where);

		$where2 = array('status'=>1, 'loan_request_id'=>$requestId);

        $data['loanTenure'] = $this->loanTenure->getAll($where2);

        $this->load->view('pages/admin/main', $data);
    }
    

    public function update($requestId) 
    {
        $where = array('loan_request.id' => $requestId);

        $requestStatus = $this->input->post('request_status');
        $interestRate = $this->input->post('interest');
        $remark = $this->input->post('remark');
        $loanStartDate = $this->input->post('loan_start');
        
        if($requestStatus == 'approved'){
            if (!isset($loanStartDate) || $loanStartDate == "") {
                $this->session->set_flashdata('error_message', 'Please Select Repayment Date');
                redirect(base_url()."admin/loan-request/edit/".$requestId);
            }
        }
        
        $updateData = [
            'request_status' => $requestStatus,
            'interest' => $interestRate,
            'remark' => $remark,
        ];

        $result = $this->loanRequest->update($where, $updateData);

        if ($result) {

            if($requestStatus == 'approved'){
            
                $loanRequest = $this->loanRequest->getSingle($where);

                $tenure = (int)$loanRequest->tenure;
                $loanAmount = (float)$loanRequest->loan_amount;
                $userId = $loanRequest->user_id;

                $monthlyInterestRate = ((float)$interestRate) / 100 / 12;
                $baseAmount = round($loanAmount / $tenure, 2);

                $tenureData = [];

                for ($i = 0; $i < $tenure; $i++) {
                    $paymentDate = date('Y-m-d', strtotime("+$i month", strtotime($loanStartDate)));
                    $interestAmount = round($loanAmount * $monthlyInterestRate, 2);
                    $totalAmount = round($baseAmount + $interestAmount, 2);

                    $tenureData[] = [
                        'user_id' => $userId,
                        'loan_request_id' => $requestId,
                        'payment_date' => $paymentDate,
                        'base_amount' => $baseAmount,
                        'interest_amount' => $interestAmount,
                        'total_amount' => $totalAmount,
                        'payment_status' => 'pending',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }

                if (!empty($tenureData)) {

                    $this->loanTenure->insertBatch($tenureData);
                
                }
            }

            $this->session->set_flashdata('success_message', 'Loan Request Updated Successfully');

        } else {
            
            $this->session->set_flashdata('error_message', 'Something went wrong');
        
        }

        redirect(base_url() . $this->pageUrl);
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