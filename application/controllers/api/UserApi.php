<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');

class UserApi extends REST_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel', 'users');
    }

	/* Get All Users List By use of this API */
    public function index_get()
    {
		$where = array('status'=>1, 'user_type'=>'user');

       	$data = $this->users->getAll($where);

       	if($data){
       		$res['status'] = true;
       		$res['message'] = 'Employee Fetched Successfully!';
       		$res['data'] = $data;
       	} else {
       		$res['status'] = false;
       		$res['message'] = 'Employee List is Empty';
       		$res['data'] = [];
       	}

       	$this->response($res, 200);
    }

}
?>