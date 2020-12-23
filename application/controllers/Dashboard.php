<?php
defined('BASEPATH') OR exit('No direct cript access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
    } 
    public function index(){
        $template = array(
            'judul_konten' => 'Selamat Datang Admin',
            'header' =>$this->load->view('template/header','', true),
            'sidebar' =>$this->load->view('template/sidebar','', true),
            'footer' =>$this->load->view('template/footer','',true),
            'konten' =>$this->load->view('template/dashboard','', true),
        );
        $this->parser->parse('template/index', $template);
    }
}