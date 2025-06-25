<?php
require APPPATH . 'views/layout/head.php';

if($this->session->userdata('user_id')){
    require APPPATH . 'views/layout/header.php';
}

require APPPATH . 'views/'.$page_name.'.php';

if($this->session->userdata('user_id')){
    require APPPATH . 'views/layout/footer.php';
}

require APPPATH . 'views/layout/js.php';
?>