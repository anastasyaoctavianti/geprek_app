<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
       
<?php 
$id_user=$this->session->userdata("id_pengguna2");
$data_user=$this->db->query("SELECT * FROM konsumen where id_konsumen='$id_user'")->row_array();

?>
<?php 
$cek = $this->db->query("SELECT max(id_penjualan) AS no FROM penjualan order by id_penjualan desc limit 1");
$data = $cek->row_array();
$no2 = $data['no']+1;
$cekdt=$this->db->query("SELECT * FROM barang_list where id_penjualan='$no2' AND id_konsumen='$id_user'")->num_rows();
?>   

            <section id="complex-header-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <span class="card-title">KERANJANG</span>
                                </div>
                                <div class="card-datatable" style="margin:10px;">
                            
<?php if($cekdt==0):?>
<div class="alert alert-primary" role="alert">
  Isi keranjang kosong!
</div>
<?php else:?>


                          <form  action="<?php echo base_url().'keranjang/konfir'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">

                
                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Tanggal Pembelian*</label>
                                <input readonly name="tanggal_jual" value="<?php echo date('Y-m-d');?>" type="hidden" class="form-control" id="basicInput" placeholder="" />
                                <input readonly value="<?php echo tgl_indo(date('Y-m-d'));?>" type="text" class="form-control" id="basicInput" placeholder="" />
                          </div> 


                            <div class="card-datatable" style="margin:10px; ">
                                    <table id="example1" class=" table table-bordered " >
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
                                             <?php $no=1; $nn=0; $nn1=0; $brt=0; foreach ($this->db->query("SELECT * FROM menu_makanan,barang_list WHERE barang_list.id_barang=menu_makanan.id_menu_makanan AND id_penjualan='$no2'")->result_array() as $i) :
                                            $id_penjualan=$i['id_penjualan'];
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
                                                <a href="<?php echo base_url();?>keranjang/hapusperbarang/<?php echo $id_barang;?>/<?php echo $no2;?>/tambah" class="btn btn-danger">HAPUS</a>
                                              </td>
                                            
                                            </tr>
                                            <?php endforeach;?>
                                          </tbody>
                                      </table>
                                </div>

                          <input name="id_penjualan" value="<?php echo $no2;?>" type="hidden" class="form-control">
                          <input type="hidden" name="id_konsumen" value="<?php echo $data_user['id_konsumen'];?>">
                          <input type="hidden" name="diskon" value="0">
                          <input type="hidden" name="bayar" value="<?php echo rupiah2($nn);?>">
                          <input type="hidden" name="kembalian" value="0">

                          <div class="row"> 
                           <div class="col-6 " >
                                <label class="form-label" >Total Pembelian *</label>
                                <input type="hidden"  value="<?php echo $nn;?>" readonly id="grandtotal"  name="grandtotal" class="form-control" required >
                                <input type="text"  value="<?php echo rupiah2($nn);?>" readonly id="grandtotal"  class="form-control" required >
                          </div> 
                           <div class="col-6 " >
                                <label class="form-label" >Cabang *</label>
                                <select class="form-control" name="id_cabang" required>
                                                      <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                                      <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                                      <?php endforeach;?>
                                                    </select>
                          </div> 
                        

                           <div class="col-6 col-md-6" style="margin-bottom: 12px;">
                                <label class="form-label" >Metode Pembayaran *</label>
                                <select class="form-control js-example-basic-inglev6" id="metode_pembayaran" name="metode_pembayaran" required>
                                  <option value="">--pilih--</option>
                                  <option>COD</option>
                                  <option>TRANSFER</option>
                                </select>
                          </div> 

                          <div id="demo3v"></div>

                          </div>


                          

                          <div class="col-4" style="margin-bottom: 12px; float: right;">
                                 <button class="col-12 col-md-12 btn btn-success" type="submit" >PROSES TRANSAKSI</button>
                          </div> 
                </div>
          </form>
  <?php endif;?>
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


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Barang berhasil di hapus',
})
 </script>
<?php endif; ?>
<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'error',
  text: 'Format bukti pembayaran salah',
})
 </script>
<?php endif; ?>




