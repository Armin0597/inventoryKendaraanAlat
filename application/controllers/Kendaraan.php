<?php

class Kendaraan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Modeldataken');
        $this->load->library('form_validation');
    }
    public function index() {
        $data['kendaraan'] = $this->Modeldataken->getAllKendaraan();
        $data['jenis_ken'] = $this->Modeldataken->getAllJenis();
        $template = array(
            'judul_konten'=> 'Data Jenis Kendaraan',
            'header' =>$this->load->view('template/header','', true),
            'sidebar' =>$this->load->view('template/sidebar','', true),
            'footer' =>$this->load->view('template/footer','',true),
            'konten' =>$this->load->view('kendaraan/dataken',$data, true),
        );
        $this->parser->parse('template/index', $template);
    }

    public function cari(){
        $data['cariberdasarkan']=$this->input->post("cariberdasarkan");
        $data['yangdicari']=$this->input->post("yangdicari");

       $data['kendaraan']=$this->Modeldataken->cari($data['cariberdasarkan'],$data['yangdicari'])->result();
       $data['jumlah']= count($data["kendaraan"]);
       $template = array(
           'judul_konten'=> 'Data Kendaraan',
           'header' =>$this->load->view('template/header','', true),
           'sidebar' =>$this->load->view('template/sidebar','', true),
           'footer' =>$this->load->view('template/footer','',true),
           'konten' =>$this->load->view('kendaraan/dataken',$data, true),
       );
       $this->parser->parse('template/index', $template);
   }

    public function simpan()
        {   
           $jenis_ken         = $this->input->post('jenis_ken');  
           $merk              = $this->input->post('merk');
           $plat_no           = $this->input->post('plat_no');
           $bln_pajak         = $this->input->post('bln_pajak');
           $thn_pembuatan     = $this->input->post('thn_pembuatan');
           $lokasi            = $this->input->post('lokasi');
        
           
           $relasi = array(
               'id_jenis_ken'       =>$jenis_ken,
               'merk'               =>$merk,
               'plat_no'            =>$plat_no,
               'bln_pajak'          =>$bln_pajak,
               'thn_pembuatan'      =>$thn_pembuatan,
               'lokasi'             =>$lokasi
            
           );
           $data = array_merge($relasi);
           if ($this->Modeldataken->tambahDataKendaraan($data) == TRUE)
            {   
               $this->session->set_flashdata('flash', 'Ditambahkan');
		        redirect('kendaraan');
            }else {
                $this->index();
            }
        }

        public function edit(){
            $jenis_ken         = $this->input->post('jenis_ken');  
            $merk              = $this->input->post('merk');
            $plat_no           = $this->input->post('plat_no');
            $bln_pajak         = $this->input->post('bln_pajak');
            $thn_pembuatan     = $this->input->post('thn_pembuatan');
            $lokasi            = $this->input->post('lokasi');
            $relasi = array(
                'id_jenis_ken'       =>$jenis_ken,
                'merk'               =>$merk,
                'plat_no'            =>$plat_no,
                'bln_pajak'          =>$bln_pajak,
                'thn_pembuatan'      =>$thn_pembuatan,
                'lokasi'             =>$lokasi
    
            );
           $data = array_merge($relasi);
           $this->Modeldataken->ubahDataKendaraan($data) == TRUE;
           $this->session->set_flashdata('flash', 'Diubah');
            redirect('kendaraan');
        }
    

    public function hapus($id_kendaraan){
        $this->Modeldataken->hapusDataKendaraan($id_kendaraan);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kendaraan');
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
        $pdf->Cell(30,5,'Plat Nomor',1,0,'C');
        $pdf->Cell(20,5,'Jenis',1,0,'C');
        $pdf->Cell(40,5,'Bulan Pajak',1,0,'C');
        $pdf->Cell(50,5,'Tahun Pembuatan',1,0,'C');
        $pdf->Cell(20,5,'Lokasi',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $sql = "SELECT k.merk,k.plat_no,jk.nama,k.bln_pajak,k.thn_pembuatan,k.lokasi
                FROM kendaraan as k, jenis_ken as jk
                WHERE k.id_jenis_ken=jk.id_jenis_ken";
        $kendaraan = $this->db->query($sql)->result();
        $no= 1;
        foreach($kendaraan as $k){
            $pdf->Cell(8,5,$no,1,0,'C');
        $pdf->Cell(20,5,$k->merk,1,0,'C');
        $pdf->Cell(30,5,$k->plat_no,1,0,'C');
        $pdf->Cell(20,5,$k->nama,1,0,'C');
        $pdf->Cell(40,5,$k->bln_pajak,1,0,'C');
        $pdf->Cell(50,5,$k->thn_pembuatan,1,0,'C');
        $pdf->Cell(20,5,$k->lokasi,1,1,'C');
        $no++;
        }
        $pdf->Output();
    } 
}