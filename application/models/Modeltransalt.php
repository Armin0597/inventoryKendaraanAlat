<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modeltransalt extends CI_model{
    
    public function getAllTransalt(){
        $this->db->select(['a.merk','a.id_alat','b.nama_peminjam', 'b.id_trans_alt','b.no_telp','b.id_trans_alt','b.tgl_pinjam','b.id_trans_alt','b.tgl_kembali','b.id_trans_alt','b.transaksi_status','b.id_trans_alt']);
        $this->db->from('transaksi_alt b');
        $this->db->join('alat a', 'a.id_alat = b.id_alat', 'left');
        $this->db->order_by('merk', 'asc');
        $query = $this->db->get('');
        return $query->result();
    }

    public function getAllAlat(){
        return $this->db->get('alat');
    }

    public function tambahDataTrans($data){
        $this->db->insert('transaksi_alt', $data);
        return TRUE;
    }
    
    function insert_data($data,$table){
        $this->db->insert($table,$data);
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function edit_data($where,$table){
		return $this->db->get_where($table,$where);
    }
     
    public function ubahDataTrans($data){
        $id_trans_ken       = $this->input->post('id_trans_alt');
        $this->db->where('id_trans_alt',$id_trans_ken);
        $this->db->update('transaksi_alt',$data);
    }

    public function hapusData($id_trans_alt){
        $this->db->delete('transaksi_alt', ['id_trans_alt' => $id_trans_alt]);
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