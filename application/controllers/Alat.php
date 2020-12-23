<?php

class Alat extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Modeldataalt');
        $this->load->library('form_validation');
    }
    public function index() {
        $data['alat'] = $this->Modeldataalt->getAllalat();
        $data['jenis_alat'] = $this->Modeldataalt->getAllJenis();
        $template = array(
            'judul_konten'=> 'Data Alat',
            'header' =>$this->load->view('template/header','', true),
            'sidebar' =>$this->load->view('template/sidebar','', true),
            'footer' =>$this->load->view('template/footer','',true),
            'konten' =>$this->load->view('Data_alat/dataAlat',$data, true),
        );
        $this->parser->parse('template/index', $template);
    }

    public function simpan()
        {   
           $jenis_alat        = $this->input->post('jenis_alat');  
           $merk              = $this->input->post('merk');
           $thn_pembuatan     = $this->input->post('thn_pembuatan');           
           $relasi = array(
               'id_jenis_alt'       =>$jenis_alat,
               'merk'               =>$merk,
               'thn_pembuatan'      =>$thn_pembuatan,
           );
           $data = array_merge($relasi);
           if ($this->Modeldataalt->tambahDataAlat($data) == TRUE)
            {
               $this->session->set_flashdata('flash', 'Ditambahkan');
		        redirect('alat');
            }else {
                $this->index();
            }
        }

        public function edit(){
            $jenis_alat        = $this->input->post('jenis_alat');  
            $merk              = $this->input->post('merk');
            $thn_pembuatan     = $this->input->post('thn_pembuatan');
            $relasi = array(
                'id_jenis_alt'       =>$jenis_alat,
                'merk'               =>$merk,
                'thn_pembuatan'      =>$thn_pembuatan
            );
           $data = array_merge($relasi);
           $this->Modeldataalt->ubahDataAlat($data) == TRUE;
           $this->session->set_flashdata('flash', 'Diubah');
            redirect('alat');
        }
        
        public function cari(){
            $data['cariberdasarkan']=$this->input->post("cariberdasarkan");
            $data['yangdicari']=$this->input->post("yangdicari");
    
            $data['alat']=$this->Modeldataalt->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
            $data['jumlah']=count($data["alat"]);
            $template = array(
                'judul_konten'=> 'Data Rencana',
                'header'      => $this->load->view('template/header','', true),
                'sidebar' => $this->load->view('template/sidebar','', true),
                'footer'      => $this->load->view('template/footer','', true),
                'konten'      => $this->load->view('Data_alat/dataAlat',$data, true),
            );
            $this->parser->parse('template/index', $template);
        }
   
    public function hapus($id_alat){
        $this->Modeldataalt->hapusDataAlat($id_alat);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('alat');
    }

    public function cetak(){
        $this->load->library('CFPDF');
        $pdf= new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,5,'PT.NEW CAKTI',0,1,'C');
        //table
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(1,10,'',0,1);
        $pdf->Cell(8,5,'No.',1,0,'C');
        $pdf->Cell(20,5,'Merk',1,0,'C');
        $pdf->Cell(20,5,'Jenis',1,0,'C');
        $pdf->Cell(50,5,'Tahun Pembuatan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $sql = "SELECT al.merk,jl.nama,al.thn_pembuatan
                FROM  alat as al,jenis_alat as jl 
                WHERE al.id_jenis_alt=jl.id_jenis_alt";
        $alat = $this->db->query($sql)->result();
        $no= 1;
        foreach($alat as $k){
        $pdf->Cell(8,5,$no,1,0,'C');
        $pdf->Cell(20,5,$k->merk,1,0,'C');
        $pdf->Cell(20,5,$k->nama,1,0,'C');
        $pdf->Cell(50,5,$k->thn_pembuatan,1,1,'C');
        $no++;
        }
        $pdf->Output();
    }
}