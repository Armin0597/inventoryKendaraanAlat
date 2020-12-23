<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modeltransken extends CI_model{
    
    public function getAllTransken(){
        $this->db->select(['a.merk','a.id_kendaraan','b.nama_peminjam', 'b.id_trans_ken','b.no_telp','b.id_trans_ken','b.tgl_pinjam','b.id_trans_ken','b.tgl_kembali','b.id_trans_ken','b.transaksi_status','b.id_trans_ken']);
        $this->db->from('transaksi_ken b');
        $this->db->join('kendaraan a', 'a.id_kendaraan = b.id_kendaraan', 'left');
        $this->db->order_by('merk', 'asc');
        $query = $this->db->get('');
        return $query->result();
    }

    public function getAllKendaraan(){
        return $this->db->get('kendaraan');
    }

    public function tambahDataTrans($data){
        $this->db->insert('transaksi_ken', $data);
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
        $id_trans_ken       = $this->input->post('id_trans_ken');
        $this->db->where('id_trans_ken',$id_trans_ken);
        $this->db->update('transaksi_ken',$data);
    }

    public function hapusData($id_trans_ken){
        $this->db->delete('transaksi_ken', ['id_trans_ken' => $id_trans_ken]);
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