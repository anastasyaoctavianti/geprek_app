<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengeluaran');
	}

	public function index()
	{
		$x['data_pengeluaran']=$this->m_pengeluaran->get_all_pengeluaran();
		$x['sidebar']="pengeluaran";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengeluaran/pengeluaran');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_pengeluaran']=$this->m_pengeluaran->get_all_pengeluaran();
		$x['sidebar']="pengeluaran2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengeluaran/lihat');
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
		$x['data_pengeluaran']=$this->db->query("SELECT * FROM pengeluaran,cabang where pengeluaran.id_cabang=cabang.id_cabang AND pengeluaran.id_cabang='$id_cabang' AND date(tanggal_pengeluaran) BETWEEN '$tgl1' AND '$tgl2' order by tanggal_pengeluaran asc");
		$this->load->view('pengeluaran/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_pengeluaran']=$this->m_pengeluaran->get_all_pengeluaran();
		$this->load->view('pengeluaran/cetak',$x);
	}

		public function simpan_pengeluaran()
	{
		$biaya_pengeluaran=str_replace(".", "", $this->input->post('biaya_pengeluaran'));
								$data['nama_pengeluaran'] = $this->input->post('nama_pengeluaran');
								$data['biaya_pengeluaran'] = $biaya_pengeluaran;
								$data['tanggal_pengeluaran'] = $this->input->post('tanggal_pengeluaran');
								$data['keterangan_lain'] = $this->input->post('keterangan_lain');
								$data['id_cabang'] = $this->input->post('id_cabang');

								

				
					$result = $this->m_pengeluaran->add_pengeluaran($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pengeluaran'));
					}
	}


	


		public function update_pengeluaran()
	{
		$id = $this->input->post('id_pengeluaran'); 
			

		$biaya_pengeluaran=str_replace(".", "", $this->input->post('biaya_pengeluaran'));
								$data['nama_pengeluaran'] = $this->input->post('nama_pengeluaran');
								$data['biaya_pengeluaran'] = $biaya_pengeluaran;
								$data['tanggal_pengeluaran'] = $this->input->post('tanggal_pengeluaran');
								$data['keterangan_lain'] = $this->input->post('keterangan_lain');
								$data['id_cabang'] = $this->input->post('id_cabang');
					
				
					$result = $this->m_pengeluaran->edit_pengeluaran($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pengeluaran'));
					}
	}

	function hapus_pengeluaran(){
		$kode=$this->input->post('kode');
		$this->m_pengeluaran->hapus_pengeluaran($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pengeluaran');
	}
}