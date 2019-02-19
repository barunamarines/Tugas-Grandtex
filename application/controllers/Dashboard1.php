<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {

	public function index()
	{
		$panggil_data = $this->db->get('master_waste');

		 //siapkan data untuk dikirim ke view
		$data=array();
		$data['master_waste'] = $panggil_data;

		$this->load->view('dashboard1',$data);
	}

	//GET-AMBIL DATABASE
	public function halaman_dua_waste_produksi()
	{
		$data=array();

		//Modifikasi tanggal bootsrap karna, formatnya bedanya di garis miring
		$data['tanggal']=date('Y-m-d', strtotime($this->input->get('tanggal')));
		$data['nama_waste']=$this->input->get('nama_waste');
		$data['asal_waste']=$this->input->get('asal_waste');
		$data['jml_karung']=$this->input->get('jumlah_karung');
		$data['no_karung']=$this->input->get('no_karung');

		$data['jenis_waste']=$this->input->get('jenis_waste'); 

		// echo json_encode(strtotime($this->input->get('tanggal'))); 
		// exit();
		

		//Load Halaman
		$this->load->view('halaman_dua_waste_produksi',$data);
	}


	//masukan data ke databse, gradi
	public function memasukan_data_halaman_dua_waste_produksi()
	{
		//terima data ke database
		//varibel dikiri bebas tdk apa
		//variabel fungsi yg di kanan hrs sesuai dengan name di view yg ngirim data
		$data['tanggal'] = $this->input->post('tanggal');
		$data['nama_waste'] = $this->input->post('nama_waste');
		$data['asal_waste'] = $this->input->post('asal_waste');

		$data['jenis_waste'] = $this->input->post('jenis_waste');

		

		$data['jumlah_karung'] = $this->input->post('jumlah_karung');
		
		// echo json_encode($data['tanggal']);
		// exit();
		
		//variabel array
		$data['no_karung'] = $this->input->post('no_karung');
		$data['kilogram'] = $this->input->post('kilogram');
		$data['shift'] = $this->input->post('shift');

		//insert ke database input data banyak
		
		for ($i=0; $i < count($data['kilogram']); $i++) { 
			
			//AMBIL DATA SESUAI DENGAN INDUK YANG DIBUTUHKAN (AMERIKA)
			$this->db->where('nama_waste', $data['nama_waste']);
			$panggil_data =	$this->db->get('master_waste');
			
			//row adalah dari semua data hanya diambil satu data saja dan di ambil dgn format array
			//varibel kiri = variabel penyimpan
			//varibel kanan = varibel yg di proses
			$row = $panggil_data->row_array();

			
			$masuk_data = array(
				//dikiri : nama kolomnya di database
				//dikanan : data yg mau disimpannya + harus sama dengan variabel penampung diatas
				//variabel array (*['jumlah_kilogram']) di belakangnya harus menggunakan variabel index (*$i)
				'tanggal' => $data['tanggal'],
				'nama_waste' => $data['nama_waste'],
				'asal_waste' => $data['asal_waste'],
				'no_karung' => $data['no_karung'][$i],
				'jml_karung' => 1,
				'jml_kg' => $data['kilogram'][$i],
				'shift' => $data['shift'][$i],
				'jenis_waste' => $row['jenis_waste'],
				'user' => $row['user'],
				'bagian' => $row['bagian'],
				'status' => 1
				
			);

			 // $this->Gtx_model->tampilkan_data($data);

			$this->db->insert('waste_produksi',$masuk_data);

			//FLASH (memberitahu user input data berhasil)
			$this->session->set_flashdata('pesan_input_data_banyak_berhasil', 'Input Data Banyak Berhasil');
		}

		//redirect ke halaman utama
		redirect('Blank/index');
	}

	public function register()
	{
		$this->load->view('register');
	}

	//REGISTER USER
	public function input_data_register()
	{
		$user = $this->input->post('username');
		$depar = $this->input->post('departemen');
		$pass = md5($this->input->post('password'));

		$data = array(
        'username' => $user,
        'departemen' => $depar,
        'password' => $pass
	);
		//$this->db->insert('login', $data);

		$this->Gtx_model->input_database($data);

		redirect('Blank/index');

	

	// $this->load->view('register');
	}
	
}
