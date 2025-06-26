<?php

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('UserModel', 'users');
    }

    public function index(){

        $data['page_name'] = "user-auth/login";

        $data['page_title'] = "User Login";

        $data['current_page'] = "user-login";

        $this->load->view('main', $data);
    }

    public function login(){
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            
            redirect(base_url());

        } else {
            
            $email = $this->input->post('email');
            
            $password = $this->input->post('password');

            $where = array('email'=>$email);

            $user = $this->users->login($where, $password);

            if ($user) {
                
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'user_contact' => $user->contact,
                    'user_type' => $user->user_type,
                    'logged_in' => true
                ]);
                
                redirect(base_url().'dashboard');

            } else {
                
                $this->session->set_flashdata('error_message', 'Please check your email & password');
                
                redirect(base_url().'login');

            }
        }
    }
}