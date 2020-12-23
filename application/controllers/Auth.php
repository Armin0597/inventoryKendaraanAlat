<?php
class Auth extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Modeluser');
        $this->load->library('form_validation');
    }

    function index(){
        $this->load->view('auth/login');
    }

    function chek_login(){
        if (isset($_POST['submit'])) {
            // prosess login
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->Modeluser->chekLogin($username, $password);
            if (!empty($result)) {
                $this->session->set_userdata($result);
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('pesan', 'Username & Password tidak valid!!');
                redirect('auth');
             }
        }
    }


    function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}