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
                                      <h4 class="card-title" style="float: left; margin-left: 20px; margin-top: 20px;">UPDATE COMPLEMENT KARYAWAN</h4>
                                </div>
                                <div class="card-content">
                            <form  action="<?php echo base_url().'complement_karyawan/update_complement_karyawan'?>" method="post" method="post" enctype="multipart/form-data">
<section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">


                                        <input name="id_complement_karyawan" value="<?php echo $id_complement_karyawan;?>" type="hidden" class="form-control">


                                        <?php
                                        $datkon=$this->db->query("SELECT * FROM menu_makanan,barang_list2 WHERE barang_list2.id_menu_makanan=menu_makanan.id_menu_makanan AND id_complement_karyawan='$id_complement_karyawan'")->num_rows();
                                        if($datkon==0):
                                        ?>
                                       <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Tanggal Ambil </label>
                                                <input value="<?php echo $edit_complement_karyawan['tanggal_ambil'];?>" required name="tanggal_ambil" type="date" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
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
                                        <?php else:
                                            $datkon=$this->db->query("SELECT * FROM menu_makanan,barang_list2 WHERE barang_list2.id_menu_makanan=menu_makanan.id_menu_makanan AND id_complement_karyawan='$id_complement_karyawan'")->row_array();
                                            $id_cab=$datkon['id_cabang'];
                                            $data_cab=$this->db->query("SELECT * FROM cabang WHERE id_cabang='$id_cab' ")->row_array();
                                            ?>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Tanggal Ambil </label>
                                                <input required value="<?php echo $datkon['tanggal_ambil'];?>" name="tanggal_ambil" type="date" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Cabang </label>
                                                <input type="hidden" name="id_cabang" value="<?php echo $id_cab;?>">
                                                <input type="text" readonly class="form-control" value="<?php echo $data_cab['nama_cabang'];?>">
                                            </div>
                                        </div>
                                        <?php endif;?>

                                    


                                        
                                        <hr>
                                         <div class="col-xl-3 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label>Menu Makanan </label>
                                               <select id="kd_barang" class="form-control js-example-basic-single" name="id_menu_makanan">
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
                                                <input onkeyup="sum11()" name="jumlah_ambil" id="jumlah_ambil1"  type="number" class="form-control" id="basicInput" placeholder="" />
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
                                            <button formnovalidate formaction="<?php echo base_url().'complement_karyawan/simpan_barang2'?>" style="margin-top:20px" type="submit" class="btn btn-success">TAMBAH MENU MAKANAN</button>
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
                                             <?php $no=1; $nn=0; $nn1=0; foreach ($this->db->query("SELECT * FROM menu_makanan,barang_list2 WHERE barang_list2.id_menu_makanan=menu_makanan.id_menu_makanan AND id_complement_karyawan='$id_complement_karyawan'")->result_array() as $i) :
                                            $id_menu_makanan=$i['id_menu_makanan'];
                                            $nn=$nn+($i['jumlah_ambil']*$i['harga']);
                                          ?>
                                            <tr>
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['kode_menu'];?></td> 
                                              <td><?php echo $i['nama_menu'];?></td> 
                                              <td><?php echo rupiah($i['harga']);?></td>
                                              <td><?php echo $i['jumlah_ambil'];?></td>
                                              <td><?php echo rupiah($i['harga']*$i['jumlah_ambil']);?></td>
                                              <td>
                                                <a href="<?php echo base_url();?>complement_karyawan/hapusperbarang/<?php echo $id_menu_makanan;?>/<?php echo $id_complement_karyawan;?>/edit" class="btn btn-danger">HAPUS</a>
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


                                        <div class="col-xl-6 col-md-6 col-6 mb-6">
                                            <div class="form-group">
                                                <label>Grand Total </label>
                                                <input type="text" name="grandtotal" value="<?php echo rupiah2($nn);?>" readonly id="grandtotal"  class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-6 mb-6">
                                            <div class="form-group">
                                                <label>Keterangan </label>
                                                <textarea class="form-control" name="keterangan"><?php echo $edit_complement_karyawan['keterangan'];?></textarea>
                                            </div>
                                        </div>


                                       

                                        
                                    
                                       <div class="col-xl-12 col-md-12 col-12 mb-12">
                                          <button style="float:right;" type="submit" class="btn btn-primary">UPDATE COMPLEMENT KARYAWAN</button>
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
  text: 'complement_karyawan Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'complement_karyawan Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'complement_karyawan Behasil di HAPUS'
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

