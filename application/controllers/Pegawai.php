<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$x['sidebar']="pegawai";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pegawai/pegawai');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$x['sidebar']="pegawai2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pegawai/lihat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$this->load->view('pegawai/cetak',$x);
	}

		public function simpan_pegawai()
	{	
				$data['nama_pegawai'] = $this->input->post('nama_pegawai');
				$data['tempat_lahir'] = $this->input->post('tempat_lahir');
				$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
				$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
				$data['nomor_hp'] = $this->input->post('nomor_hp');
				$data['jabatan'] = $this->input->post('jabatan');
				$data['id_cabang'] = $this->input->post('id_cabang');

								

				
					$result = $this->m_pegawai->add_pegawai($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}


	


		public function update_pegawai()
	{
		$id = $this->input->post('id_pegawai'); 
			

					$data['nama_pegawai'] = $this->input->post('nama_pegawai');
					$data['tempat_lahir'] = $this->input->post('tempat_lahir');
					$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
					$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
					$data['nomor_hp'] = $this->input->post('nomor_hp');
					$data['jabatan'] = $this->input->post('jabatan');
					$data['id_cabang'] = $this->input->post('id_cabang');
					
				
					$result = $this->m_pegawai->edit_pegawai($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}

	function hapus_pegawai(){
		$kode=$this->input->post('kode');
		$this->m_pegawai->hapus_pegawai($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pegawai');
	}
}