<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Produk extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
    }
    
    // View Produk
    public function index(){
        $produk = $this->produk_model->listing();

        $data = array(  'title'     => 'Data produk',
                        'produk'    => $produk,
                        'isi'       => 'admin/produk/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah Produk 
    public function tambah(){
        // Ambil data kategori
        $kategori = $this->kategori_model->listing();
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk','Nama Produk','required',
            array(  'required'      => '%s harus di isi'));
        
        $valid->set_rules('size','Size Produk','required',
            array(  'required'      => '%s harus di isi'));

        $valid->set_rules('harga','Harga Produk','required',
            array(  'required'      => '$s harus di isi'));

        if ($valid->run()) {
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';

            $this->load->library('upload', $config);
            
            if (! $this->upload->do_upload('gambar')) {
                $data = array(  'title'     => 'Tambah Produk',
                                'kategori'  => $kategori,
                                'error'     => $this->upload->display_errors(),
                                'isi'       => 'admin/produk/tambah'
                            );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                
            }else {
                $upload_gambar = array('upload_data' => $this->upload->data());
                // Create thumbnail gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                // Lokasi folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs';
                $config['create_thumb'] 	= TRUE;
                $config['maintain_ratio'] 	= TRUE;
                $config['width']         	= 250;//pixel
                $config['height']       	= 250;
                $config['thumb_marker']		='';

                $this->load->library('image_lib', $config);
                
                $this->image_lib->resize();
                // End create thumbnail gambar
                $i = $this->input;
                $data = array(  'id_user'       => $this->session->userdata('id_user'),
                                'id_kategori'   => $i->post('id_kategori'),
                                'nama_produk'   => $i->post('nama_produk'),
                                'size'          => $i->post('size'),
                                'harga'         => $i->post('harga'),
                                'gambar'        => $upload_gambar['upload_data']['file_name']
                            );
                $this->produk_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambahkan');                
                redirect(base_url('admin/produk'),'refresh');           
            }
        }
        $data = array(  'title'     => 'Tambah Produk',
                        'kategori'  => $kategori,
                        'isi'       => 'admin/produk/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Edit Produk
    public function edit($id_produk){
        // Ambil detail produk
        $produk     = $this->produk_model->detail($id_produk);
        // Ambil data kategori
        $kategori = $this->kategori_model->listing();
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk','Nama Produk','required',
            array(  'required'      => '%s harus di isi'));
        
        $valid->set_rules('size','Size Produk','required',
            array(  'required'      => '%s harus di isi'));

        $valid->set_rules('harga','Harga Produk','required',
            array(  'required'      => '$s harus di isi'));
        
        if ($valid->run()) {
            // Cek jika gambar mau figanti
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']      = './assets/upload/image/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2400';//Dalam KB
                $config['max_width']        = '2024';
                $config['max_height']       = '2024';

                $this->load->library('upload', $config);
                if (! $this->upload->do_upload('gambar')) {
                    $data = array(  'title'     => 'Edit Produk'.$produk->nama_produk,
                                    'kategori'  => $kategori,
                                    'produk'    => $produk,
                                    'error'     => $this->upload->display_errors(),
                                    'isi'       => 'admin/produk/edit'
                                );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                }else {
                    $upload_gambar = array('upload_data' => $this->upload->data());
                    // Create thumbnail gambar
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                    // Lokasi folder thumbnail
                    $config['new_image']        = './assets/upload/image/thumbs';
                    $config['create_thumb'] 	= TRUE;
                    $config['maintain_ratio'] 	= TRUE;
                    $config['width']         	= 250;//pixel
                    $config['height']       	= 250;
                    $config['thumb_marker']		='';

                    $this->load->library('image_lib', $config);
                    
                    $this->image_lib->resize();
                    // End create thumbnail gambar
                    $i = $this->input;
                    $data = array(  'id_produk'     => $id_produk,
                                    'id_user'       => $this->session->userdata('id_user'),
                                    'id_kategori'   => $i->post('id_kategori'),
                                    'nama_produk'   => $i->post('nama_produk'),
                                    'size'          => $i->post('size'),
                                    'harga'         => $i->post('harga'),
                                    'gambar'        => $upload_gambar['upload_data']['file_name']
                                );
                    $this->produk_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');                
                    redirect(base_url('admin/produk'),'refresh');
                }
            }else {
                // Edit produk tanpa ganti gambar
                $i = $this->input;
                $data = array(  'id_produk'     => $id_produk,
                                'id_user'       => $this->session->userdata('id_user'),
                                'id_kategori'   => $i->post('id_kategori'),
                                'nama_produk'   => $i->post('nama_produk'),
                                'size'          => $i->post('size'),
                                'harga'         => $i->post('harga')
                                // 'gambar'        => $upload_gambar['upload_data']['file_name']
                            );
                $this->produk_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambahkan');                
                redirect(base_url('admin/produk'),'refresh');
            }
        }
        $data = array(  'title'     => 'Edit Produk'.$produk->nama_produk,
                        'kategori'  => $kategori,
                        'produk'    => $produk,
                        'isi'       => 'admin/produk/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Delete Produk
    public function delete($id_produk){
        // Proses Hapus gambar
        $produk = $this->produk_model->detail($id_produk);
        unlink('./assets/upload/image/'.$produk->gambar);
        unlink('./assets/upload/image/thumbs/'.$produk->gambar);
        // End proses hapus gamabr
        $data = array('id_produk'   => $id_produk);
        $this->produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah di hapus');
        redirect(base_url('admin/produk'),'refresh');
    }
        
}
        
    /* End of file  Produk.php */
        
                            