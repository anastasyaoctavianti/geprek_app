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
                                      <h4 class="card-title" style="float: left; margin-left: 20px; margin-top: 20px;">PENGIRIMAN</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                   <tr>
                                                <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                <th style="flex: 0 0 auto; min-width: 2em;">No pengiriman</th>
                                                <th>Nama Customer</th>
                                                <th style="flex: 0 0 auto; min-width: 17em;">Data Barang</th>
                                                <th >Diskon</th>
                                                <th >Bayar</th>
                                                <th >Kembalian</th>
                                                <th >Total</th>
                                                <th>Tanggal Jual</th>
                                                <th>Metode Pembayaran</th>
                                                <th>File Bukti Pembayaran</th>
                                                <th>Verifikasi Admin</th>
                                                <th>Kurir</th>
                                                <th>Alamat Penerima</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Status Pengiriman</th>
                                                <th>Bukti Pengiriman</th>
                                                <th>Catatan Kurir</th>
                                                <?php if($this->session->userdata('level')=="admin"):?>
                                                <th style="text-align: right;">Action</th>
                                                <?php endif;?>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             <?php $no=1; foreach ($data_pengiriman->result_array() as $i) :
                                           $id_pengiriman=$i['id_pengiriman'];
                                           $id_penjualan=$i['id_penjualan'];
                                            $totall=$i['harga']*$i['jumlah_jual'];

                                            $num_pengiriman=$hsl=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen,pengiriman where penjualan.id_barang=menu_makanan.id_menu_makanan AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai AND penjualan.id_penjualan='$id_penjualan'")->num_rows();
                                            if ($num_pengiriman>=1) {
                                                $dt_pengiriman=$hsl=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen,pengiriman where penjualan.id_barang=menu_makanan.id_menu_makanan AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai AND penjualan.id_penjualan='$id_penjualan'")->row_array();
                                                $no_resi=sprintf("%03d", $dt_pengiriman['id_pengiriman']);
                                                $nama_pegawai=$dt_pengiriman['nama_pegawai'];
                                                $tanggal_pengiriman=$dt_pengiriman['tanggal_pengiriman'];
                                                $alamat_penerima=$dt_pengiriman['alamat_penerima'];
                                                $status_pengiriman=$dt_pengiriman['status_pengiriman'];
                                                $catatan_kurir=$dt_pengiriman['catatan_kurir'];
                                            }else{
                                                $no_resi="-";
                                                $nama_pegawai="-";
                                                $tanggal_pengiriman="-";
                                                $alamat_penerima="-";
                                                $status_pengiriman="-";
                                                $catatan_kurir="-";
                                            }



                $jumlah_jual=$i['jumlah_jual']+$i['jumlah_jual1']+$i['jumlah_jual2']+$i['jumlah_jual3'];
                $brg1=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang']."")->row_array();
                $brg2=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang1']."")->row_array();
                $brg3=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang2']."")->row_array();
                $brg4=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang3']."")->row_array();

                                          ?>
                                            <tr>
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo sprintf("%03d", $id_penjualan);?></td> 

                                              <td><?php echo $i['nama_konsumen'];?></td> 
                                             <td>
                                                Kode :<?php echo $i['kode_menu'];?><br>
                                                Menu :<?php echo $i['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($i['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual'];?> 
                                                  <?php if($i['id_barang1']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg2['kode_menu'];?><br>
                                                Menu :<?php echo $brg2['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg2['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual1'];?> 

                                                  <?php 
                                                  $totall=$totall+($brg2['harga']*$i['jumlah_jual1']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_barang2']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg3['kode_menu'];?><br>
                                                Menu :<?php echo $brg3['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg3['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual2'];?> 

                                                  <?php 
                                                  $totall=$totall+($brg3['harga']*$i['jumlah_jual2']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_barang3']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg4['kode_menu'];?><br>
                                                Menu :<?php echo $brg4['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg4['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual3'];?> 
                                                  <?php 
                                                  $totall=$totall+($brg4['harga']*$i['jumlah_jual3']);
                                                  ?>
                                                  <?php endif;?>
                                                </td>
                                              <td><?php echo rupiah($i['diskon']);?></td>
                                              <td><?php echo rupiah($i['bayar']);?></td>
                                              <td><?php echo rupiah($i['kembalian']);?></td>
                                              <td><?php echo rupiah($i['total']);?></td>
                                              <td><?php echo tgl_indo($i['tanggal_jual']);?></td> 
                                              <td><?php echo $i['metode_pembayaran'];?></td>
                                              <td>
                                                  <?php if(!empty($i['bukti_pembayaran'])):?>
                                                    <a target="_blank" class="btn btn-success" href="<?php echo base_url();?>assets/image/<?php echo $i['bukti_pembayaran'];?>" >VIEW</a>
                                                  <?php else:?>
                                                     <button class="btn btn-danger" >EMPTY</button>
                                                  <?php endif;?>
                                                </td>
                                               <td>
                                                <?php if($i['status_pembelian']=="DIPROSES"):?>
                                                <button type="button"  class="btn btn-success mdi mdi-pencil btn-sm"> DIPROSES</button>
                                                <?php elseif ($i['status_pembelian']=="MENUNGGU KONFIRMASI"):?>
                                                <button type="button"  class="btn btn-info mdi mdi-pencil btn-sm">MENUNGGU KONFIRMASI</button>
                                                <?php elseif ($i['status_pembelian']=="DITOLAK"):?>
                                                <button type="button"  class="btn btn-danger mdi mdi-pencil btn-sm"> DITOLAK</button> 
                                                <?php endif;?>
                                              </td> 
                                               <td><?php echo $nama_pegawai;?></td>
                                               <td><?php echo $alamat_penerima;?></td>
                                               <?php if($tanggal_pengiriman=="-"):?>
                                                <td>-</td>
                                            <?php else:?>
                                               <td><?php echo tgl_indo($tanggal_pengiriman);?></td>
                                           <?php endif;?>
                                               <td><?php echo $status_pengiriman;?></td>
                                               <td>
                                                  <?php if(!empty($i['foto_bukti_pengiriman'])):?>
                                                    <a target="_blank" class="btn btn-success" href="<?php echo base_url();?>assets/image/<?php echo $i['foto_bukti_pengiriman'];?>" >VIEW</a>
                                                  <?php else:?>
                                                     <button class="btn btn-danger" >EMPTY</button>
                                                  <?php endif;?>
                                                </td>
                                               <td><?php echo $catatan_kurir;?></td>
                                           
                                                  <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">

                                                <div class="btn-group" role="group" aria-label="Basic example">

                                               <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengiriman;?>"> KONFIRMASI</button>

                                                </div>
                                              </td>

                                                 <?php endif;?>
                                            </tr>
                                            <?php endforeach;?>
                                          </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                                          

            </div>
        </div>
    </div>
    <!-- END: Content-->



   


  <?php foreach ($data_pengiriman->result_array() as $i) :
                                            $id_pengiriman=$i['id_pengiriman'];
                                            
                                          ?>
       <form  action="<?php echo base_url().'pengiriman/update_pengiriman'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengiriman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGIRIMAN</b></h4>
                                  <button  type="button"  class="close"  data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengiriman" value="<?php echo $id_pengiriman;?>">
                       <input type="hidden" name="id_penjualan" value="<?php echo $i['id_penjualan'];?>">


                           <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Penjualan * </label>
                                  <input value="No.Penjualan :<?php echo sprintf("%03d", $i['id_penjualan']);?> | <?php echo $i['nama_konsumen'];?>" required readonly type="text" class="form-control" >
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Kurir *</label>
                                <input value="<?php echo $i['nama_pegawai'];?>" required readonly type="text" class="form-control" >
                          </div> 


                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Tanggal Pengiriman *</label>
                                <input value="<?php echo $i['tanggal_pengiriman'];?>" required type="date" name="tanggal_pengiriman" class="form-control" placeholder="Tanggal Pengiriman"> 
                          </div> 


                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Alamat Penerima *</label>
                                <textarea class="form-control" name="alamat_penerima" required><?php echo $i['alamat_penerima'];?></textarea>
                          </div> 


                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Status Pengiriman *</label>
                                <select class="form-control js-example-basic-single" name="status_pengiriman">
                                  <option value="">--pilih--</option>
                                  <option <?= ($i['status_pengiriman']=="Menunggu")?'selected':'';?> >Menunggu</option>
                                  <option <?= ($i['status_pengiriman']=="Dalam Perjalanan")?'selected':'';?> >Dalam Perjalanan</option>
                                  <option <?= ($i['status_pengiriman']=="Telah Sampai")?'selected':'';?> >Telah Sampai</option>
                                </select>
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Foto Bukti Pengiriman </label>
                                <input class="form-control" name="foto_bukti_pengiriman" type="file">
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Catatan Kurir </label>
                                <textarea class="form-control" name="catatan_kurir" ><?php echo $i['catatan_kurir'];?></textarea>
                          </div> 
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>






  



<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Pengiriman Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pengiriman Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pengiriman Behasil di HAPUS'
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



