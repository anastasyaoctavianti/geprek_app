<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	// public function index()
	// {
	// 	$this->load->view('home');
	// }

		public function simpan_barang()
	{
		

			$id_penjualan=$this->input->post('id_penjualan');
			$data2['id_penjualan'] = $this->input->post('id_penjualan');
			$data2['id_pegawai'] = "1";
			$data2['id_cabang'] =  "1";
			$data2['id_barang'] = $this->input->post('id_barang');
			$data2['jumlah_jual'] = $this->input->post('jumlah_jual');
			$data2['id_konsumen'] = $this->input->post('id_konsumen');

			$this->db->insert('barang_list', $data2);
			$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
			redirect(base_url('dashboard'));
			
			
	}

	
}


