<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {
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
			$this->pelanggan_login->login($username,$password);
        }

        $data = array(	'title'  => 'Login | &#169; Insurgent Club',
                        'isi'   => 'login/list'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Fungsi logout
	public function logout()
	{
		// ambil fungsi input tekan simple login libraries
		$this->pelanggan_login->logout();
	}
        
}
        
    /* End of file  login.php */
        
                            