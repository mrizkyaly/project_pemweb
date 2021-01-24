<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Profile extends CI_Controller {

public function index()
{
	$data = array(	'title' 	=> 'Profile | &#169; Insurgent Club',
					'aktif'		=> 'active',
					'isi'		=> 'profile/list'
				);
	$this->load->view('layout/wrapper', $data, FALSE);
}
        
}
        
    /* End of file  profile.php */
        
                            