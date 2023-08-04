<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penggunaan_barang extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_penggunaan_barang');
	}

	public function index()
	{
		$x['data_penggunaan_barang']=$this->m_penggunaan_barang->get_all_penggunaan_barang();
		$x['sidebar']="penggunaan_barang";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penggunaan_barang/penggunaan_barang');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_penggunaan_barang']=$this->m_penggunaan_barang->get_all_penggunaan_barang();
		$x['sidebar']="penggunaan_barang2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penggunaan_barang/lihat');
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
		$x['data_penggunaan_barang']=$this->db->query("SELECT * FROM penggunaan_barang,barang where penggunaan_barang.id_barang=barang.id_barang AND barang.id_cabang='$id_cabang' AND date(tanggal) BETWEEN '$tgl1' AND '$tgl2' order by tanggal asc");
		$this->load->view('penggunaan_barang/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_penggunaan_barang']=$this->m_penggunaan_barang->get_all_penggunaan_barang();
		$this->load->view('penggunaan_barang/cetak',$x);
	}

		public function simpan_penggunaan_barang()
	{


		$id_barang=$this->input->post('id_barang');
		$data_brg=$this->db->query("SELECT * FROM barang where id_barang='$id_barang'")->row_array();
		$stok_sekarang=$data_brg['stok']-$this->input->post('jumlah_penggunaan');
		$this->db->query("UPDATE barang SET stok = '$stok_sekarang' WHERE id_barang='$id_barang'");



				$data['id_barang'] = $this->input->post('id_barang');
				$data['tanggal'] = $this->input->post('tanggal');
				$data['jumlah_penggunaan'] = $this->input->post('jumlah_penggunaan');
				$data['keterangan'] = $this->input->post('keterangan');

								

				
					$result = $this->m_penggunaan_barang->add_penggunaan_barang($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('penggunaan_barang'));
					}
	}


	


		public function update_penggunaan_barang()
	{
		$id = $this->input->post('id_penggunaan_barang'); 
			

		$biaya_pengeluaran=str_replace(".", "", $this->input->post('biaya_pengeluaran'));

		
				$data['id_barang'] = $this->input->post('id_barang');
				$data['tanggal'] = $this->input->post('tanggal');
				$data['jumlah_penggunaan'] = $this->input->post('jumlah_penggunaan');
				$data['keterangan'] = $this->input->post('keterangan');
						
				
					$result = $this->m_penggunaan_barang->edit_penggunaan_barang($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('penggunaan_barang'));
					}
	}

	function hapus_penggunaan_barang(){
		$kode=$this->input->post('kode');
		$this->m_penggunaan_barang->hapus_penggunaan_barang($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('penggunaan_barang');
	}
}