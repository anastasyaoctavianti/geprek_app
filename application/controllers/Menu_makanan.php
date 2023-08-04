<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_makanan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_menu_makanan');
	}

	public function index()
	{
		$x['data_menu_makanan']=$this->m_menu_makanan->get_all_menu_makanan();
		$x['sidebar']="menu_makanan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('menu_makanan/menu_makanan');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_menu_makanan']=$this->m_menu_makanan->get_all_menu_makanan();
		$x['sidebar']="menu_makanan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('menu_makanan/lihat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_menu_makanan']=$this->m_menu_makanan->get_all_menu_makanan();
		$this->load->view('menu_makanan/cetak',$x);
	}

		public function simpan_menu_makanan()
	{
				$data['kode_menu'] = $this->input->post('kode_menu');
				$data['nama_menu'] = $this->input->post('nama_menu');
				$data['harga'] = str_replace(".", "", $this->input->post('harga'));

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_makanan']['name']))
				{
				if($this->upload->do_upload('foto_makanan'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
								$data['foto_makanan'] = $dok;
							

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('menu_makanan');
					}
				}

								

				
					$result = $this->m_menu_makanan->add_menu_makanan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('menu_makanan'));
					}
	}


	


		public function update_menu_makanan()
	{
		$id = $this->input->post('id_menu_makanan'); 
			

					$data['kode_menu'] = $this->input->post('kode_menu');
					$data['nama_menu'] = $this->input->post('nama_menu');
					$data['harga'] = str_replace(".", "", $this->input->post('harga'));


					$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_makanan']['name']))
				{
				if($this->upload->do_upload('foto_makanan'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
								$data['foto_makanan'] = $dok;
							

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('menu_makanan');
					}
				}
					
				
					$result = $this->m_menu_makanan->edit_menu_makanan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('menu_makanan'));
					}
	}

	function hapus_menu_makanan(){
		$kode=$this->input->post('kode');
		$this->m_menu_makanan->hapus_menu_makanan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('menu_makanan');
	}

	public function carihrg(){
        $kd_penjualan = $this->input->post('kd_penjualan');
        $barang = $this->db->query("SELECT * FROM penjualan,barang,konsumen where  penjualan.id_barang=barang.id_barang AND penjualan.id_konsumen=konsumen.id_konsumen AND id_penjualan='$kd_penjualan' ")->row();

        	   $brg1=$this->db->query("SELECT * from barang where id_barang=".$barang->id_barang."")->row();
               $brg2=$this->db->query("SELECT * from barang where id_barang=".$barang->id_barang1."")->row();
               $brg3=$this->db->query("SELECT * from barang where id_barang=".$barang->id_barang2."")->row();
               $brg4=$this->db->query("SELECT * from barang where id_barang=".$barang->id_barang3."")->row();

        $lists = "<div class='row'><div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Nama Barang </label>".
                    "<input required type='text' value='".$barang->nama_barang."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Jual </label>".
                    "<input required type='text' value='".$barang->jumlah_jual."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Retur </label>".
                    "<input required type='number' value='0' name='jumlahretur1'  class='form-control' > ".
                 "</div></div>";

           if($barang->id_barang1!=0){
 		$lists .= "<div class='row'><div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Nama Barang </label>".
                    "<input required type='text' value='".$brg2->nama_barang."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Jual </label>".
                    "<input required type='text' value='".$barang->jumlah_jual1."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Retur </label>".
                    "<input required type='number' value='0' name='jumlahretur2'  class='form-control' > ".
                 "</div></div>";

          }

              if($barang->id_barang2!=0){
 		$lists .= "<div class='row'><div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Nama Barang </label>".
                    "<input required type='text' value='".$brg3->nama_barang."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='row'><div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Jual </label>".
                    "<input required type='text' value='".$barang->jumlah_jual2."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Retur </label>".
                    "<input required type='number' value='0' name='jumlahretur3' class='form-control' > ".
                 "</div></div>";

          }

              if($barang->id_barang3!=0){
 		$lists .= "<div class='row'><div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Nama Barang </label>".
                    "<input required type='text' value='".$brg4->nama_barang."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Jual </label>".
                    "<input required type='text' value='".$barang->jumlah_jual3."' readonly class='form-control' > ".
                 "</div>";

        $lists .= "<div class='col-4 col-md-4' style='margin-bottom: 12px;'>".
                    "<label class='form-label' >Jumlah Retur </label>".
                    "<input required type='number' value='0' name='jumlahretur4'  class='form-control' > ".
                 "</div></div>";

          }

        $callback = array('list_barang'=>$lists); 
        echo json_encode($callback); 
    }
}