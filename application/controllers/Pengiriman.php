<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengiriman');
	}

	public function index()
	{
		$x['data_pengiriman']=$this->m_pengiriman->get_all_pengiriman();
		$x['sidebar']="pengiriman";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengiriman/pengiriman');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_pengiriman']=$this->m_pengiriman->get_all_pengiriman();
		$this->load->view('pengiriman/cetak',$x);
	}

	public function cetak2($id)
	{	
		$x['edit_pengiriman']=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen,pengiriman where penjualan.id_barang=menu_makanan.id_menu_makanan AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai AND id_pengiriman='$id'")->row_array();
		$this->load->view('pengiriman/surat_jalan',$x);
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$status_pengiriman=$this->input->post('status_pengiriman');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['status_pengiriman']=$this->input->post('status_pengiriman');
		if ($status_pengiriman=="SEMUA") {
			$data['data_pengiriman'] = $this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen,pengiriman where penjualan.id_barang=menu_makanan.id_menu_makanan AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai AND date(tanggal_pengiriman) BETWEEN '$tgl1' AND '$tgl2' ");
		}else{
			$data['data_pengiriman'] = $this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen,pengiriman where penjualan.id_barang=menu_makanan.id_menu_makanan AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai AND status_pengiriman='$status_pengiriman' AND date(tanggal_pengiriman) BETWEEN '$tgl1' AND '$tgl2' ");
		}
		
		$this->load->view('pengiriman/cetak_filter',$data);
	}

	public function halaman_print(){
		$x['data_pengiriman']=$this->m_pengiriman->get_all_pengiriman();
		$x['sidebar']="pengiriman2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengiriman/halaman_print');
		$this->load->view('footer');
	}

		public function simpan_pengiriman()
	{

				
								$data['id_penjualan'] = $this->input->post('id_penjualan');
								$data['id_kurir'] = $this->input->post('id_kurir');
								$data['tanggal_pengiriman'] = $this->input->post('tanggal_pengiriman');
								$data['alamat_penerima'] = $this->input->post('alamat_penerima');
								$data['status_pengiriman'] = $this->input->post('status_pengiriman');
					
				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_bukti_pengiriman']['name']))
				{
				if($this->upload->do_upload('foto_bukti_pengiriman'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data['foto_bukti_pengiriman'] = $dok;
							

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengiriman');
					}
				}


				
					$result = $this->m_pengiriman->add_pengiriman($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pengiriman'));
					}
	}


	


		public function update_pengiriman()
	{
		$id = $this->input->post('id_pengiriman'); 
		$id_penjualan = $this->input->post('id_penjualan'); 
			

			if($this->input->post('status_pengiriman')=="Telah Sampai"){
				$this->db->query("UPDATE penjualan set status_pembelian='SELESAI' WHERE id_penjualan='$id_penjualan'");
			}
								$data['tanggal_pengiriman'] = $this->input->post('tanggal_pengiriman');
								$data['alamat_penerima'] = $this->input->post('alamat_penerima');
								$data['status_pengiriman'] = $this->input->post('status_pengiriman');
								$data['catatan_kurir'] = $this->input->post('catatan_kurir');


				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_bukti_pengiriman']['name']))
				{
				if($this->upload->do_upload('foto_bukti_pengiriman'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data['foto_bukti_pengiriman'] = $dok;
							

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengiriman');
					}
				}
				
					$result = $this->m_pengiriman->edit_pengiriman($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pengiriman'));
					}
			
	}

	function hapus_pengiriman(){
		$kode=$this->input->post('kode');
		$this->m_pengiriman->hapus_pengiriman($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pengiriman');
	}
}