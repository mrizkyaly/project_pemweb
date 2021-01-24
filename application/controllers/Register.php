<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Register extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
    }
    
    // Halaman Register
    public function index(){
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
            $data = array(  'title'  => 'Register | &#169; Insurgent Club',
                            'isi'   => 'register/list'
                        );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else {
            $i = $this->input;
            $data = array(  'username'          =>$i->post('username'),
                            'password'          =>SHA1($i->post('password')),
                            'nama_pelanggan'    =>$i->post('nama_pelanggan'),
                            'alamat'            =>$i->post('alamat'),
                            'nomor'             =>$i->post('nomor')
                        );
            $this->pelanggan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Register Success !');
            redirect(base_url('login'),'refresh');
        }
    }
}
        
    /* End of file  register.php */
        
                            