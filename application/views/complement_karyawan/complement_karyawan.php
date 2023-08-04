<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
           <?php 
                        $cek = $this->db->query("SELECT max(id_complement_karyawan) AS no FROM complement_karyawan order by id_complement_karyawan desc limit 1");
$data = $cek->row_array();
$no2 = $data['no']+1;
?>               
            <div class="content-body">
              
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div>
                                      <h4 class="card-title" style="float: left; margin-left: 20px; margin-top: 20px;">COMPLEMENT KARYAWAN</h4>
                                        <?php if($this->session->userdata('level')=="admin"):?>
                                     <a style="float:right; margin-right: 20px; margin-top: 20px;" href="<?php echo base_url();?>complement_karyawan/tambah/<?php echo $no2;?>" type="button" class="btn btn-success btn-sm" >TAMBAH COMPLEMENT KARYAWAN</a>
                                      <?php endif;?>
                                       <!-- <a target="_blank" href="<?php// echo base_url();?>complement_karyawan/cetak" style=" float: right!important; margin-bottom: 5px; margin-right: 20px; margin-top: 20px;" type="button" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i> CETAK</a> -->

                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Tanggal</th>
                                                         <th style="flex: 0 0 auto; min-width: 17em;">Menu Makanan</th>
                                                        <th>Total Biaya</th>
                                                        <th>Keterangan</th>
                                                        <th>Cabang</th>
                                                          <?php if($this->session->userdata('level')=="admin"):?>
                                                        <th style="text-align: right;">Action</th>
                                                         <?php endif;?>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1;  foreach ($data_complement_karyawan->result_array() as $i) :
                                            $id_complement_karyawan=$i['id_complement_karyawan'];
                                             $totall=$i['harga']*$i['jumlah_ambil'];

                $jumlah_ambil=$i['jumlah_ambil']+$i['jumlah_ambil1']+$i['jumlah_ambil2']+$i['jumlah_ambil3'];
                $brg1=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_menu_makanan']."")->row_array();
                $brg2=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_menu_makanan1']."")->row_array();
                $brg3=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_menu_makanan2']."")->row_array();
                $brg4=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_menu_makanan3']."")->row_array();
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo tgl_indo($i['tanggal_ambil']);?></td>
                                            <td>
                                                Kode :<?php echo $i['kode_menu'];?><br>
                                                Menu :<?php echo $i['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($i['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_ambil'];?> 
                                                  <?php if($i['id_menu_makanan1']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg2['kode_menu'];?><br>
                                                Menu :<?php echo $brg2['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg2['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_ambil1'];?> 

                                                  <?php 
                                                  $totall=$totall+($brg2['harga']*$i['jumlah_ambil1']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_menu_makanan2']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg3['kode_menu'];?><br>
                                                Menu :<?php echo $brg3['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg3['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_ambil2'];?> 

                                                  <?php 
                                                  $totall=$totall+($brg3['harga']*$i['jumlah_ambil2']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_menu_makanan3']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg4['kode_menu'];?><br>
                                                Menu :<?php echo $brg4['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg4['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_ambil3'];?> 
                                                  <?php 
                                                  $totall=$totall+($brg4['harga']*$i['jumlah_ambil3']);
                                                  ?>
                                                  <?php endif;?>
                                                </td>
                                              <td><?php echo rupiah($totall);?></td> 
                                              <td><?php echo $i['keterangan'];?></td>
                                              <td><?php echo $i['nama_cabang'];?></td>
                                             <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                             <a style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" href="<?php echo base_url();?>complement_karyawan/edit/<?php echo $id_complement_karyawan;?>"> EDIT</a>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_complement_karyawan;?>"> DELETE</button>
                                                
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



   <?php foreach ($data_complement_karyawan->result_array() as $i) :
                                            $id_complement_karyawan=$i['id_complement_karyawan'];
                                          ?>
       <form  action="<?php echo base_url().'complement_karyawan/hapus_complement_karyawan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_complement_karyawan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS COMPLEMENT KARYAWAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_complement_karyawan;?>">
                         <span style="color: black;">Apakah Anda yakin ingin menghapus data ini?</span>
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-danger">HAPUS</button>
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
  text: 'Complement Karyawan Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Complement Karyawan Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Complement Karyawan Behasil di HAPUS'
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

