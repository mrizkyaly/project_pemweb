<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Register extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    // Register user
    public function index(){
         // Validasi data yang mau di input
        $valid = $this->form_validation;

        $valid->set_rules('username','Username','required|min_length[5]|max_length[32]|is_unique[users.username]',
            array(  'required'      => '%s harus di isi',
                    'min_length'    => '%s minimal 5 karakter',
                    'max_length'	=> '%s maksimal 32 karakter',
                    'is_unique'     => '%s sudah ada silahkan buat username baru'
                ));
        
        $valid->set_rules('password','Password','required',
            array(  'required'      => '%s harus di isi'
                ));

        if ($valid->run()===FALSE) {
            $data = array(  'title' => 'Register Admin');
            $this->load->view('admin/register/list', $data, FALSE);
        }else {
            $i = $this->input;
            $data = array(  'username'  =>$i->post('username'),
                            'password'  =>SHA1($i->post('password'))
                        );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/login'),'refresh');            
        }
    }
    
}
        
    /* End of file  register.php */
        
                            