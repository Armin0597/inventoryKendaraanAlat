<?php
class Trans_ken extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Modeltransken');
        $this->load->library('form_validation');
    }
    public function index() {
        $data['transaksi_ken'] = $this->Modeltransken->getAllTransken();
        $data['kendaraan'] = $this->Modeltransken->getAllKendaraan();
        $template = array(
            'judul_konten'=> 'Transaksi Kendaraan',
            'header' =>$this->load->view('template/header','', true),
            'sidebar' =>$this->load->view('template/sidebar','', true),
            'footer' =>$this->load->view('template/footer','',true),
            'konten' =>$this->load->view('transken/list',$data, true),
        );
        $this->parser->parse('template/index', $template);
    }

//     public function cari(){
//         $data['cariberdasarkan']=$this->input->post("cariberdasarkan");
//         $data['yangdicari']=$this->input->post("yangdicari");

//        $data['kendaraan']=$this->Modeldataken->cari($data['cariberdasarkan'],$data['yangdicari'])->result();
//        $data['jumlah']= count($data["kendaraan"]);
//        $template = array(
//            'judul_konten'=> 'Data Kendaraan',
//            'header' =>$this->load->view('template/header','', true),
//            'sidebar' =>$this->load->view('template/sidebar','', true),
//            'footer' =>$this->load->view('template/footer','',true),
//            'konten' =>$this->load->view('kendaraan/dataken',$data, true),
//        );
//        $this->parser->parse('template/index', $template);
//    }

    public function simpan()
        {  
           $tgl_pencatatan      = date('Y-m-d H:i:s'); 
           $merk                = $this->input->post('merk');  
           $nama_peminjam       = $this->input->post('nama_peminjam');
           $no_telp             = $this->input->post('no_telp');
           $tgl_pinjam          = $this->input->post('tgl_pinjam');
           $tgl_kembali         = $this->input->post('tgl_kembali');
           $status_mobil         = $this->input->post('status_mobil');

           $relasi = array(
            'id_kendaraan'   =>$merk,
            'nama_peminjam'  =>$nama_peminjam,
            'no_telp'        =>$no_telp,
            'tgl_pinjam'     =>$tgl_pinjam,
            'tgl_kembali'    =>$tgl_kembali
            );
            $data = array_merge($relasi);
           
           if ($this->Modeltransken->tambahDataTrans($data) == TRUE)
            {
                //$this->changeStatusDriver('Tidak Tersedia');
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('trans_ken');            
            }else {
                $this->index();
            }
            $this->changeStatusDriver('Tidak Tersedia');
        }

        public function edit(){
            $merk               = $this->input->post('merk');  
            $nama_peminjam      = $this->input->post('nama_peminjam');
            $no_telp            = $this->input->post('no_telp');
            $tgl_pinjam         = $this->input->post('tgl_pinjam');
            $relasi = array(
                'id_kendaraan'   =>$merk,
                'nama_peminjam'  =>$nama_peminjam,
                'no_telp'        =>$no_telp,
                'tgl_pinjam'     =>$tgl_pinjam,
                'tgl_kembali'    =>$tgl_kembali
    
            );
           $data = array_merge($relasi);
           $this->Modeltransken->ubahDataTrans($data) == TRUE;
           $this->session->set_flashdata('flash', 'Diubah');
            redirect('trans_ken');
        }
    
        function changeStatusDriver($status) {
            // update kendaraan setatus jadi bebas
            $this->db->where('id_kendaraan', $this->input->post('merk', TRUE));
            $this->db->update('kendaraan', array('status_ken' => $status));
        }

        function hitungHari($mulai, $selesai) {
            $now = strtotime($mulai);
            $selesai = strtotime($selesai);
            $datediff = $now - $selesai;
            $result = floor($datediff / (60 * 60 * 24));
            return $result;
        }

        public function selesai($id) {
            

        }

    // public function cetak(){
    //     $this->load->library('CFPDF');
    //     $pdf= new FPDF('P','mm','A4');
    //     $pdf->AddPage();
    //     $pdf->SetFont('Arial','B',14);
    //     $pdf->Cell(190,5,'PT.NEW CAKTI',0,1,'C');
    //     //table
    //     $pdf->SetFont('Arial','B',11);
    //     $pdf->Cell(1,10,'',0,1);
    //     $pdf->Cell(8,5,'No.',1,0,'C');
    //     $pdf->Cell(20,5,'Merk',1,0,'C');
    //     $pdf->Cell(30,5,'Plat Nomor',1,0,'C');
    //     $pdf->Cell(20,5,'Jenis',1,0,'C');
    //     $pdf->Cell(40,5,'Bulan Pajak',1,0,'C');
    //     $pdf->Cell(50,5,'Tahun Pembuatan',1,0,'C');
    //     $pdf->Cell(20,5,'Lokasi',1,1,'C');
    //     $pdf->SetFont('Arial','',10);
    //     $sql = "SELECT k.merk,k.plat_no,jk.nama,k.bln_pajak,k.thn_pembuatan,k.lokasi
    //             FROM kendaraan as k, jenis_ken as jk
    //             WHERE k.id_jenis_ken=jk.id_jenis_ken";
    //     $kendaraan = $this->db->query($sql)->result();
    //     $no= 1;
    //     foreach($kendaraan as $k){
    //         $pdf->Cell(8,5,$no,1,0,'C');
    //     $pdf->Cell(20,5,$k->merk,1,0,'C');
    //     $pdf->Cell(30,5,$k->plat_no,1,0,'C');
    //     $pdf->Cell(20,5,$k->nama,1,0,'C');
    //     $pdf->Cell(40,5,$k->bln_pajak,1,0,'C');
    //     $pdf->Cell(50,5,$k->thn_pembuatan,1,0,'C');
    //     $pdf->Cell(20,5,$k->lokasi,1,1,'C');
    //     $no++;
    //     }
    //     $pdf->Output();
    //} 
}