<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    // Load Model User
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    // View Data User
    public function index(){
        // Load function listing di user model
        $user = $this->user_model->listing();

        // Load view
        $data = array(  'title' => 'Data User',
                        'user'  => $user,
                        'isi'   => 'admin/user/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }

    // Tambah User 
    public function tambah(){
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
            $data = array(  'title' => 'Tambah User',
                            'isi'   => 'admin/user/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else {
            $i = $this->input;
            $data = array(  'username'  =>$i->post('username'),
                            'password'  =>SHA1($i->post('password'))
                        );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/user'),'refresh');            
        }
    }

    // Edit User
    public function edit($id_user){
        // Load user model
        $user = $this->user_model->detail($id_user);

        // Validasi data yang mau di input
        $valid = $this->form_validation;

        $valid->set_rules('username','Username','required|min_length[5]|max_length[32]|is_unique[users.username]',
            array(  'required'      => '%s harus di isi',
                    'min_length'    => '%s minimal 5 karakter',
                    'max_length'	=>'%s maksimal 32 karakter',
                    'is_unique'     => '%s usdah ada.buat username baru'
                ));
        
        $valid->set_rules('password','Password','required',
            array(  'required'      => '%s harus di isi'
                ));
        
        if ($valid->run()===FALSE) {
            $data = array(  'title' => 'Edit User',
                            'user'  => $user,
                            'isi'   => 'admin/user/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            
        }else {
            $i = $this->input;
            $data = array(  'id_user'   =>$id_user,
                            'username'  =>$i->post('username'),
                            'password'  =>SHA1($i->post('password')
                        ));
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah di edit');
            redirect(base_url('admin/user'),'refresh');
        }
    }

    // Delete User
    public function delete($id_user){
        $data = array('id_user' => $id_user);
        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/user'),'refresh');
    }
}
        
    /* End of file  User.php */
        
                            