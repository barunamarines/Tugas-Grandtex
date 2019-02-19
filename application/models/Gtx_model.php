<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Gtx_model extends CI_Model {

		public function prosesLogin ($user,$pass)
		{
			$this->db->where('username',$user);
			$this->db->where('password',$pass);
			return $this->db->get('login')->row();
		}


		//memasukan data yg benaar!!
   	 	public function tampilkan_data($data)
   	 	{
   	 		$this->db->insert('waste_produksi',$data);
   	 		return TRUE;
   	 	}

   	 	//input data berasal dari tabel database hasil waste_produksi
	    public function tampil_data()
	    {
	    	// $this->db->select("nama_waste,jenis_waste,bagian,asal_waste,no_karung,shift,jml_karung,user,SUM(jml_kg) as berat,SUM(id) as id,tanggal,timestamp,status");
	    
      //   	$this->db->group_by("nama_waste,jenis_waste,bagian,asal_waste,no_karung,shift,jml_karung,user,tanggal,timestamp,status");

	        $this->db->select("nama_waste,jenis_waste,bagian,tanggal, SUM(jml_karung) AS jumlah_karung, SUM(jml_kg) AS jumlah_berat");
	        $this->db->group_by("nama_waste,jenis_waste,bagian,tanggal");
	        $this->db->where("status = 0");
        
	        //varibel data_stok/input_data berasal dari tabel hasil_bpw
	        $tampil_data=$this->db->get('waste_produksi');
	        return $tampil_data->result();
    	}

    	//tampilkan data input_banyak secara detail
    	public function panggil_fungsi($where)
	    {
	        $this->db->where($where);
	        $this->db->where('status=0');
	        //varibel data_stok/input_data berasal dari tabel input data banyak

	        $input_data=$this->db->get('waste_produksi');

	        
	        return $input_data->result();
    	}


    	//INPUT DATA REGISTER
		public function input_database($data)
		{
			$this->db->insert('login',$data);
			return TRUE;
		}

		//input data berasal dari tabel database hasil penyerahaan_waste_produksi
	    public function tampil_data_hasil_balepress()
	    {
	    	$this->db->select("nama_waste,jenis_waste,bagian,SUM(jml_kg) as berat,SUM(jml_karung) as karung");
	    
        	$this->db->group_by("nama_waste,jenis_waste,bagian,jml_karung,jml_kg");

        	//where untuk memanggil data sesuai dengan nama_waste
        	// $this->db->where('nama_waste',$input_data);
        	// $this->db->where('nama_waste' = 'nama_waste,jenis_waste,bagian,)
        
        //varibel data_stok/input_data berasal dari tabel hasil_bpw
        $tampil_data=$this->db->get('stock_waste_produksi');
        return $tampil_data->result();
    	}


    	//tampilkan data input_banyak secara detail dari VIEW HASIL BALEPRESS DUA
    	public function panggil_fungsi_hasil_balepress($where)
	    {
	        $this->db->where($where);
	        // $this->db->where('status=0');
	        //varibel data_stok/input_data berasal dari tabel input data banyak
	        $ambil_data=$this->db->get('stock_waste_produksi');
	        return $ambil_data->result();
    	}







    	//input data berasal dari tabel database hasil balepress
	    public function model_hasil_balepress()
	    {
	    	$this->db->select("tanggal,nama_waste,jenis_waste,bagian,no_bale,shift,jml_balepress,user,SUM(jml_kg) as berat,SUM(id) as id,tanggal,timestamp,status");
	    
        	$this->db->group_by("tanggal,nama_waste,jenis_waste,bagian,no_bale,shift,jml_balepress,jml_kg,user,timestamp,status");
        
        //varibel data_stok/input_data berasal dari tabel hasil_balepress
        $tampil_data=$this->db->get('hasil_balepress');
        return $tampil_data->result();
    	}

    	//tampilkan data hasil Balepress secara detail
    	public function panggil_balepress($where)
	    {
	        $this->db->where($where);
	        // $this->db->where('status=0');
	        //varibel data_stok/input_data berasal dari tabel input data banyak
	        $tampil_data=$this->db->get('hasil_balepress');
	        return $tampil_data->result();
    	}


	}

 ?>