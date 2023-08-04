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
                                    <h4 class="card-title">PENGGUNA</h4>
                                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGGUNA</button>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Username</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Alamat</th>
                                                        <th>No HP</th>
                                                        <th>Level</th>
                                                        <th style="text-align: right;">Action</th>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['username'];?></td> 
                                              <td><?php echo $i['nama_lengkap'];?></td>
                                              <td><?php echo $i['alamat'];?></td>
                                              <td><?php echo $i['no_hp'];?></td>
                                              <td><?php if($i['level']=="admin"):?>
                                                  <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm"> KASIR</button>
                                                <?php else:?>
                                                  <button style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm"> SUPERVISOR</button>
                                              <?php endif;?>
                                              </td>
                                           
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengguna;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengguna;?>"> DELETE</button>
                                                
                                                </div>
                                              </td>
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

       <form  action="<?php echo base_url().'pengguna/simpan_pengguna'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGGUNA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Username *</label>
                                        <input required type="text" name="username" class="form-control" placeholder="Username"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password *</label>
                                        <input autocomplete="new-password" required type="password" name="password" class="form-control" placeholder="Password">
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Legkap *</label>
                                        <input  required type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat</label>
                                        <textarea class="form-control" name="alamat"></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP</label>
                                        <input type="text" class="form-control" name="no_hp"  placeholder="No HP" >
                                  </div> 

                                 <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Level</label>
                                          <select class="form-control" name="level" required>
                                            <option value="">--pilih level--</option>
                                            <option value="admin">KASIR</option>
                                            <option value="supervisor">SUPERVISOR</option>
                                          </select>
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







  <?php foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
       <form  action="<?php echo base_url().'pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGGUNA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna;?>">


                               

                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Username *</label>
                                        <input value="<?php echo $i['username'];?>" type="text" name="username" class="form-control" placeholder="Username"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password *</label>
                                        <input autocomplete="new-password" type="password" name="password" class="form-control" placeholder="Password">
                                        <span style="color: red;">kosongkan jika tidak ada perubahan password</span>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Legkap *</label>
                                        <input value="<?php echo $i['nama_lengkap'];?>" type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat</label>
                                        <textarea class="form-control" name="alamat"><?php echo $i['alamat'];?></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP</label>
                                        <input value="<?php echo $i['no_hp'];?>" type="text" class="form-control" name="no_hp"  placeholder="No HP" >
                                  </div> 

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Level</label>
                                          <select class="form-control" name="level" required>
                                            <option value="">--pilih level--</option>
                                            <option <?= ($i['level']=="admin")?'selected':''?> value="admin">KASIR</option>
                                            <option <?= ($i['level']=="supervisor")?'selected':''?> value="supervisor">SUPERVISOR</option>
                                          </select>
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



   <?php foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
       <form  action="<?php echo base_url().'pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGGUNA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengguna;?>">
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
  text: 'Pengguna Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pengguna Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pengguna Behasil di HAPUS'
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

