<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_balepress extends CI_Controller {

	public function index()
	{
		$panggil_data=$this->db->get('stock_waste_produksi');

		//siapkan data untuk dikirim ke view 1 (hasil_bale_press)
		$data=array();
		$data['ambil_data']=$panggil_data;

		$this->load->view('hasil_bale_press',$data);
	}

	public function hasil_balepress_dua()
	{

		//siapkan data halaman
		$data=array();
		$data['hasil_balepress_dua']='hasil_balepress_dua';

		//terima data dari halaman sebelumnya
		$data['tanggal']=date('Y-m-d', strtotime($this->input->get('tanggal')));

		$data['jumlah_bale']=$this->input->get('jumlah_bale');

		$data['jml_balepress']=$this->input->get('jml_balepress');


		// echo json_encode(strtotime($this->input->get('tanggal'))); 
		// exit();
		
		// $this->session->set_userdata('tujuan', $data['tujuan']);

		// //menetapkan tanggal yang sudah di submit
		// $this->session->set_userdata('tanggal', $data['tanggal']);

		//ambil data waste_produksi dari database
		$data['input_data'] = $this->Gtx_model->tampil_data_hasil_balepress();

		// $this->db->where('nama_waste',$data);
		

		//kirim data ke view utk tanggal
		$this->load->view('hasil_balepress_dua',$data);

		// $this->load->view('hasil_balepress_dua');
	}

	public function hasil_balepress_tiga()
	{
		$this->load->view('hasil_balepress_tiga');
	}

	//panggil data, ala gradi
		public function pengeluaran_data()
	{
		$this->load->model('Gtx_model');
		
		$data=array();
		// $data['tanggal']=$this->input->get('tanggal');
		$data['nama_waste']=$this->input->get('nama_waste');
		$data['jenis_waste']=$this->input->get('jenis_waste');
		$data['bagian']=$this->input->get('bagian');
		$data['jumlah_bale']=$this->input->get('jumlah_bale');
		// $data['asal_waste']=$this->input->get('asal_waste');
		// $data['tujuan']=$this->input->get('tujuan');
		
		// $data['no_bale']=$this->input->get('no_bale');
		// $data['shift']=$this->input->get('shift');
		// $data['jml_karung']=$this->input->get('jml_karung');
		$data['kilogram']=$this->input->get('jml_kg');
		// $data['user']=$this->input->get('user');
		// $data['timestamp']=$this->input->get('timestamp');
		// $data['status']=$this->input->get('status');
		$data['tanggal']=$this->input->get('tanggal');
		// $data['tanggal']=$this->input->get('tanggal');


		

		$where=array(
			// 'tanggal'=> $data['tanggal'],
			'nama_waste'=> $data['nama_waste'],
			'jenis_waste'=> $data['jenis_waste'],
			'bagian'=> $data['bagian']
			// 'asal_waste'=> $data['asal_waste'],
			// 'no_karung' => $data['no_karung'],
			// 'shift' => $data['shift'],
			// 'jml_karung' => $data['jml_karung'],
			// 'jml_kg' => $data['jml_kg']
			

	);
		// $data['ambil_data']=$this->Gtx_model->panggil_fungsi_hasil_balepress($where);

		// echo json_encode($data['ambil_data']);
		// exit();

		$this->load->view('hasil_balepress_tiga',$data);



	}

	//masukan data ke databse, gradi (TIGA HALAMAN_WASTE_PRODUKSI)
	public function tiga_input_hasil_balepress_ke_database()
	{
		/**
		 * Terima data dari view (name)
		 */
		//terima data ke database
		//varibel dikiri bebas tdk apa
		//variabel fungsi yg di kanan hrs sesuai dengan name di view yg ngirim data

		//karna di view pengeluaran akhir detail ada 3 perintah yg akan di kirim, maka di controller juga harus 3 di bagian terima data
		$data['user'] = $this->input->post('user');
		$data['nama_waste'] = $this->input->post('nama_waste');
		//variabel array YANG WAJIB ADA DI COUNT FOR
		$data['no_bale'] = $this->input->post('no_bale');
		$data['shift'] = $this->input->post('shift');
		$data['kilogram'] = $this->input->post('kilogram');
		
		//stok_id menjadi patokan siapa yg disimpan ke database
		//input_data_id berbentuk array krn berkemungkinan lebih dari satu
		$data['input_data_id'] = $this->input->post('input_data_id');


		$data['tanggal'] = $this->input->get('tanggal');
		$data['user'] = $this->input->get('user');

		$data['jumlah_bale'] = $this->input->get('jumlah_bale');



		// $data['jumlah_bale'] = $this->session->userdata('jumlah_bale');

		// $data['tujuan'] = $this->input->get('tujuan');
		
		// echo json_encode($this->input->post($data['tujuan']));
		// exit();
		
		$where=array();
		//perulangan sebanyak input_data_id
		for ($i=0; $i < count($data['no_bale']); $i++) { 
			//dari input_data_id, memproses data yang lain jenis_kapas dll
			$this->db->where('nama_waste', $data['nama_waste']);
			$input_data = $this->db->get('stock_waste_produksi'); //285-286 = menggunakan model utk tidak menggunakan db
			//hanya mengambil 1 baris dari tabel dan mengubah format hasil menjadi array
			$input_data = $input_data->row_array();
			
			//insert ke database penyerahan_waste_produksi
			$masuk_data = array(
				//dikiri : nama kolomnya di database
				//dikanan : data yg mau disimpannya + harus sama dengan variabel penampung diatas
				//variabel array (*['jumlah_kilogram']) di belakangnya harus menggunakan variabel index (*$i)
				'tanggal' => $data['tanggal'],
				// 'tujuan' => $data['tujuan'],
				'nama_waste' => $input_data['nama_waste'],
				'jenis_waste' => $input_data['jenis_waste'],
				'bagian' => $input_data['bagian'],
				// 'asal_waste' => $input_data['asal_waste'],
				'no_bale' => $data['no_bale'][$i],
				'shift' => $data['shift'][$i],
				'jml_balepress' => $data['jumlah_bale'],//jangan lupa direvisi, 1
				'jml_kg' => $input_data['jml_kg'],
				'user' => '',
				// 'timestamp' => $input_data['timestamp'],

				
			);
			// $where[]=array('id'=>$input_data['id'],'status'=>1);
			
			$this->db->insert('hasil_balepress',$masuk_data);	
			
			
		}

		// $update=$this->db->update_batch('waste_produksi',$where,'id');


		// //FLASH (memberitahu user input data berhasil)
		// $this->session->set_flashdata('pengeluaran_data_berhasil', 'Pengeluaran Data Berhasil');


		//redirect ke halaman utama
		redirect('Blank/index');
	}
}
