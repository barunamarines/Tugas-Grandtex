<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
     
    //PROSES LOGIN GTX   
	public function login()
	{
		$user = $this->input->post('user',true);
		$pass = $this->input->post('pass',true);
		$cek = $this->Gtx_model->prosesLogin($user,$pass);
		$hasil = count($cek);
		if ($hasil > 0) {
			$select = $this->db->get_where('login', array('username' => $user, 'password => $pass'))->row();
			$data = array('logged_in' => true, 
							'loger' =>$select->username, 
							'id' => $select->id);
			$this->session->set_userdata($data);
			redirect('Blank/index');
		}else{
			$this->session->set_flashdata('err','username dan password salah');
			redirect ('auth/index');
			}
             


             
	}
        
        public function logout()
	{
                redirect('auth');
	}
}
