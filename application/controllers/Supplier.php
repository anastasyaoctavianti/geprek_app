<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_supplier');
	}

	public function index()
	{
		$x['data_supplier']=$this->m_supplier->get_all_supplier();
		$x['sidebar']="supplier";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('supplier/supplier');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_supplier']=$this->m_supplier->get_all_supplier();
		$x['sidebar']="supplier2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('supplier/lihat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_supplier']=$this->m_supplier->get_all_supplier();
		$this->load->view('supplier/cetak',$x);
	}

		public function simpan_supplier()
	{
				$data['nama_supplier'] = $this->input->post('nama_supplier');
				$data['alamat_supplier'] = $this->input->post('alamat_supplier');
				$data['no_hp_supplier'] = $this->input->post('no_hp_supplier');

								

				
					$result = $this->m_supplier->add_supplier($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('supplier'));
					}
	}


	


		public function update_supplier()
	{
		$id = $this->input->post('id_supplier'); 
			

					$data['nama_supplier'] = $this->input->post('nama_supplier');
					$data['alamat_supplier'] = $this->input->post('alamat_supplier');
					$data['no_hp_supplier'] = $this->input->post('no_hp_supplier');
					
				
					$result = $this->m_supplier->edit_supplier($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('supplier'));
					}
	}

	function hapus_supplier(){
		$kode=$this->input->post('kode');
		$this->m_supplier->hapus_supplier($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('supplier');
	}
}