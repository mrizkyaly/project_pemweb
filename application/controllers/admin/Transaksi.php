<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Transaksi extends CI_Controller {

    // Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
    }
    
    public function index()
	{
		$transaksi = $this->transaksi_model->listing();

		$data = array(	'title'			=> 'Daftar Transaksi',
						'transaksi'		=> $transaksi,
						'isi'			=> 'admin/transaksi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
        
    /* End of file  transaksi.php */
        
                            