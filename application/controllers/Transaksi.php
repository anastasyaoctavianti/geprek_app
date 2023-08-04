<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_penjualan');
		$this->load->model('m_pengiriman');
	}

	public function index()
	{
		$x['sidebar']="transaksi";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('transaksi');
		$this->load->view('footer');
	}

	public function konfir()
	{
		$id_penjualan=$this->input->post('id_penjualan');
		$id_pengiriman=$this->input->post('id_pengiriman');

		
			$data["status_pembelian"] = "DIPROSES";
			$this->m_penjualan->edit_penjualan($data,$id_penjualan);

			
			$data2['status_pengiriman'] = "Telah Sampai";
			$this->m_pengiriman->edit_pengiriman($data2,$id_pengiriman);
								
			$this->session->set_flashdata('berhasil_simpan2', 'Record is Added Successfully!');
			redirect(base_url('transaksi'));
	}

	
}
