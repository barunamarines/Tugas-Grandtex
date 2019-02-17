<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyerahan_waste_produksi extends CI_Controller {

	public function index()
	{
		$this->load->view('penyerahan_waste_produksi');
	}

	public function halaman_dua_penyerahan_waste_produksi()
	{

		//siapkan data halaman
		$data=array();
		$data['dua_penyerahan_waste_produksi']='dua_penyerahan_waste_produksi';

		//terima data dari halaman sebelumnya
		$data['tanggal']=date('Y-m-d', strtotime($this->input->get('tanggal')));

		 $data['tujuan']=$this->input->get('tujuan');

		// echo json_encode(strtotime($this->input->get('tanggal'))); 
		// exit();
		
		// $this->session->set_userdata('tujuan', $data['tujuan']);

		// //menetapkan tanggal yang sudah di submit
		

		$this->session->set_userdata('tanggal', $data['tanggal']);
		
		$this->session->set_userdata('tujuan', $data['tujuan']);

		//session versi native
		$_SESSION['tujuan2'] = $data['tujuan'];

		//ambil data waste_produksi dari database
		$data['input_data'] = $this->Gtx_model->tampil_data();

		//kirim data ke view utk tanggal
		$this->load->view('dua_penyerahan_waste_produksi',$data);
	}

		//panggil data, ala gradi
		public function pengeluaran_data()
	{
		$this->load->model('Gtx_model');
		
		$data=array();
		$data['tanggal']=$this->input->get('tanggal');
		$data['nama_waste']=$this->input->get('nama_waste');
		$data['jenis_waste']=$this->input->get('jenis_waste');
		$data['bagian']=$this->input->get('bagian');
		$data['asal_waste']=$this->input->get('asal_waste');
		// $data['tujuan']=$this->input->get('tujuan');
		
		// $data['no_karung']=$this->input->get('no_karung');
		// $data['shift']=$this->input->get('shift');
		// $data['jml_karung']=$this->input->get('jml_karung');
		$data['kilogram']=$this->input->get('jml_kg');
		$data['user']=$this->input->get('user');
		$data['timestamp']=$this->input->get('timestamp');
		$data['status']=$this->input->get('status');
		$data['tanggal_pengeluaran']=$this->input->get('tanggal_pengeluaran');
		

		$where=array(
			// 'tanggal'=> $data['tanggal'],
			'nama_waste'=> $data['nama_waste'],
			'jenis_waste'=> $data['jenis_waste'],
			'bagian'=> $data['bagian'],
			'asal_waste'=> $data['asal_waste'],
			// 'no_karung' => $data['no_karung'],
			// 'shift' => $data['shift'],
			// 'jml_karung' => $data['jml_karung'],
			// 'jml_kg' => $data['jml_kg']

		
			
	);
		$data['input_data']=$this->Gtx_model->panggil_fungsi($where);
		$this->load->view('tiga_penyerahan_waste_produksi',$data);

			

	}

	public function tiga_penyerahan_waste_produksi()
	{
		$this->load->view('tiga_penyerahan_waste_produksi');
	}

	//masukan data ke databse, gradi (TIGA HALAMAN_WASTE_PRODUKSI)
	public function tiga_penyerahan_waste_produksi_ke_database()
	{
		/**
		 * Terima data dari view (name)
		 */
		//terima data ke database
		//varibel dikiri bebas tdk apa
		//variabel fungsi yg di kanan hrs sesuai dengan name di view yg ngirim data

		//karna di view pengeluaran akhir detail ada 3 perintah yg akan di kirim, maka di controller juga harus 3 di bagian terima data
		$data['no_karung'] = $this->input->post('no_karung');
		//variabel array
		$data['shift'] = $this->input->post('shift');
		$data['kilogram'] = $this->input->post('kilogram');
		
		//stok_id menjadi patokan siapa yg disimpan ke database
		//input_data_id berbentuk array krn berkemungkinan lebih dari satu
		$data['input_data_id'] = $this->input->post('input_data_id');
		$data['tanggal'] = $this->input->get('tanggal');

		$data['tujuan'] = $this->session->userdata('tujuan');
		
		// echo json_encode($this->input->post($data['tujuan']));
		// exit();
		
		$where=array();
		//perulangan sebanyak input_data_id
		for ($i=0; $i < count($data['input_data_id']); $i++) { 
			//dari input_data_id, memproses data yang lain jenis_kapas dll
			$this->db->where('id', $data['input_data_id'][$i]);
			$input_data = $this->db->get('waste_produksi'); //285-286 = menggunakan model utk tidak menggunakan db
			//hanya mengambil 1 baris dari tabel dan mengubah format hasil menjadi array
			$input_data = $input_data->row_array();
			
			//insert ke database penyerahan_waste_produksi
			$masuk_data = array(
				//dikiri : nama kolomnya di database
				//dikanan : data yg mau disimpannya + harus sama dengan variabel penampung diatas
				//variabel array (*['jumlah_kilogram']) di belakangnya harus menggunakan variabel index (*$i)
				'tanggal' => $data['tanggal'],
				'tujuan' => $data['tujuan'],
				'nama_waste' => $input_data['nama_waste'],
				'jenis_waste' => $input_data['jenis_waste'],
				'bagian' => $input_data['bagian'],
				'asal_waste' => $input_data['asal_waste'],
				'no_karung' => $input_data['no_karung'],
				'shift' => $input_data['shift'],
				'jml_karung' => $input_data['jml_karung'],//jangan lupa direvisi, 1
				'jml_kg' => $input_data['jml_kg'],
				'user' => $input_data['user'],
				'timestamp' => $input_data['timestamp'],
				
			);
			// $where[]=array('id'=>$input_data['id'],'status'=>1);
			
			$this->db->insert('penyerahan_waste_produksi',$masuk_data);	
			
			
		}

		// $update=$this->db->update_batch('waste_produksi',$where,'id');


		// //FLASH (memberitahu user input data berhasil)
		// $this->session->set_flashdata('pengeluaran_data_berhasil', 'Pengeluaran Data Berhasil');


		//redirect ke halaman utama
		redirect('Blank/index');
	}
}
