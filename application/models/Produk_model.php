<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Produk_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // View all data produk
    public function listing(){
        $this->db->select('produk.*,
                        users.username,
                        kategori.nama_kategori');
        $this->db->from('produk');
        // Start join
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // End join
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail data produk
    public function detail($id_produk){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row(); 
    }
    
    // Tambah data produk
    public function tambah($data){
        $this->db->insert('produk', $data);
    }

    // Edit data produk
    public function edit($data){
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }

    // Delete data produk
    public function delete($data){
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk',$data);
    }
    
}
                        
/* End of file Produk.php */
    
                        