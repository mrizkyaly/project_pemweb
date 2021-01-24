<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Pelanggan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Load Model pelanggan
        $this->load->model('pelanggan_model');
    }

    // View Data pelanggan
    public function index(){
        // Load function listing di pelanggan model
        $pelanggan = $this->pelanggan_model->lsiting();

        // Load view
        $data = array(  'title'     => 'Data Pelanggan',
                        'pelanggan' => $pelanggan,
                        'isi'       => 'admin/pelanggan/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }
    
    
    // Tambah data pelanggan
    public function tambah(){
        // Validaasi data yang mau di input
        $valid = $this->form_validation;

        $valid->set_rules('username', 'Username','required|min_length[5]|max_length[32]|is_unique[pelanggan.username]',
            array(  'required'      => '%s harus di isi',
                    'min_length'    => '%s minimal 5 karakter',
                    'max_length'    => '%s maksimal 32 karakter',
                    'is_unique'     => '%s sudah ada silahkan buat username baru'
                ));
        
        $valid->set_rules('password', 'Password','required',
            array(  'required'      => '%s harus di isi'
        ));

        $valid->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required',
            array(  'required'      => '%s harus di isi'
        ));

        $valid->set_rules('alamat', 'Alamat', 'required',
            array(  'required'      => '%s harus di isi'
        ));

        $valid->set_rules('nomor', 'Nomor', 'required',
            array(  'required'  => '%s harus di isi'
        ));

        if ($valid->run()===FALSE) {
            $data = array(  'title' => 'Tambah Pelanggan',
                            'isi'   => 'admin/pelanggan/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE); 
        }else {
            $i = $this->input;
            $data = array(  'username'          =>$i->post('username'),
                            'password'          =>SHA1($i->post('password')),
                            'nama_pelanggan'    =>$i->post('nama_pelanggan'),
                            'alamat'            =>$i->post('alamat'),
                            'nomor'             =>$i->post('nomor')
                        );
            $this->pelanggan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/pelanggan'),'refresh');
        }
    }

    // Edit data pelanggan
    public function edit($id_pelanggan){
        // Laod function detail dari pelanggan model
        $pelanggan = $this->pelanggan_model->detail($id_pelanggan);
        
        // Validasi data yang mau di input
        $valid = $this->form_validation;

        $valid->set_rules('username', 'Username','required|min_length[5]|max_length[32]|is_unique[pelanggan.username]',
            array(  'required'      => '%s harus di isi',
                    'min_length'    => '%s minimal 5 karakter',
                    'max_length'    => '%s maksimal 32 karakter',
                    'is_unique'     => '%s sudah ada silahkan buat username baru'
                ));
        
        $valid->set_rules('password', 'Password','required',
            array(  'required'      => '%s harus di isi'
        ));

        $valid->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required',
            array(  'required'      => '%s harus di isi'
        ));

        $valid->set_rules('alamat', 'Alamat', 'required',
            array(  'required'      => '%s harus di isi'
        ));

        $valid->set_rules('nomor', 'Nomor', 'required',
            array(  'required'  => '%s harus di isi'
        ));

        if ($valid->run()===FALSE) {
            $data = array(  'title'     => 'Edit Pelanggan',
                            'pelanggan' => $pelanggan,
                            'isi'       => 'admin/pelanggan/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            
        }else {
            $i = $this->input;
            $data = array(  'id_pelanggan'  => $id_pelanggan,
                            'username'          =>$i->post('username'),
                            'password'          =>SHA1($i->post('password')),
                            'nama_pelanggan'    =>$i->post('nama_pelanggan'),
                            'alamat'            =>$i->post('alamat'),
                            'nomor'             =>$i->post('nomor')
                        );
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/pelanggan'),'refresh');
            
        }
    }

    // Delete data pelanggan
    public function delete($id_pelanggan){
        $data = array('id_pelanggan'    => $id_pelanggan);
        $this->pelanggan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/pelanggan'),'refresh');
    }
        
}
        
    /* End of file  Pelanggan.php */
        
                            