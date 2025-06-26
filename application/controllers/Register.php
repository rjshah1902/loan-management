<?php

class Register extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('UserModel', 'users');

        if($this->session->userdata('logged_in') === true){
            redirect(base_url().'dashboard');
        }
    }

    public function index(){

        $data['page_name'] = "user-auth/register";

        $data['page_title'] = "User Register";

        $data['current_page'] = "user-register";

        $this->load->view('main', $data);
    }

    public function register()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
       
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
       
        $this->form_validation->set_rules('contact', 'Contact', 'required|numeric|min_length[10]|max_length[15]');
       
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
       
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            
            $this->index();
        
        } else {
            
            $data = [
                'name'     => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'contact'  => $this->input->post('contact'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $insert = $this->users->save($data);

            if ($insert) {
                $this->session->set_flashdata('success_message', 'Registration successful. You can now log in.');
                redirect(base_url().'login');
            } else {
                $this->session->set_flashdata('error_message', 'Something went wrong...!');
                redirect(base_url().'register');
            }
        }
    }

}