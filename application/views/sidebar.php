

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                 <li class="nav-item me-auto"><a class="navbar-brand" href="#">
                 
                   <img  src="<?php echo base_url();?>assets/logo2.png" alt="Login V2" style="width:37px;" /> 
                    <span style="font-size: 12px; margin-left: 25px; font-weight: bold; margin-right: 10px;">AYAM GEPREK SA'I </span>
                    
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                 <li class="navigation-header"><span data-i18n="Menu Utama">Menu Utama</span><i data-feather="more-horizontal"></i>
                </li> 

                 

                <?php if($this->session->userdata('level')=="Pelanggan"):?>
    <?php 
    $id_user=$this->session->userdata("id_pengguna2");
$cek = $this->db->query("SELECT max(id_penjualan) AS no FROM penjualan order by id_penjualan desc limit 1");
$data = $cek->row_array();
$no2 = $data['no']+1;
$cekdt=$this->db->query("SELECT * FROM barang_list where id_penjualan='$no2' AND id_konsumen='$id_user'")->num_rows();
?>   
    




                <li class="<?php if($sidebar=="dashboard"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>dashboard"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Daftar Menu</span></a>
                </li>

                <li class="<?php if($sidebar=="keranjang"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>keranjang"><i class="fa fa-shopping-cart"></i><span class="menu-title" data-i18n="keranjang">Keranjang</span></a>
                </li>

                <li class="<?php if($sidebar=="transaksi"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>transaksi"><i class="fa fa-server"></i><span class="menu-title" data-i18n="transaksi">Transaksi</span></a>
                </li>
                
                
<?php else:?>   

    <li class="<?php if($sidebar=="dashboard"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>dashboard"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>

                 <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="feather icon-server"></i><span class="menu-title text-truncate" >Data Master</span></a>
                    <ul class="menu-content">

                        <?php if($this->session->userdata('level')=="admin"):?>

                        <li class="<?php if($sidebar=="pengguna"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>pengguna">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Barang">Pengguna</span></a>
                        </li>
                    <?php endif;?>
                        <li class="<?php if($sidebar=="menu_makanan"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>menu_makanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Barang">Daftar Menu</span></a>
                        </li>
                        <li class="<?php if($sidebar=="barang"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>barang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Barang">Bahan Baku</span></a>
                        </li>
                        <li class="<?php if($sidebar=="cabang"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>cabang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Barang">Cabang</span></a>
                        </li>

                        <li class="<?php if($sidebar=="pegawai"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>pegawai">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Pegawai">Karyawan</span></a>
                        </li>

                        <li class="<?php if($sidebar=="supplier"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>supplier">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Supplier</span></a>
                        </li>


                         <li class="<?php if($sidebar=="konsumen"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>konsumen">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Konsumen</span></a>
                        </li>


                 

                    </ul>
                </li> 

                 <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-shopping-cart"></i><span class="menu-title text-truncate" >Transaksi Data</span></a>
                    <ul class="menu-content">

                        <li class="<?php if($sidebar=="penjualan"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>penjualan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Penjualan</span></a>
                        </li>

                        <li class="<?php if($sidebar=="pengiriman"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>pengiriman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Pengiriman</span></a>
                        </li>

                        <li class="<?php if($sidebar=="complement_karyawan"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>complement_karyawan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Complement <br>Karyawan</span></a>
                        </li>

                        <li class="<?php if($sidebar=="barang_masuk"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>barang_masuk">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Barang Masuk</span></a>
                        </li>

                        <li class="<?php if($sidebar=="penggunaan_barang"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>penggunaan_barang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Penggunaan <br>Barang</span></a>
                        </li>

                        <li class="<?php if($sidebar=="pengeluaran"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>pengeluaran">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Pengeluaran</span></a>
                        </li>

                        <li class="<?php if($sidebar=="penggajian"): ?>active<?php endif;?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>penggajian">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="">Penggajian</span></a>
                        </li>


                 

                    </ul>
                </li> 

                


                 <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-print"></i><span class="menu-title text-truncate" >Laporan</span></a>
                    <ul class="menu-content">



                        <li class="<?php if($sidebar=="penjualan2"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>penjualan/lihat">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Penjualan">Penjualan</span></a>
                        </li>





                        <li class="<?php if($sidebar=="complement_karyawan2"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>complement_karyawan/lihat">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Complement Karyawan">Complement Karyawan</span></a>
                        </li>

                        <li class="<?php if($sidebar=="barang_masuk2"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>barang_masuk/lihat">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Barang Masuk">Barang Masuk</span></a>
                        </li>

                        <li class="<?php if($sidebar=="penggunaan_barang2"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>penggunaan_barang/lihat">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Penggunaan Barang">Penggunaan <br>Barang</span></a>
                        </li>

                        <li class="<?php if($sidebar=="penggajian2"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>penggajian/lihat">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Penggajian">Penggajian</span></a>
                        </li>

                        <li class="<?php if($sidebar=="pengeluaran2"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>pengeluaran/lihat">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Pengeluaran">Pengeluaran</span></a>
                        </li>

                        <li class="<?php if($sidebar=="penjualan3"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>penjualan/lihat2">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Laba/Rugi">Laba/Rugi</span></a>
                        </li>

                        <li class="<?php if($sidebar=="penjualan5"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>penjualan/lihat4">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Grafik Penjualan">Grafik Penjualan</a>
                        </li>
                        
                        <li class="<?php if($sidebar=="penjualan7"): ?>active<?php endif;?> nav-item"><a  class="d-flex align-items-center" href="<?php echo base_url();?>penjualan/lihat6">&nbsp;&nbsp;&nbsp;<i class="feather icon-circle"></i><span class="menu-item text-truncate" data-i18n="Grafik Penjualan">Grafik Menu <br>Makanan</a>
                        </li>


<?php endif;?>
                        

                       


                    </ul>
                </li> 
               
            </ul>
        </div>
    </div>