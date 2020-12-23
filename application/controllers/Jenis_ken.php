<?php

class Jenis_ken extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Modelkendaraan');
        $this->load->library('form_validation');
    }
    public function index() {
        $data['jenis_ken'] = $this->Modelkendaraan->getAllJenisken();
        $template = array(
            'judul_konten'=> 'Data Jenis Kendaraan',
            'header' =>$this->load->view('template/header','', true),
            'sidebar' =>$this->load->view('template/sidebar','', true),
            'footer' =>$this->load->view('template/footer','',true),
            'konten' =>$this->load->view('jenis_ken/list',$data, true),
        );
        $this->parser->parse('template/index', $template);
    }

    // public function cari(){
    //     $data['cariberdasarkan']=$this->input->post("cariberdasarkan");
    //     $data['yangdicari']=$this->input->post("yangdicari");

    //     $data['mingguan']=$this->Modelminggu->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
    //     $data['jumlah']=count($data["mingguan"]);
    //     $template = array(
    //         'judul_konten'=> 'Data Minggu-ke',
    //         'header'      => $this->load->view('templates/header','', true),
    //         'menusidebar' => $this->load->view('templates/sidebar','', true),
    //         'footer'      => $this->load->view('templates/footer','', true),
    //         'konten'      => $this->load->view('mingguan/list',$data, true),
    //     );
    //     $this->parser->parse('templates/index', $template);
    // }

    public function simpan(){
        $config['upload_path']='./gambar_product/';
        $config['allowed_types']='jpg|png';
        $this->load->library('upload',$config);
        $this->upload->do_upload();
        $data= $this->upload->data(); 
        $this->Modelkendaraan->tambahDataKendaraan($data['file_name']);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('jenis_ken');  
    }

    public function edit(){
        $config['upload_path']='./gambar_product/';
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        $this->upload->do_upload();
        $data= $this->upload->data();
		$this->Modelkendaraan->ubahDataKendaraan($data['file_name']);
        $this->session->set_flashdata('flash', 'Diubah');
		redirect('jenis_ken');
	}

    public function hapus($id_jenis_ken){
        $this->Modelkendaraan->hapusDataKendaraan($id_jenis_ken);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('jenis_ken');
    }
}