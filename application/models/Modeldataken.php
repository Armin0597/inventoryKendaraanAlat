<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modeldataken extends CI_model{
    
    public function getAllKendaraan(){
        $this->db->select(['a.nama','a.id_jenis_ken','a.gambar','a.id_jenis_ken','b.merk', 'b.id_kendaraan','b.plat_no','b.id_kendaraan','b.bln_pajak','b.id_kendaraan','b.thn_pembuatan','b.id_kendaraan','b.lokasi','b.status_ken','b.id_kendaraan']);
        $this->db->from('kendaraan b');
        $this->db->join('jenis_ken a', 'a.id_jenis_ken = b.id_jenis_ken', 'left');
        $this->db->order_by('merk', 'asc');
        $query = $this->db->get('');
        return $query->result();
    }

    public function getAllJenis(){
        return $this->db->get('jenis_ken');
    }

    public function tambahDataKendaraan($data){
        $this->db->insert('kendaraan', $data);
        return TRUE;
    }

    public function ubahDataKendaraan($data){
        $id_kendaraan       = $this->input->post('id_kendaraan');
        $this->db->where('id_kendaraan',$id_kendaraan);
        $this->db->update('kendaraan',$data);
    }

    public function hapusDataKendaraan($id_kendaraan){
        $this->db->delete('kendaraan', ['id_kendaraan' => $id_kendaraan]);
    }

    public function cari($berdasarkan,$yangdicari){
        $this->db->from("kendaraan");

        switch ($berdasarkan) {
            case '':
                $this->db->like('merk',$yangdicari);
                $this->db->or_like('thn_pembuatan',$yangdicari);
                break;
           
            default:
                $this->db->like($berdasarkan,$yangdicari);
        }
        return $this->db->get();

    }
}