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
	    	$this->db->select("nama_waste,jenis_waste,bagian,asal_waste,no_karung,shift,jml_karung,user,SUM(jml_kg) as berat,SUM(id) as id,tanggal,timestamp,status");
	    
        	$this->db->group_by("nama_waste,jenis_waste,bagian,asal_waste,no_karung,shift,jml_karung,user,tanggal,timestamp,status");
        
        //varibel data_stok/input_data berasal dari tabel hasil_bpw
        $tampil_data=$this->db->get('waste_produksi');
        return $tampil_data->result();
    	}

    	//tampilkan data input_banyak secara detail
    	public function panggil_fungsi($where)
	    {
	        $this->db->where($where);
	        // $this->db->where('status=0');
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

	}

 ?>