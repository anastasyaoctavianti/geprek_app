<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
       
        
            <section id="complex-header-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <span class="card-title">TRANSAKSI PEMBELIAN</span>
                                </div>
                                <div class="card-datatable" style="margin:10px;">
 <?php 
$id_user=$this->session->userdata("id_pengguna2");
$data_user=$this->db->query("SELECT * FROM konsumen where id_konsumen='$id_user'")->row_array();

?>

<div class="table-responsive">
                        <table class="table zero-configuration">
                                          <thead>
                                              <tr>
                                                 <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                <th style="flex: 0 0 auto; min-width: 2em;">Kode Pembelian</th>
                                                <th style="flex: 0 0 auto; min-width: 17em;">Menu Makanan</th>
                                                <th >Total</th>
                                                <th>Tanggal Jual</th>
                                                 <th>Metode Pembayaran</th>
                                                <th>File Bukti Pembayaran</th>
                                                <th>Verifikasi Admin</th>
                                                <th>Kurir</th>
                                                <th>Alamat Penerima</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Status Pengiriman</th>
                                                <th>Catatan Kurir</th>
                                                <th>Cabang</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             <?php $no=1; foreach ($this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen AND penjualan.id_konsumen='$id_user'")->result_array() as $i) :
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
                                               <td><?php echo $catatan_kurir;?></td>
                                                <td><?php echo $i['nama_cabang'];?></td>
                                            </tr>
                                            <?php endforeach;?>
                                          </tbody>
                                      </table>
 

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


    </div>
</div>






  



<script type="text/javascript">
  $().DataTable();
</script>





<script type="text/javascript">
  $().DataTable();
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Pembelian berhasil di proses',
})
 </script>
<?php endif; ?>
<?php if($this->session->flashdata('berhasil_simpan2') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Pembelian berhasil dikonfirmasi',
})
 </script>
<?php endif; ?>


