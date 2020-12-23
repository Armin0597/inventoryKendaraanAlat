<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modelkendaraan extends CI_model{
    
    public function getAllJenisken(){
        $query = $this->db->get('jenis_ken');
        return $query->result();
    }

    public function tambahDataKendaraan($gambar){
        $id_jenis_ken = $this->input->post('id_jenis_ken');
        $data = array(
            "nama"          => $this->input->post('nama', TRUE),
            "gambar"        => $gambar
        );
        $this->db->insert('jenis_ken', $data);
    }

    public function ubahDataKendaraan($gambar){
        if($gambar==null){
            $id_jenis_ken = $this->input->post('id_jenis_ken');
            $data = array(
            "nama"          => $this->input->post('nama', TRUE));
        }else{
            $id_jenis_ken = $this->input->post('id_jenis_ken');
            $data = array(
            "nama"          => $this->input->post('nama', TRUE),
            "gambar"        => $gambar
            );
        }
        $id_jenis_ken = $this->input->post('id_jenis_ken');
        $this->db->where('id_jenis_ken',$id_jenis_ken);
        $this->db->update('jenis_ken',$data);
    }

    public function hapusDataKendaraan($id_jenis_ken){
        $this->db->delete('jenis_ken', ['id_jenis_ken' => $id_jenis_ken]);
    }

    // public function cari($berdasarkan,$yangdicari){
    //     $this->db->from("mingguan");

    //     switch ($berdasarkan) {
    //         case '':
    //             $this->db->like('minggu_ke',$yangdicari);
    //             $this->db->or_like('periode',$yangdicari);
    //             break;
            
    //         default:
    //             $this->db->like($berdasarkan,$yangdicari);
    //     }
    //     return $this->db->get();

    // }
}