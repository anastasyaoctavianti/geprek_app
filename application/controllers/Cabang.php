<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_cabang');
	}

	public function index()
	{
		$x['data_cabang']=$this->m_cabang->get_all_cabang();
		$x['sidebar']="cabang";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('cabang/cabang');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_cabang']=$this->m_cabang->get_all_cabang();
		$x['sidebar']="cabang2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('cabang/lihat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_cabang']=$this->m_cabang->get_all_cabang();
		$this->load->view('cabang/cetak',$x);
	}

		public function simpan_cabang()
	{
				$data['nama_cabang'] = $this->input->post('nama_cabang');
				$data['alamat_cabang'] = $this->input->post('alamat_cabang');
				$data['no_hp_cabang'] = $this->input->post('no_hp_cabang');

								

				
					$result = $this->m_cabang->add_cabang($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('cabang'));
					}
	}


	


		public function update_cabang()
	{
		$id = $this->input->post('id_cabang'); 
			

					$data['nama_cabang'] = $this->input->post('nama_cabang');
					$data['alamat_cabang'] = $this->input->post('alamat_cabang');
					$data['no_hp_cabang'] = $this->input->post('no_hp_cabang');
					
				
					$result = $this->m_cabang->edit_cabang($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('cabang'));
					}
	}

	function hapus_cabang(){
		$kode=$this->input->post('kode');
		$this->m_cabang->hapus_cabang($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('cabang');
	}
}