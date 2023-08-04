<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengiriman');
		$this->load->model('m_penjualan');
		$this->load->model('m_konsumen');
	}

	public function index()
	{
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$x['sidebar']="penjualan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/penjualan');
		$this->load->view('footer');
	}

	public function tambah($id)
	{
		$x['id_penjualan']=$id;
		$x['sidebar']="penjualan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/tambah');
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$x['id_penjualan']=$id;
		$x['sidebar']="penjualan";
		$x['edit_penjualan']=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen AND penjualan.id_penjualan='$id'")->row_array();
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/edit');
		$this->load->view('footer');
	}
	public function cetak2($id)
	{	
		$x['edit_penjualan']=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen AND id_penjualan='$id'")->row_array();
		$this->load->view('penjualan/nota',$x);
	}

	public function lihat()
	{
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$x['sidebar']="penjualan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/lihat');
		$this->load->view('footer');
	}

	public function lihat2()
	{
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$x['sidebar']="penjualan3";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/lihat2');
		$this->load->view('footer');
	}

	public function lihat3()
	{
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$x['sidebar']="penjualan4";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/lihat3');
		$this->load->view('footer');
	}

	public function lihat4()
	{
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$x['sidebar']="penjualan5";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/lihat4');
		$this->load->view('footer');
	}

	public function lihat5()
	{
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$x['sidebar']="penjualan6";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/lihat5');
		$this->load->view('footer');
	}

	public function lihat6()
	{
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$x['sidebar']="penjualan7";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('penjualan/lihat6');
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
		$x['data_penjualan']=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen AND penjualan.id_cabang='$id_cabang' AND date(tanggal_jual) BETWEEN '$tgl1' AND '$tgl2' order by tanggal_jual asc");
		$this->load->view('penjualan/cetak_filter',$x);
	}

	public function filter2()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$id_cabang=$this->input->post('id_cabang');
		$dtcabang=$this->db->query("SELECT * FROM cabang where id_cabang='$id_cabang'")->row_array();
		$x['id_cabang']=$id_cabang;
		$x['nama_cabang']=$dtcabang['nama_cabang'];
		$this->load->view('penjualan/cetak_filter2',$x);
	}
	public function filter22()
	{	
		$tahun=$this->input->post('tahun');
		$bulan=$this->input->post('bulan');
		$x['tahun']=$this->input->post('tahun');
		$x['bulan']=$this->input->post('bulan');
		if ($this->input->post('bulan')=="Januari") {
			$x['bln']=1;
		}elseif ($this->input->post('bulan')=="Februari") {
			$x['bln']=2;
		}elseif ($this->input->post('bulan')=="Maret") {
			$x['bln']=3;
		}elseif ($this->input->post('bulan')=="April") {
			$x['bln']=4;
		}elseif ($this->input->post('bulan')=="Mei") {
			$x['bln']=5;
		}elseif ($this->input->post('bulan')=="Juni") {
			$x['bln']=6;
		}elseif ($this->input->post('bulan')=="Juli") {
			$x['bln']=7;
		}elseif ($this->input->post('bulan')=="Agustus") {
			$x['bln']=8;
		}elseif ($this->input->post('bulan')=="September") {
			$x['bln']=9;
		}elseif ($this->input->post('bulan')=="Oktober") {
			$x['bln']=10;
		}elseif ($this->input->post('bulan')=="November") {
			$x['bln']=11;
		}elseif ($this->input->post('bulan')=="Desember") {
			$x['bln']=12;
		}

		$id_cabang=$this->input->post('id_cabang');
		$dtcabang=$this->db->query("SELECT * FROM cabang where id_cabang='$id_cabang'")->row_array();
		$x['id_cabang']=$id_cabang;
		$x['nama_cabang']=$dtcabang['nama_cabang'];

		
		$this->load->view('penjualan/cetak_filter22',$x);
	}
	public function filter3()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$this->load->view('penjualan/cetak_filter3',$x);
	}
	public function filter4()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$id_cabang=$this->input->post('id_cabang');
		$dtcabang=$this->db->query("SELECT * FROM cabang where id_cabang='$id_cabang'")->row_array();
		$x['id_cabang']=$id_cabang;
		$x['nama_cabang']=$dtcabang['nama_cabang'];
		$this->load->view('penjualan/cetak_filter4',$x);
	}
	public function filter5()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$this->load->view('penjualan/cetak_filter5',$x);
	}
	public function filter6()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$id_cabang=$this->input->post('id_cabang');
		$dtcabang=$this->db->query("SELECT * FROM cabang where id_cabang='$id_cabang'")->row_array();
		$x['id_cabang']=$id_cabang;
		$x['nama_cabang']=$dtcabang['nama_cabang'];
		$this->load->view('penjualan/cetak_filter6',$x);
	}

	public function cetak()
	{	
		$x['data_penjualan']=$this->m_penjualan->get_all_penjualan();
		$this->load->view('penjualan/cetak',$x);
	}

		public function simpan_barang()
	{	
			$id_penjualan=$this->input->post('id_penjualan');
			if(empty($this->input->post('id_pegawai'))){
				$this->session->set_flashdata('gll', 'Record is Added Successfully!');
				redirect(base_url('penjualan/tambah/'.$id_penjualan));
			}
			if(empty($this->input->post('id_cabang'))){
				$this->session->set_flashdata('gll', 'Record is Added Successfully!');
				redirect(base_url('penjualan/tambah/'.$id_penjualan));
			}
			if(empty($this->input->post('id_konsumen'))){
				$this->session->set_flashdata('gll', 'Record is Added Successfully!');
				redirect(base_url('penjualan/tambah/'.$id_penjualan));
			}
			$data2['id_penjualan'] = $this->input->post('id_penjualan');
			$data2['id_pegawai'] = $this->input->post('id_pegawai');
			$data2['id_cabang'] = $this->input->post('id_cabang');
			$data2['id_barang'] = $this->input->post('id_barang');
			$data2['id_konsumen'] = $this->input->post('id_konsumen');
			$data2['jumlah_jual'] = $this->input->post('jumlah_jual');
			$data2['tanggal_jual'] = $this->input->post('tanggal_jual');
			$this->db->insert('barang_list', $data2);
			redirect(base_url('penjualan/tambah/'.$id_penjualan));
	}

		public function simpan_barang2()
	{
			$id_penjualan=$this->input->post('id_penjualan');
			$data2['id_penjualan'] = $this->input->post('id_penjualan');
			$data2['id_pegawai'] = $this->input->post('id_pegawai');
			$data2['id_barang'] = $this->input->post('id_barang');
			$data2['id_cabang'] = $this->input->post('id_cabang');
			$data2['id_konsumen'] = $this->input->post('id_konsumen');
			$data2['jumlah_jual'] = $this->input->post('jumlah_jual');
			$data2['tanggal_jual'] = $this->input->post('tanggal_jual');

			$dt_barang=$this->db->query("SELECT * FROM barang_list where id_penjualan='$id_penjualan'")->num_rows();
			if($dt_barang>0){
				$data3['tanggal_jual'] = $this->input->post('tanggal_jual');
				$this->db->where("id_penjualan", $id_penjualan);
				$this->db->update("barang_list", $data3);
				$this->m_penjualan->edit_penjualan($data3,$id_penjualan);
			}

			$this->db->insert('barang_list', $data2);
			redirect(base_url('penjualan/edit/'.$id_penjualan));
			
			
	}

		public function simpan_penjualan()
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
				$data["id_pegawai"] = $this->input->post('id_pegawai');
				$data["id_cabang"] = $this->input->post('id_cabang');
				$data["tanggal_jual"] = $this->input->post('tanggal_jual');
				$data["id_konsumen"] = $this->input->post('id_konsumen');
				$grandtotal=str_replace(".", "", $this->input->post('grandtotal'));
				$diskon=str_replace(".", "", $this->input->post('diskon'));
				$bayar=str_replace(".", "", $this->input->post('bayar'));
				$kembalian=str_replace(".", "", $this->input->post('kembalian'));
				$data["total"] = $grandtotal;
				$data["diskon"] = $diskon;
				$data["bayar"] = $bayar;
				$data["kembalian"] = $kembalian;

				
				
					$result = $this->m_penjualan->add_penjualan($data);

					if (!empty($this->input->post('alamat_penerima'))) {
								$data2['id_penjualan'] = $id_penjualan;
								$data2['id_pegawai'] = $this->input->post('id_kurir');
								$data2['tanggal_pengiriman'] = $this->input->post('tanggal_pengiriman');
								$data2['alamat_penerima'] = $this->input->post('alamat_penerima');
								$data2['status_pengiriman'] = $this->input->post('status_pengiriman');
								$this->m_pengiriman->add_pengiriman($data2);
						}



					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('penjualan'));
					}
	}


	


		public function update_penjualan()
	{
		$id = $this->input->post('id_penjualan'); 
			

					
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
				$data["id_pegawai"] = $this->input->post('id_pegawai');
				$data["tanggal_jual"] = $this->input->post('tanggal_jual');
				$data["id_konsumen"] = $this->input->post('id_konsumen');
					$grandtotal=str_replace(".", "", $this->input->post('grandtotal'));
		$diskon=str_replace(".", "", $this->input->post('diskon'));
		$bayar=str_replace(".", "", $this->input->post('bayar'));
		$kembalian=str_replace(".", "", $this->input->post('kembalian'));
		$data["total"] = $grandtotal;
		$data["diskon"] = $diskon;
		$data["bayar"] = $bayar;
		$data["kembalian"] = $kembalian;


						if (!empty($this->input->post('alamat_penerima'))) {
								$data2['id_penjualan'] = $id_penjualan;
								$id_pengiriman = $this->input->post('id_pengiriman');
								$data2['id_pegawai'] = $this->input->post('id_kurir');
								$data2['tanggal_pengiriman'] = $this->input->post('tanggal_pengiriman');
								$data2['alamat_penerima'] = $this->input->post('alamat_penerima');
								$data2['status_pengiriman'] = $this->input->post('status_pengiriman');
								$this->m_pengiriman->edit_pengiriman($data2,$id_pengiriman);
						}
					
				
					$result = $this->m_penjualan->edit_penjualan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('penjualan'));
					}
	}

	function hapus_penjualan(){
		$kode=$this->input->post('kode');
		$id_penjualan=$this->input->post('kode');
		


		$this->db->query("DELETE FROM barang_list where id_penjualan='$kode'");
		$this->m_penjualan->hapus_penjualan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('penjualan');
	}

	function hapusperbarang($id_barang,$id_penjualan,$stat){
		$this->db->query("DELETE FROM barang_list where id_barang='$id_barang' AND id_penjualan='$id_penjualan'");
		redirect(base_url('penjualan/'.$stat.'/'.$id_penjualan));
	}

	public function fungsitambah(){
        $id_barang = $this->input->post('id_barang');
        $barang = $this->db->query("SELECT * FROM menu_makanan where id_menu_makanan = '$id_barang' ")->row();
        $lists = "<input readonly id='harga_jual1' value='".number_format((int)$barang->harga,0,',','.')."' name='harga' type='text' class='form-control'>";
        $callback = array('list_barang'=>$lists); 
        echo json_encode($callback); 
    }

    	public function konfir()
	{
		$id_penjualan=$this->input->post('id_penjualan');
		$dt_penjualan=$this->db->query("SELECT * FROM penjualan,barang,konsumen where  penjualan.id_barang=barang.id_barang AND penjualan.id_konsumen=konsumen.id_konsumen AND penjualan.id_penjualan='$id_penjualan'")->row_array();
	
// 			$status_pembelian = $this->input->post('status_pembelian');
// 		$userkey = 'fbb13a7909ae';
// $passkey = '748411ab05590d3e375c4b66';
// $telepon = $dt_penjualan['no_hp'];
// $message = 'PEMBELIAN ANDA DARI MEGA TANI MARTAPURA '.$status_pembelian;
// $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
// $curlHandle = curl_init();
// curl_setopt($curlHandle, CURLOPT_URL, $url);
// curl_setopt($curlHandle, CURLOPT_HEADER, 0);
// curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
// curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
// curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
// curl_setopt($curlHandle, CURLOPT_POST, 1);
// curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
//     'userkey' => $userkey,
//     'passkey' => $passkey,
//     'to' => $telepon,
//     'message' => $message
// ));
// $results = json_decode(curl_exec($curlHandle), true);
// curl_close($curlHandle);
						
								$data['status_pembelian'] = $this->input->post('status_pembelian');
								if (!empty($this->input->post('id_kurir'))) {
									$data2['id_penjualan'] = $this->input->post('id_penjualan');
									$data2['id_pegawai'] = $this->input->post('id_kurir');
									$data2['tanggal_pengiriman'] = $this->input->post('tanggal_pengiriman');
									$data2['alamat_penerima'] = $this->input->post('alamat_penerima');
									$data2['status_pengiriman'] = $this->input->post('status_pengiriman');
									$this->m_pengiriman->add_pengiriman($data2);
								}
						

				
					$result = $this->m_penjualan->edit_penjualan($data,$id_penjualan);
					if($result){
						$this->session->set_flashdata('berhasil_edit2', 'Record is Added Successfully!');
						redirect(base_url('penjualan'));
					}
			
	}
}