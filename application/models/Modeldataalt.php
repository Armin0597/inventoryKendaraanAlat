<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modeldataalt extends CI_model{
    
    public function getAllalat(){
        $this->db->select(['a.nama','a.id_jenis_alt','a.gambar','a.id_jenis_alt','b.merk', 'b.id_alat','b.thn_pembuatan','b.id_alat']);
        $this->db->from('alat b');
        $this->db->join('jenis_alat a', 'a.id_jenis_alt = b.id_jenis_alt', 'left');
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get('');
        return $query->result();
    }

    public function getAllJenis(){
        return $this->db->get('jenis_alat');
    }

    public function tambahDataAlat($data){
        $this->db->insert('alat', $data);
        return TRUE;
    }

    public function ubahDataAlat($data){
        $id_alat       = $this->input->post('id_alat');
        $this->db->where('id_alat',$id_alat);
        $this->db->update('alat',$data);
    }

    public function hapusDataAlat($id_alat){
        $this->db->delete('alat', ['id_alat' => $id_alat]);
    }

     public function cari($berdasarkan,$yangdicari){
        $this->db->from("alat");

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