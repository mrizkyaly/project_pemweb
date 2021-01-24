<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Transaksi_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing(){
        $this->db->select('transaksi.*,
                        produk.nama_produk,
                        produk.gambar,
                        pelanggan.nama_pelanggan,
                        pelanggan.username');
        $this->db->from('transaksi');
        // Join
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        // End join
        $this->db->order_by('id_transaksi', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail transaksi
    public function detail($id_transaksi){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data transaksi
    public function tambah($data){
        $this->db->insert('transaksi', $data);
    }
    
}
                        
/* End of file Transaksi.php */
    
                        