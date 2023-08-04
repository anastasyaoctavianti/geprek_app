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
                                <div class="card-header">
                                    <h4 class="card-title">DAFTAR MENU  </h4>
                                    <?php if($this->session->userdata('level')=="admin"):?>
                                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH MENU </button>
                                     <?php endif;?>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Kode Menu</th>
                                                        <th>Nama Menu</th>
                                                        <th>Harga</th>
                                                        <th>Foto</th>
                                                        <?php if($this->session->userdata('level')=="admin"):?>
                                                        <th style="text-align: right;">Action</th>
                                                        <?php endif;?>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; foreach ($data_menu_makanan->result_array() as $i) :
                                            $id_menu_makanan=$i['id_menu_makanan'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['kode_menu'];?></td> 
                                              <td><?php echo $i['nama_menu'];?></td> 
                                              <td><?php echo rupiah($i['harga']);?></td> 
                                              <td><img src="<?php echo base_url();?>/assets/image/<?php echo $i['foto_makanan'];?>" width="80px" height="80px"></td>
                                           <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_menu_makanan;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_menu_makanan;?>"> DELETE</button>
                                                
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

       <form  action="<?php echo base_url().'menu_makanan/simpan_menu_makanan'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH DAFTAR MENU</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                                     


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Kode Menu *</label>
                                        <input required type="text" name="kode_menu" class="form-control" placeholder="Kode Menu"> 
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Menu *</label>
                                        <input required type="text" name="nama_menu" class="form-control" placeholder="Nama Menu"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Harga *</label>
                                        <input required type="text" name="harga" class="form-control uang" placeholder="Harga"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto *</label>
                                        <input required type="file" name="foto_makanan" class="form-control "> 
                                  </div> 
                              
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-info">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>







  <?php foreach ($data_menu_makanan->result_array() as $i) :
                                            $id_menu_makanan=$i['id_menu_makanan'];
                                          ?>
       <form  action="<?php echo base_url().'menu_makanan/update_menu_makanan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_menu_makanan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE DAFTAR MENU </b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_menu_makanan" value="<?php echo $id_menu_makanan;?>">


                               


                       <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Kode Menu *</label>
                                        <input value="<?php echo $i['kode_menu'];?>" required type="text" name="kode_menu" class="form-control" placeholder="Kode Menu"> 
                                  </div> 
                                  
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Menu *</label>
                                        <input value="<?php echo $i['nama_menu'];?>" required type="text" name="nama_menu" class="form-control" placeholder="Nama Menu"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Harga *</label>
                                        <input value="<?php echo $i['harga'];?>" required type="text" name="harga" class="form-control uang" placeholder="Harga"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto </label>
                                        <input  type="file" name="foto_makanan" class="form-control "> 
                                  </div> 
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_menu_makanan->result_array() as $i) :
                                            $id_menu_makanan=$i['id_menu_makanan'];
                                          ?>
       <form  action="<?php echo base_url().'menu_makanan/hapus_menu_makanan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_menu_makanan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS DAFTAR MENU</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_menu_makanan;?>">
                         <span style="color: white;">Apakah Anda yakin ingin menghapus data ini?</span>
                  

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
  text: 'Daftar Menu Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Daftar Menu Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Daftar Menu Behasil di HAPUS'
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

