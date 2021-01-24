<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Pelanggan_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // View all data pelanggan
    public function lsiting(){
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail pelanggan untuk edit data
    public function detail($id_pelanggan){
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->order_by('id_pelanggan', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Pelanggan
    public function login($username, $password){
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array( 'username'  => $username,
                                'password'  => SHA1($password),
                            ));
        $this->db->order_by('id_pelanggan', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data pelanggan
    public function tambah($data){
        $this->db->insert('pelanggan', $data);
    }

    // Edit data pelanggan
    public function edit($data){
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('pelanggan', $data);
    }

    // Delete data pelanggan
    public function delete($data){
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->delete('pelanggan', $data);
        
    }    
}
                        
/* End of file Pelanggan.php */
    
                        