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
		// $data['no_bale']=$this->input->get('no_bale');
		// $data['shift']=$this->input->get('shift');
		// $data['jml_balepress']=$this->input->get('jml_bale');
		// $data['jml_kg'] = $this->input->get('jml_kg');
		// $data['user']=$this->input->get('user');
		// $data['timestamp']=$this->input->get('timestamp');
		// $data['status']=$this->input->get('status');
		// $data['kilogram']=$this->input->get('kilogram');
		$data['tanggal_pengeluaran']=$this->input->get('tanggal_pengeluaran');
		$where=array(
			'tanggal' => $data['tanggal'],
			'nama_waste'=> $data['nama_waste'],
			'bagian'=> $data['bagian'],
			'jenis_waste'=> $data['jenis_waste'],
			// 'tanggal_hasil_balepress'=> $data['tanggal_hasil_balepress'],
			// 'jml_balepress'=> $data['jml_balepress']
	);
		//atur session	
		// $this->session->set_userdata('no_inisial_benang', $data['no_inisial_benang']);
		// $this->session->set_userdata('shift', $data['shift']);
		// $this->session->set_userdata('panjang_penarikan', $data['panjang_penarikan']);
		// $this->session->set_userdata('jumlah_cones', $data['jumlah_cones']);

		$data['hasil_balepress']=$this->Gtx_model->panggil_balepress($where);

		// echo json_encode($data['shift']);
		// exit();

		 $this->load->view('PENYERAHAN_HASIL_BALEPRESS_TIGA',$data);


	}

	//masukan data ke databse, gradi (PENYERAHAN_HASIL_BALEPRESS_TIGA)
	public function tiga_penyerahan_waste_produksi_ke_database()
	{
		/**
		 * Terima data dari view (name)
		 */
		//terima data ke database
		//varibel dikiri bebas tdk apa
		//variabel fungsi yg di kanan hrs sesuai dengan name di view yg ngirim data

		//karna di view pengeluaran akhir detail ada 3 perintah yg akan di kirim, maka di controller juga harus 3 di bagian terima data
		$data['no_bale'] = $this->input->post('no_bale');
		//variabel array
		$data['shift'] = $this->input->post('shift');
		$data['jml_kg'] = $this->input->post('jml_kg');
		
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
			$input_data = $this->db->get('hasil_balepress'); //285-286 = menggunakan model utk tidak menggunakan db
			//hanya mengambil 1 baris dari tabel dan mengubah format hasil menjadi array
			$input_data = $input_data->row_array();
			
			//insert ke database penyerahan_waste_produksi
			$masuk_data = array(
				//dikiri : nama kolomnya di database
				//dikanan : data yg mau disimpannya + harus sama dengan variabel penampung diatas
				//variabel array (*['jumlah_kilogram']) di belakangnya harus menggunakan variabel index (*$i)
				'id_stock' => $input_data['nama_waste'].' '.$input_data['jenis_waste'].' '.$input_data['bagian'],
				'tanggal' => $data['tanggal'],
				'tujuan' => $data['tujuan'],
				'nama_waste' => $input_data['nama_waste'],
				'jenis_waste' => $input_data['jenis_waste'],
				'bagian' => $input_data['bagian'],
				// 'asal_waste' => $input_data['asal_waste'],
				'no_bale' => $input_data['no_bale'],
				'shift' => $input_data['shift'],
				'jml_bale' => $input_data['jml_balepress'],//jangan lupa direvisi, 1
				'jml_kg' => $input_data['jml_kg'],
				'user' => $input_data['user'],
				'timestamp' => $input_data['timestamp'],
				'status' => $input_data['status']
				
			);
			// $where[]=array('id'=>$input_data['id'],'status'=>1);
			
			$this->db->insert('penyerahan_hasil_balepress',$masuk_data);	
			
			// json_encode($data['jml_kg']);
			// exit();
			
		}

		// $update=$this->db->update_batch('waste_produksi',$where,'id');


		// //FLASH (memberitahu user input data berhasil)
		// $this->session->set_flashdata('pengeluaran_data_berhasil', 'Pengeluaran Data Berhasil');


		//redirect ke halaman utama
		redirect('Blank/index');
	}

}
