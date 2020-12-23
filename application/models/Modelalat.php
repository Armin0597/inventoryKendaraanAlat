<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modelalat extends CI_model{
    
    public function getAllJenisalt(){
        $query = $this->db->get('jenis_alat');
        return $query->result();
    }

    public function tambahDataAlat(){
        $id_jenis_alt = $this->input->post('id_jenis_alt');
        $data = array(
            "nama"          => $this->input->post('nama', TRUE)
        );
        $this->db->insert('jenis_alat', $data);
    }

    public function ubahDataAlat($gambar){
        if($gambar==null){
            $id_jenis_alt = $this->input->post('id_jenis_alt');
            $data = array(
                "nama"          => $this->input->post('nama', TRUE)
            );
        }else{
            $id_jenis_alt = $this->input->post('id_jenis_alt');
            $data = array(
                "nama"          => $this->input->post('nama', TRUE),
                "gambar"        => $gambar
            );
        }
        
        $id_jenis_alt = $this->input->post('id_jenis_alt');
        $this->db->where('id_jenis_alt',$id_jenis_alt);
        $this->db->update('jenis_alat',$data);
    }

    public function hapusDataAlat($id_jenis_alt){
        $this->db->delete('jenis_alat', ['id_jenis_alt' => $id_jenis_alt]);
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