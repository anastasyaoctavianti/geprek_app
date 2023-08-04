<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
          
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div>
                                      <h4 class="card-title" style="float: left; margin-left: 20px; margin-top: 20px;">TRANSAKSI PENJUALAN</h4>
                                </div>
                                <div class="card-content">
                            <form  action="<?php echo base_url().'penjualan/simpan_penjualan'?>" method="post" method="post" enctype="multipart/form-data">
<section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>No.Penjualan </label>
                                                <input readonly value="<?php echo sprintf("%03d", $id_penjualan);?>" type="text" class="form-control" id="basicInput" placeholder="" />
                                                <input name="id_penjualan" value="<?php echo $id_penjualan;?>" type="hidden" class="form-control">
                                            </div>
                                        </div>
                                        
                                         <?php
                                        $datkon=$this->db->query("SELECT * FROM menu_makanan,barang_list WHERE barang_list.id_barang=menu_makanan.id_menu_makanan AND id_penjualan='$id_penjualan'")->num_rows();
                                        if($datkon==0):
                                        ?>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Tanggal Jual </label>
                                                <input name="tanggal_jual" value="<?php echo date('Y-m-d');?>" type="date" class="form-control" id="basicInput" placeholder="" />
                                            </div>
                                        </div>
                                       <div class="col-xl-4 col-md-4 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Cabang </label>
                                                  <select class="form-control" name="id_cabang" required>
                                                      <option value="">--pilih--</option>
                                                      <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                                      <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                                      <?php endforeach;?>
                                                    </select>
                                            </div>
                                        </div> 
                                       <div class="col-xl-4 col-md-4 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Pegawai </label>
                                                 <select class="form-control js-example-basic-single" required name="id_pegawai">
                                                  <option value="">--pilih pegawai--</option>
                                                  <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                                  <option value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nama_pegawai'];?></option>
                                                  <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div> 
                                         <div class="col-xl-4 col-md-4 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Konsumen </label>
                                                 <select class="form-control js-example-basic-single" required name="id_konsumen" id="kk_konsumen">
                                                  <option value="">--pilih customer--</option>
                                                  <?php foreach ($this->db->get('konsumen')->result_array() as $key):?>
                                                  <option value="<?php echo $key['id_konsumen'];?>"><?php echo $key['kode_konsumen'];?> | <?php echo $key['nama_konsumen'];?></option>
                                                  <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div> 
                                        <?php else:
                                            $datkon=$this->db->query("SELECT * FROM menu_makanan,barang_list WHERE barang_list.id_barang=menu_makanan.id_menu_makanan AND id_penjualan='$id_penjualan'")->row_array();
                                            $id_kon=$datkon['id_pegawai'];
                                            $id_cab=$datkon['id_cabang'];
                                            $id_kons=$datkon['id_konsumen'];
                                            $data_kon=$this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$id_kon' ")->row_array();
                                            $data_kons=$this->db->query("SELECT * FROM konsumen WHERE id_konsumen='$id_kons' ")->row_array();
                                            $data_cab=$this->db->query("SELECT * FROM cabang WHERE id_cabang='$id_cab' ")->row_array();
                                            ?>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Tanggal Jual </label>
                                                <input name="tanggal_jual" value="<?php echo $datkon['tanggal_jual'];?>" type="date" class="form-control" id="basicInput" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Cabang </label>
                                                <input type="hidden" name="id_cabang" value="<?php echo $id_cab;?>">
                                                <input type="text" readonly class="form-control" value="<?php echo $data_cab['nama_cabang'];?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Pegawai </label>
                                                <input type="hidden" name="id_pegawai" value="<?php echo $id_kon;?>">
                                                <input type="text" readonly class="form-control" value="<?php echo $data_kon['nama_pegawai'];?>">
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-4 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Konsumen </label>
                                                <input type="hidden" name="id_konsumen" value="<?php echo $id_kons;?>">
                                                <input type="text" readonly class="form-control" value="<?php echo $data_kons['nama_konsumen'];?>">
                                            </div>
                                        </div>
                                        
                                        <?php endif;?>


                                        
                                        <hr>
                                         <div class="col-xl-3 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Menu Makanan </label>
                                               <select id="kd_barang" class="form-control js-example-basic-single" name="id_barang">
                                                  <option value="">--pilih menu_makanan--</option>
                                                  <?php foreach ($this->db->get('menu_makanan')->result_array() as $key):?>
                                                  <option value="<?php echo $key['id_menu_makanan'];?>"><?php echo $key['kode_menu'];?> | <?php echo $key['nama_menu'];?></option>
                                                  <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="col-xl-2 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Harga </label>
                                                <div id="harga1">
                                                    <input readonly type="text" class="form-control" id="basicInput" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xl-2 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Jumlah Jual </label>
                                                <input onkeyup="sum1()" name="jumlah_jual" id="jumlah_jual1"  type="number" class="form-control" id="basicInput" placeholder="" />
                                            </div>
                                        </div>
                                         <div class="col-xl-2 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Subtotal </label>
                                                <input readonly id="subtotal1" type="text" class="form-control" id="basicInput" placeholder="" />
                                            </div>
                                        </div>
                                         <div class="col-xl-3 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                            <button formnovalidate formaction="<?php echo base_url().'penjualan/simpan_barang'?>" style="margin-top:20px" type="submit" class="btn btn-success">TAMBAH MENU MAKANAN</button>
                                        </div>
                                        </div>
                                       

                                 <div class="card-datatable col-12" style="margin:10px; ">
                                     <table class="table zero-configuration" style="background-color: gainsboro;">
                                          <thead>
                                              <tr>
                                                <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                <th>Kode Menu</th>
                                                <th>Nama Menu</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             <?php $no=1; $nn=0; $nn1=0; foreach ($this->db->query("SELECT * FROM menu_makanan,barang_list WHERE barang_list.id_barang=menu_makanan.id_menu_makanan AND id_penjualan='$id_penjualan'")->result_array() as $i) :
                                            $id_barang=$i['id_barang'];
                                            $nn=$nn+($i['jumlah_jual']*$i['harga']);
                                          ?>
                                            <tr>
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['kode_menu'];?></td> 
                                              <td><?php echo $i['nama_menu'];?></td> 
                                              <td><?php echo rupiah($i['harga']);?></td>
                                              <td><?php echo $i['jumlah_jual'];?></td>
                                              <td><?php echo rupiah($i['harga']*$i['jumlah_jual']);?></td>
                                              <td>
                                                <a href="<?php echo base_url();?>penjualan/hapusperbarang/<?php echo $id_barang;?>/<?php echo $id_penjualan;?>/tambah" class="btn btn-danger">HAPUS</a>
                                              </td>
                                            
                                            </tr>
                                            <?php endforeach;?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">TOTAL</td>
                                                <td><?php echo rupiah($nn);?></td>
                                            </tr>
                                          </tbody>
                                      </table>
                                </div>


                                  <div class="col-xl-3 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Diskon </label>
                                               <input type="hidden" value="<?php echo $nn;?>" id="subtota" name="diskon" class="form-control" required value="0">
                                               <input onkeyup="sumt();" type="text"  name="diskon" id="diskon" class="form-control uang" required value="0">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Bayar </label>
                                                <input onkeyup="sumr();" type="text"  name="bayar" id="bayar" class="form-control uang" required value="0">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Kembalian </label>
                                                <input type="text"  name="kembalian" readonly id="kembalian" class="form-control uang" required value="0">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Grand Total </label>
                                                <input type="text" name="grandtotal" value="<?php echo rupiah2($nn);?>" readonly id="grandtotal"  class="form-control" required >
                                            </div>
                                        </div>


                                         <div class="col-xl-12 col-md-12 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Status </label>
                                                    <select class="form-control js-example-basic-single" required name="stat_peng" id="stat_peng">
                                                      <option >Penjualan Tidak Dikirim</option>
                                                      <option >Penjualan Dikirim</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div style="margin-left: 20px;" id="demo"></div>


                                       

                                        
                                    
                                       <div class="col-xl-12 col-md-12 col-12 mb-12">
                                          <button style="float:right;" type="submit" class="btn btn-primary">PROSES TRANSAKSI</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                                          

            </div>
        </div>
    </div>
    <!-- END: Content-->






  



<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Penjualan Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Penjualan Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Penjualan Behasil di HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Gambar SALAH'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('stok_tidak_cukup') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Stok Tidak Cukup'
})
 </script>
<?php endif; ?>

