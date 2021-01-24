<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Pelanggan_login
{
    protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model pelanggan
        $this->CI->load->model('pelanggan_model');
	}

	// Fugnsi Login
	public function login($username,$password)
	{
		$check = $this->CI->pelanggan_model->login($username,$password);
		// Jika ada data pelanggan,Maka create session
		if ($check) {
			$id_pelanggan	= $check->id_pelanggan;
			$nama_pelanggan = $check->nama_pelanggan;
			$alamat			= $check->alamat;
			$nomor			= $check->nomor;

			// create session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('alamat',$alamat);
			$this->CI->session->set_userdata('nomor',$nomor);
			// Redirect ke halaman admin yang diproteksi
			redirect(base_url('profile'),'refresh');
		}else{
			// Kalau tidak ada pelanggan maka atau username passwotd salah
			$this->CI->session->set_flashdata('warning','Username atau password salah');
			redirect(base_url('login'),'refresh');
		}
	}

	// fungsi cek login
	public function cek_login()
	{
		// Memeriksa apakah session sudah atau belum jika belum silahkan ke halaman login
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning','Anda belum login');
			redirect(base_url('login'),'refresh');
		}
	}

	// fungsi cek login
	public function logout()
	{
		// Membuang semua session yang sudah diset pada saat login
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('alamat');
		$this->CI->session->unset_userdata('nomor');
		// Setelah session dibuang,makaa ridirect ke login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}
}
                                                
/* End of file Pelanggan_login.php */
    
                        