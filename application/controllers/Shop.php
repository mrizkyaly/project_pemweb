<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Shop extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('transaksi_model');
    }
    
    public function index()
    {
        $produk = $this->produk_model->listing();

        $data = array(	'title' 	=> 'Shop | &#169; Insurgent Club',
                        'produk'    =>  $produk,
                        'isi'		=> 'shop/list'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function beli($id_produk){
        // Ambil detail produk
        $produk     = $this->produk_model->detail($id_produk);

        //Validasi input
        $valid = $this->form_validation;
        $valid->set_rules('bayar','bayar','required',
                    array(  'required'      => '%s harus di isi'));

        if ($valid->run()===FALSE) {
            $data = array(	'title' 	=> 'Beli | &#169; Insurgent Club',
                        'produk'    =>  $produk,
                        'isi'		=> 'shop/beli'
                    );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else {
            $i = $this->input;
            $data = array(	'id_pelanggan'			=> $this->session->userdata('id_pelanggan'),
							'id_produk'				=> $id_produk,
							'bayar'					=> $i->post('bayar'),
							'tgl_transaksi'			=> date('Y-m-d H:i:s')
						);
			$this->transaksi_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Pembelian Sukses');
			redirect(base_url('shop'),'refresh');
        }
    }
        
}
        
    /* End of file  shop.php */
        
                            