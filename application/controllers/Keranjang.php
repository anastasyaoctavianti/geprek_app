<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

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
		$x['sidebar']="keranjang";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('keranjang');
		$this->load->view('footer');
	}

	function hapusperbarang($id_barang,$id_penjualan,$stat){
		$this->db->query("DELETE FROM barang_list where id_barang='$id_barang' AND id_penjualan='$id_penjualan'");
		$this->session->set_flashdata('berhasil_hapus', 'Record is Added Successfully!');
		redirect(base_url('keranjang'));
	}

	

		public function konfir()
	{

		$id_penjualan=$this->input->post('id_penjualan');
		$nn=0;
		$id_barang1=0;
		$jumlah_jual1=0;
		$id_barang2=0;
		$jumlah_jual2=0;
		$id_barang3=0;
		$jumlah_jual3=0;
		foreach ($this->db->query("SELECT * FROM barang_list where id_penjualan='$id_penjualan'")->result_array() as $key) {
			if($nn==0){
				$id_barang=$key['id_barang'];
				$jumlah_jual=$key['jumlah_jual'];
			}
			if($nn==1){
				$id_barang1=$key['id_barang'];
				$jumlah_jual1=$key['jumlah_jual'];
			}
			if($nn==2){
				$id_barang2=$key['id_barang'];
				$jumlah_jual2=$key['jumlah_jual'];
			}
			if($nn==3){
				$id_barang3=$key['id_barang'];
				$jumlah_jual3=$key['jumlah_jual'];
			}
			$nn=$nn+1;
		}
		

		$id_barang=$id_barang;
		$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_barang'")->row_array();
		$totall=$data_brg['harga']*$jumlah_jual;

		

		if(!empty($id_barang1)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_barang1'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_jual1);
			$data["id_barang1"] = $id_barang1;
			$data["jumlah_jual1"] = $jumlah_jual1;
		}

		if(!empty($id_barang2)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_barang2'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_jual2);
			$data["id_barang2"] = $id_barang2;
			$data["jumlah_jual2"] = $jumlah_jual2;
		}

		if(!empty($id_barang3)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_barang3'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_jual3);
			$data["id_barang3"] = $id_barang3;
			$data["jumlah_jual3"] = $jumlah_jual3;
		}

		
				$data["id_penjualan"] = $id_penjualan;
				$data["jumlah_jual"] = $jumlah_jual;
				$data["id_barang"] = $id_barang;
				$data["id_pegawai"] = "1";
				$data["id_cabang"] = $this->input->post('id_cabang');
				$data["id_konsumen"] = $this->input->post('id_konsumen');
				$data["tanggal_jual"] = $this->input->post('tanggal_jual');
		$grandtotal=str_replace(".", "", $this->input->post('grandtotal'));
		$diskon=str_replace(".", "", $this->input->post('diskon'));
		$bayar=str_replace(".", "", $this->input->post('bayar'));
		$kembalian=str_replace(".", "", $this->input->post('kembalian'));
		$data["total"] = $grandtotal;
		$data["diskon"] = $diskon;
		$data["bayar"] = $bayar;
		$data["kembalian"] = $kembalian;
		$data["status_pembelian"] = "MENUNGGU KONFIRMASI";
		$data["metode_pembayaran"] = $this->input->post('metode_pembayaran');

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['bukti_pembayaran']['name']))
				{
				if($this->upload->do_upload('bukti_pembayaran'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data['bukti_pembayaran'] = $dok;
							

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('keranjang');
					}
				}
				
					$result = $this->m_penjualan->add_penjualan($data);


								// $data2['id_penjualan'] = $id_penjualan;
								// $data2['id_kurir'] = $this->input->post('id_kurir');
								// $data2['tanggal_pengiriman'] = $this->input->post('tanggal_pengiriman');
								// $data2['alamat_penerima'] = $this->input->post('alamat_penerima');
								// $data2['status_pengiriman'] = $this->input->post('status_pengiriman');
								// $this->m_pengiriman->add_pengiriman($data2);

					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('transaksi'));
					}
	}

	
}
