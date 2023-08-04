<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_penggajian');
	}

	public function index()
	{
		$x['data_penggajian']=$this->m_penggajian->get_all_penggajian();
		$x['sidebar']="penggajian";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penggajian/penggajian');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_penggajian']=$this->m_penggajian->get_all_penggajian();
		$x['sidebar']="penggajian2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penggajian/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$id_cabang=$this->input->post('id_cabang');
		$dtcabang=$this->db->query("SELECT * FROM cabang where id_cabang='$id_cabang'")->row_array();
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['nama_cabang']=$dtcabang['nama_cabang'];
		$x['data_penggajian']=$this->db->query("SELECT * FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai AND pegawai.id_cabang='$id_cabang' AND date(tanggal_penggajian) BETWEEN '$tgl1' AND '$tgl2' order by tanggal_penggajian asc");
		$this->load->view('penggajian/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_penggajian']=$this->m_penggajian->get_all_penggajian();
		$this->load->view('penggajian/cetak',$x);
	}

		public function simpan_penggajian()
	{
		$gaji_pokok=str_replace(".", "", $this->input->post('gaji_pokok'));
		$lembur=str_replace(".", "", $this->input->post('lembur'));
		$tunjangan=str_replace(".", "", $this->input->post('tunjangan'));
		$hutang=str_replace(".", "", $this->input->post('hutang'));

								$data['id_pegawai'] = $this->input->post('id_pegawai');
								$data['tanggal_penggajian'] = $this->input->post('tanggal_penggajian');
								$data['gaji_pokok'] = $gaji_pokok;
								$data['lembur'] = $lembur;
								$data['tunjangan'] = $tunjangan;
								$data['hutang'] = $hutang;
								$data['gaji_bersih'] = ($gaji_pokok+$lembur+$tunjangan)-$hutang;
								$data['keterangan'] = $this->input->post('keterangan');

								

				
					$result = $this->m_penggajian->add_penggajian($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('penggajian'));
					}
	}


	


		public function update_penggajian()
	{
		$id = $this->input->post('id_penggajian'); 
			

		$gaji_pokok=str_replace(".", "", $this->input->post('gaji_pokok'));
		$lembur=str_replace(".", "", $this->input->post('lembur'));
		$tunjangan=str_replace(".", "", $this->input->post('tunjangan'));
		$hutang=str_replace(".", "", $this->input->post('hutang'));

								$data['id_pegawai'] = $this->input->post('id_pegawai');
								$data['tanggal_penggajian'] = $this->input->post('tanggal_penggajian');
								$data['gaji_pokok'] = $gaji_pokok;
								$data['lembur'] = $lembur;
								$data['tunjangan'] = $tunjangan;
								$data['hutang'] = $hutang;
								$data['gaji_bersih'] = ($gaji_pokok+$lembur+$tunjangan)-$hutang;
								$data['keterangan'] = $this->input->post('keterangan');
					
				
					$result = $this->m_penggajian->edit_penggajian($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('penggajian'));
					}
	}

	function hapus_penggajian(){
		$kode=$this->input->post('kode');
		$this->m_penggajian->hapus_penggajian($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('penggajian');
	}
}