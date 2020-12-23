<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {
    
    // Halaman Login
    public function index(){
        // Validasi data
        $this->form_validation->set_rules('username', 'Username', 'required',
            array(  'required'  => '%s harus di isi'));
        
        $this->form_validation->set_rules('password', 'Password', 'required',
            array(  'required'  => '%s harus di isi'));
        
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // proses ke simple login
			$this->simple_login->login($username,$password);
        }
        
        $data = array(  'title' => 'Login Admin');
        $this->load->view('admin/login/list', $data, FALSE);
    }

    // Fungsi logout
	public function logout()
	{
		// ambil fungsi input tekan simple login libraries
		$this->simple_login->logout();
	}
        
}
        
    /* End of file  Login.php */
        
                            