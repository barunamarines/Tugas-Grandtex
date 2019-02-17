<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PENYERAHAN_HASIL_BALEPRESS extends CI_Controller {

	public function index()
	{
		$this->load->view('PENYERAHAN_HASIL_BALEPRESS');
	}

	public function PENYERAHAN_HASIL_BALEPRESS_DUA()
	{

		// //siapkan data halaman
		$data=array();
		// $data['pengeluaran']='pengeluaran';

		//terima data dari halaman sebelumnya
		$data['tanggal_pengeluaran'] = $this->input->get('tanggal');
		$data['tujuan'] = $this->input->get('tujuan');


		//jika session set_userdata(isi), harus sama dengan variabel di belakang
		//ATUR SESSION
		$this->session->set_userdata('tanggal_pengeluaran', $data['tanggal_pengeluaran']);
		$this->session->set_userdata('tujuan', $data['tujuan']);



		//ambil data hasil BPW dari database
		$data['hasil_balepress'] = $this->Gtx_model->model_hasil_balepress();
		$this->load->view('PENYERAHAN_HASIL_BALEPRESS_DUA',$data);
	}

	public function PENYERAHAN_HASIL_BALEPRESS_TIGA()
	{
		$this->load->view('PENYERAHAN_HASIL_BALEPRESS_TIGA');
	}


	//panggil data, ala gradi
		//HALAMAN 3 FIx
		public function pengeluaran_data_hasil_balepress()
	{
		$this->load->model('Gtx_model');
		
		$data=array();
		$data['tanggal']=$this->input->get('tanggal');
		$data['nama_waste']=$this->input->get('nama_waste');
		$data['jenis_waste']=$this->input->get('jenis_waste');
		$data['bagian']=$this->input->get('bagian');
		$data['no_bale']=$this->input->get('no_bale');
		$data['shift']=$this->input->get('shift');
		$data['jml_balepress']=$this->input->get('jml_balepress');
		$data['jml_kg'] = $this->input->get('jml_kg');
		$data['user']=$this->input->get('user');
		$data['timestamp']=$this->input->get('timestamp');
		$data['status']=$this->input->get('status');
		// $data['kilogram']=$this->input->get('kilogram');
		$data['tanggal_pengeluaran']=$this->input->get('tanggal_pengeluaran');
		$where=array(
			'tanggal' => $data['tanggal'],
			'nama_waste'=> $data['nama_waste'],
			'bagian'=> $data['bagian'],
			'jenis_waste'=> $data['jenis_waste'],
			// 'tanggal_hasil_balepress'=> $data['tanggal_hasil_balepress'],
			'jml_balepress'=> $data['jml_balepress']
	);
		//atur session	
		// $this->session->set_userdata('no_inisial_benang', $data['no_inisial_benang']);
		// $this->session->set_userdata('shift', $data['shift']);
		// $this->session->set_userdata('panjang_penarikan', $data['panjang_penarikan']);
		// $this->session->set_userdata('jumlah_cones', $data['jumlah_cones']);

		$data['hasil_balepress']=$this->Gtx_model->panggil_balepress($where);
		 $this->load->view('PENYERAHAN_HASIL_BALEPRESS_TIGA',$data);

		

	}

}
