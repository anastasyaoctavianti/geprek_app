
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">

    <div class="row">
<?php if($this->session->userdata('level')!="Pelanggan"):?>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="card">
                                    <center>
                                    <div class="avatar bg-rgba-primary p-50 m-0" style="margin-top: 8px!important;">
                                        <div class="avatar-content" >
                                            <img src="<?php echo base_url();?>/assets/logo2.png" width="80px">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">APLIKASI POINT OF SALES (POS) DAN PENGELOLAAN DATA STOK BAHAN BAKU  </h2>
                                    <h2 class="text-bold-700 mt-1">PADA RUMAH MAKAN CEPAT SAJI AYAM GEPREK SA’I  </h2>
                                    <img src="<?php echo base_url();?>/assets/toko3.png" width="100%" height="500px">
                                </center>
                            </div>
                                <br>
                        </div>
        <?php else:?>


             <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                               
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <?php foreach ($this->db->get('menu_makanan')->result_array() as $key):?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="view overlay">
                <center>
                <img src="<?php echo base_url();?>assets/image/<?php echo $key['foto_makanan'];?>" style="width: 120px;" class="card-img-top"
                  alt="">
              </center>
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <div class="card-body text-center">
               
                <h5>
                  <strong>
                    <a href="#" class="dark-grey-text"><?php echo $key['nama_menu'];?>
                    </a>
                  </strong>
                </h5>
                <h4 class="font-weight-bold blue-text">
                  <strong><?php echo rupiah($key['harga']);?></strong><br>
                  <div style="margin-top:5px; font-size: 12px;">
                </div>
                </h4>
               
                      <button  type="button"  class="btn btn-success btn-info" data-toggle="modal" data-target="#exampleModalCenter<?php echo $key['id_menu_makanan'];?>"> <i class="fa fa-shopping-cart"></i> TAMBAH KERANJANG</button> 
              
              </div>
            </div>
          </div>
        <?php endforeach;?>


 <?php 
                        $cek = $this->db->query("SELECT max(id_penjualan) AS no FROM penjualan order by id_penjualan desc limit 1");
$data = $cek->row_array();
$no2 = $data['no']+1;
?>        
<?php foreach ($this->db->get('menu_makanan')->result_array() as $key):?>


<form  action="<?php echo base_url().'home/simpan_barang'?>" method="post" method="post" enctype="multipart/form-data">
<div class="form-group">
                          <div class="modal fade text-left" id="exampleModalCenter<?php echo $key['id_menu_makanan'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content" style="background-color:#DBEFFD!important;">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH KERANJANG</b></h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

    
                 <div class="modal-body">


              
        <input type="hidden" name="id_konsumen" value="<?php echo $this->session->userdata('id_pengguna2');?>">

        <input readonly value="<?php echo sprintf("%03d", $no2);?>" type="hidden" class="form-control" id="basicInput" placeholder="" />
         <input name="id_penjualan" value="<?php echo $no2;?>" type="hidden" class="form-control">

                     <div class="view overlay">
                <center>
                <img style="width: 200px!important;" src="<?php echo base_url();?>assets/image/<?php echo $key['foto_makanan'];?>" class="card-img-top"
                  alt="">
                </center>
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <div class="card-body text-center">
               
                <h5>
                  <strong>
                    <a href="#" class="dark-grey-text"><?php echo $key['nama_menu'];?>
                    </a>
                  </strong>
                </h5>
                <h4 class="font-weight-bold blue-text">
                  <strong><?php echo rupiah($key['harga']);?></strong>
                  <div style="margin-top:5px; font-size: 12px;">
                  </div>
                </h4>

                <div class="row">
                  <div class="col-6">
                  <span style="color: color;"> Jumlah Beli</span>
                <input type="number" name="jumlah_jual" onkeyup="summ<?php echo $key['id_menu_makanan'];?>();" id="jumlah_jual<?php echo $key['id_menu_makanan'];?>" class="form-control" required>
              </div>
                  <div class="col-6">
               <span style="color: color;"> Total</span>
                <input type="hidden" value="<?php echo $key['harga'];?>" id="harga<?php echo $key['id_menu_makanan'];?>">
                <input type="hidden" value="<?php echo $key['id_menu_makanan'];?>" name="id_barang">
                <input type="text" readonly id="biaya<?php echo $key['id_menu_makanan'];?>" name="biaya" class="form-control" required>
              </div>
            </div>


              </div>

                         

                          
                            
                              
                  

                 </div>
                <div class="modal-footer"><!-- 
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">Tutup</button> -->
                                  <button type="submit" class="btn btn-success">Tambahkan Keranjang</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
</form>


<script>
function summ<?php echo $key['id_menu_makanan'];?>() {
      var harga = document.getElementById('harga<?php echo $key['id_menu_makanan'];?>').value;
      var jumlah_jual = document.getElementById('jumlah_jual<?php echo $key['id_menu_makanan'];?>').value;
      var result = parseInt(harga) * parseInt(jumlah_jual);
      if (!isNaN(result)) {
         document.getElementById('biaya<?php echo $key['id_menu_makanan'];?>').value = result;
      }
}
</script>

<?php endforeach;?>

                                       
                                    </div>
                                    
                                </div>


                                
                            </div>
                        </div>


        <?php endif;?>

  

                      </div>
                    



                    
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Berhasil menambahkan ke keranjang',
})
 </script>
<?php endif; ?>