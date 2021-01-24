<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kategori extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        // Laod Model kategori
        $this->load->model('kategori_model');
    }

    // View Data user
    public function index(){
        // Laod function listing di kategori model
        $kategori = $this->kategori_model->listing();

        // Laod view
        $data = array(  'title'     => 'Data Kategori',
                        'kategori'  => $kategori,
                        'isi'       => 'admin/kategori/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }
    
    // Tambah Kategori
    public function tambah(){
        // Validasi data yang mau di input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori','Nama Kategori','required',
            array('required'    => '%s harus di isi'
                ));
        
        if ($valid->run()===FALSE) {
            $data = array(  'title' => 'Tambah Kategori',
                            'isi'   => 'admin/kategori/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else {
            $i = $this->input;
            $data = array(  'nama_kategori' => $i->post('nama_kategori'));
            $this->kategori_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambahkan');
            redirect(base_url('admin/kategori'),'refresh');
        }
    }

    public function edit($id_kategori){
        // Laod function detail dari kategori model
        $kategori = $this->kategori_model->detail($id_kategori);

         // Validasi data yang mau di input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori','Nama Kategori','required',
            array('required'    => '%s harus di isi'
                ));
        
        if ($valid->run()===FALSE) {
            $data = array(  'title'     => 'Edit Kategori',
                            'kategori'  => $kategori,
                            'isi'       => 'admin/kategori/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else {
            $i = $this->input;
            $data = array(  'id_kategori'   => $id_kategori,
                            'nama_kategori' => $i->post('nama_kategori')
                        );
            $this->kategori_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit');
            redirect(base_url('admin/kategori'),'refresh');
        }
    }

    // Delete Kategori
    public function delete($id_kategori){
        $data = array('id_kategori' => $id_kategori);
        $this->kategori_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        redirect(base_url('admin/kategori'),'refresh');
    }
}
        
    /* End of file  Kategori.php */
        
                            