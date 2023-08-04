<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complement_karyawan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_complement_karyawan');
	}

	public function index()
	{
		$x['data_complement_karyawan']=$this->m_complement_karyawan->get_all_complement_karyawan();
		$x['sidebar']="complement_karyawan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/complement_karyawan');
		$this->load->view('footer');
	}

	public function tambah($id)
	{
		$x['id_complement_karyawan']=$id;
		$x['sidebar']="complement_karyawan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/tambah');
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$x['id_complement_karyawan']=$id;
		$x['sidebar']="complement_karyawan";
		$x['edit_complement_karyawan']=$this->db->query("SELECT * FROM complement_karyawan,menu_makanan where  complement_karyawan.id_menu_makanan=menu_makanan.id_menu_makanan AND complement_karyawan.id_complement_karyawan='$id'")->row_array();
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/edit');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_complement_karyawan']=$this->m_complement_karyawan->get_all_complement_karyawan();
		$x['sidebar']="complement_karyawan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/lihat');
		$this->load->view('footer');
	}

			public function simpan_barang()
	{	
			$id_complement_karyawan=$this->input->post('id_complement_karyawan');
			$data2['id_complement_karyawan'] = $this->input->post('id_complement_karyawan');
			$data2['tanggal_ambil'] = $this->input->post('tanggal_ambil');
			$data2['id_menu_makanan'] = $this->input->post('id_menu_makanan');
			$data2['id_cabang'] = $this->input->post('id_cabang');
			$data2['jumlah_ambil'] = $this->input->post('jumlah_ambil');
			$this->db->insert('barang_list2', $data2);
			redirect(base_url('complement_karyawan/tambah/'.$id_complement_karyawan));
	}

		public function simpan_barang2()
	{
			$id_complement_karyawan=$this->input->post('id_complement_karyawan');
			$data2['id_complement_karyawan'] = $this->input->post('id_complement_karyawan');
			$data2['tanggal_ambil'] = $this->input->post('tanggal_ambil');
			$data2['id_menu_makanan'] = $this->input->post('id_menu_makanan');
			$data2['id_cabang'] = $this->input->post('id_cabang');
			$data2['jumlah_ambil'] = $this->input->post('jumlah_ambil');

			$dt_barang=$this->db->query("SELECT * FROM barang_list2 where id_complement_karyawan='$id_complement_karyawan'")->num_rows();
			if($dt_barang>0){
				$data3['tanggal_ambil'] = $this->input->post('tanggal_ambil');
				$this->db->where("id_complement_karyawan", $id_complement_karyawan);
				$this->db->update("barang_list2", $data3);
			}
			$this->m_complement_karyawan->edit_complement_karyawan($data3,$id_complement_karyawan);

			$this->db->insert('barang_list2', $data2);
			redirect(base_url('complement_karyawan/edit/'.$id_complement_karyawan));
			
			
	}

	public function lihat2()
	{
		$x['data_complement_karyawan']=$this->m_complement_karyawan->get_all_complement_karyawan();
		$x['sidebar']="complement_karyawan3";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/lihat2');
		$this->load->view('footer');
	}

	public function lihat3()
	{
		$x['data_complement_karyawan']=$this->m_complement_karyawan->get_all_complement_karyawan();
		$x['sidebar']="complement_karyawan4";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/lihat3');
		$this->load->view('footer');
	}

	public function lihat4()
	{
		$x['data_complement_karyawan']=$this->m_complement_karyawan->get_all_complement_karyawan();
		$x['sidebar']="complement_karyawan5";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/lihat4');
		$this->load->view('footer');
	}

	public function lihat5()
	{
		$x['data_complement_karyawan']=$this->m_complement_karyawan->get_all_complement_karyawan();
		$x['sidebar']="complement_karyawan6";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('complement_karyawan/lihat5');
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
		$x['data_complement_karyawan']=$this->db->query("SELECT * FROM complement_karyawan,menu_makanan,cabang where complement_karyawan.id_menu_makanan=menu_makanan.id_menu_makanan AND complement_karyawan.id_cabang=cabang.id_cabang AND complement_karyawan.id_cabang='$id_cabang' AND date(tanggal_ambil) BETWEEN '$tgl1' AND '$tgl2' order by tanggal_ambil asc");
		$this->load->view('complement_karyawan/cetak_filter',$x);
	}

	public function filter2()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$this->load->view('complement_karyawan/cetak_filter2',$x);
	}
	public function filter3()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$this->load->view('complement_karyawan/cetak_filter3',$x);
	}
	public function filter4()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$this->load->view('complement_karyawan/cetak_filter4',$x);
	}
	public function filter5()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$this->load->view('complement_karyawan/cetak_filter5',$x);
	}

	public function cetak()
	{	
		$x['data_complement_karyawan']=$this->m_complement_karyawan->get_all_complement_karyawan();
		$this->load->view('complement_karyawan/cetak',$x);
	}

		public function simpan_complement_karyawan()
	{


		$id_complement_karyawan=$this->input->post('id_complement_karyawan');
		$nn=0;
		$id_menu_makanan1=0;
		$jumlah_ambil1=0;
		$id_menu_makanan2=0;
		$jumlah_ambil2=0;
		$id_menu_makanan3=0;
		$jumlah_ambil3=0;
		foreach ($this->db->query("SELECT * FROM barang_list2 where id_complement_karyawan='$id_complement_karyawan'")->result_array() as $key) {
			if($nn==0){
				$id_menu_makanan=$key['id_menu_makanan'];
				$jumlah_ambil=$key['jumlah_ambil'];
			}
			if($nn==1){
				$id_menu_makanan1=$key['id_menu_makanan'];
				$jumlah_ambil1=$key['jumlah_ambil'];
			}
			if($nn==2){
				$id_menu_makanan2=$key['id_menu_makanan'];
				$jumlah_ambil2=$key['jumlah_ambil'];
			}
			if($nn==3){
				$id_menu_makanan3=$key['id_menu_makanan'];
				$jumlah_ambil3=$key['jumlah_ambil'];
			}
			$nn=$nn+1;
		}
		

		$id_menu_makanan=$id_menu_makanan;
		$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan'")->row_array();
		$totall=$data_brg['harga']*$jumlah_ambil;

		

		if(!empty($id_menu_makanan1)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan1'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_ambil1);
			$data["id_menu_makanan1"] = $id_menu_makanan1;
			$data["jumlah_ambil1"] = $jumlah_ambil1;
		}

		if(!empty($id_menu_makanan2)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan2'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_ambil2);
			$data["id_menu_makanan2"] = $id_menu_makanan2;
			$data["jumlah_ambil2"] = $jumlah_ambil2;
		}

		if(!empty($id_menu_makanan3)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan3'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_ambil3);
			$data["id_menu_makanan3"] = $id_menu_makanan3;
			$data["jumlah_ambil3"] = $jumlah_ambil3;
		}

		
				$data["id_complement_karyawan"] = $id_complement_karyawan;
				$data["jumlah_ambil"] = $jumlah_ambil;
				$data["id_menu_makanan"] = $id_menu_makanan;
				$data["tanggal_ambil"] = $this->input->post('tanggal_ambil');
				$data["id_cabang"] = $this->input->post('id_cabang');
				$data["keterangan"] = $this->input->post('keterangan');
				$grandtotal=str_replace(".", "", $this->input->post('grandtotal'));
				$data["total"] = $grandtotal;

								

				
					$result = $this->m_complement_karyawan->add_complement_karyawan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('complement_karyawan'));
					}
	}


	


		public function update_complement_karyawan()
	{
		$id = $this->input->post('id_complement_karyawan'); 
			

			$id_complement_karyawan=$this->input->post('id_complement_karyawan');
		$nn=0;
		$id_menu_makanan1=0;
		$jumlah_ambil1=0;
		$id_menu_makanan2=0;
		$jumlah_ambil2=0;
		$id_menu_makanan3=0;
		$jumlah_ambil3=0;
		foreach ($this->db->query("SELECT * FROM barang_list2 where id_complement_karyawan='$id_complement_karyawan'")->result_array() as $key) {
			if($nn==0){
				$id_menu_makanan=$key['id_menu_makanan'];
				$jumlah_ambil=$key['jumlah_ambil'];
			}
			if($nn==1){
				$id_menu_makanan1=$key['id_menu_makanan'];
				$jumlah_ambil1=$key['jumlah_ambil'];
			}
			if($nn==2){
				$id_menu_makanan2=$key['id_menu_makanan'];
				$jumlah_ambil2=$key['jumlah_ambil'];
			}
			if($nn==3){
				$id_menu_makanan3=$key['id_menu_makanan'];
				$jumlah_ambil3=$key['jumlah_ambil'];
			}
			$nn=$nn+1;
		}
		

		$id_menu_makanan=$id_menu_makanan;
		$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan'")->row_array();
		$totall=$data_brg['harga']*$jumlah_ambil;

		

		if(!empty($id_menu_makanan1)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan1'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_ambil1);
			$data["id_menu_makanan1"] = $id_menu_makanan1;
			$data["jumlah_ambil1"] = $jumlah_ambil1;
		}

		if(!empty($id_menu_makanan2)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan2'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_ambil2);
			$data["id_menu_makanan2"] = $id_menu_makanan2;
			$data["jumlah_ambil2"] = $jumlah_ambil2;
		}

		if(!empty($id_menu_makanan3)){
			$data_brg=$this->db->query("SELECT * FROM menu_makanan where id_menu_makanan='$id_menu_makanan3'")->row_array();
			$totall=$totall+($data_brg['harga']*$jumlah_ambil3);
			$data["id_menu_makanan3"] = $id_menu_makanan3;
			$data["jumlah_ambil3"] = $jumlah_ambil3;
		}

		
				$data["id_complement_karyawan"] = $id_complement_karyawan;
				$data["jumlah_ambil"] = $jumlah_ambil;
				$data["id_menu_makanan"] = $id_menu_makanan;
				$data["tanggal_ambil"] = $this->input->post('tanggal_ambil');
				$data["keterangan"] = $this->input->post('keterangan');
				$grandtotal=str_replace(".", "", $this->input->post('grandtotal'));
				$data["total"] = $grandtotal;
					

		
			$data3['tanggal_ambil'] = $this->input->post('tanggal_ambil');
			$this->db->where("id_complement_karyawan", $id_complement_karyawan);
			$this->db->update("barang_list2", $data3);


					$result = $this->m_complement_karyawan->edit_complement_karyawan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('complement_karyawan'));
					}
	}

	function hapus_complement_karyawan(){
		$kode=$this->input->post('kode');
		$id_complement_karyawan=$this->input->post('kode');
		


		$this->db->query("DELETE FROM barang_list2 where id_complement_karyawan='$kode'");
		$this->m_complement_karyawan->hapus_complement_karyawan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('complement_karyawan');
	}

	function hapusperbarang($id_barang,$id_complement_karyawan,$stat){
		$this->db->query("DELETE FROM barang_list2 where id_menu_makanan='$id_barang' AND id_complement_karyawan='$id_complement_karyawan'");
		redirect(base_url('complement_karyawan/'.$stat.'/'.$id_complement_karyawan));
	}
}