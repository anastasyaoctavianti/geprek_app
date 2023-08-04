<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_barang_masuk');
	}

	public function index()
	{
		$x['data_barang_masuk']=$this->m_barang_masuk->get_all_barang_masuk();
		$x['sidebar']="barang_masuk";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('barang_masuk/barang_masuk');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_barang_masuk']=$this->m_barang_masuk->get_all_barang_masuk();
		$x['sidebar']="barang_masuk2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('barang_masuk/lihat');
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
		$x['data_barang_masuk']=$this->db->query("SELECT * FROM barang_masuk,barang,supplier where barang_masuk.id_barang=barang.id_barang AND supplier.id_supplier=barang_masuk.id_supplier AND barang.id_cabang='$id_cabang' AND date(tanggal_masuk) BETWEEN '$tgl1' AND '$tgl2' order by tanggal_masuk asc");
		$this->load->view('barang_masuk/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_barang_masuk']=$this->m_barang_masuk->get_all_barang_masuk();
		$this->load->view('barang_masuk/cetak',$x);
	}

		public function simpan_barang_masuk()
	{


		$id_barang=$this->input->post('id_barang');
		$data_brg=$this->db->query("SELECT * FROM barang where id_barang='$id_barang'")->row_array();
		$stok_sekarang=$data_brg['stok']+$this->input->post('jumlah_masuk');
		$this->db->query("UPDATE barang SET stok = '$stok_sekarang' WHERE id_barang='$id_barang'");

		$biaya_pengeluaran=str_replace(".", "", $this->input->post('biaya_pengeluaran'));


				$data['id_barang'] = $this->input->post('id_barang');
				$data['id_supplier'] = $this->input->post('id_supplier');
				$data['tanggal_masuk'] = $this->input->post('tanggal_masuk');
				$data['jumlah_masuk'] = $this->input->post('jumlah_masuk');
				$data['biaya_pengeluaran'] = $biaya_pengeluaran;
				$data['keterangan'] = $this->input->post('keterangan');

								

				
					$result = $this->m_barang_masuk->add_barang_masuk($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('barang_masuk'));
					}
	}


	


		public function update_barang_masuk()
	{
		$id = $this->input->post('id_barang_masuk'); 
			

		$biaya_pengeluaran=str_replace(".", "", $this->input->post('biaya_pengeluaran'));

		
				$data['id_barang'] = $this->input->post('id_barang');
				$data['id_supplier'] = $this->input->post('id_supplier');
				$data['tanggal_masuk'] = $this->input->post('tanggal_masuk');
				$data['jumlah_masuk'] = $this->input->post('jumlah_masuk');
				$data['biaya_pengeluaran'] = $biaya_pengeluaran;
				$data['keterangan'] = $this->input->post('keterangan');
						
				
					$result = $this->m_barang_masuk->edit_barang_masuk($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('barang_masuk'));
					}
	}

	function hapus_barang_masuk(){
		$kode=$this->input->post('kode');
		$this->m_barang_masuk->hapus_barang_masuk($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('barang_masuk');
	}
}