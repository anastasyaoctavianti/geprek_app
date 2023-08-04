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
                                    <h4 class="card-title">DATA KARYAWAN</h4>
                                    <?php if($this->session->userdata('level')=="admin"):?>
                                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH KARYAWAN</button>
                                     <?php endif;?>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Karyawan</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Nomor HP</th>
                                                        <th>Jabatan</th>
                                                        <th>Cabang</th>
                                                        <?php if($this->session->userdata('level')=="admin"):?>
                                                        <th style="text-align: right;">Action</th>
                                                        <?php endif;?>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; foreach ($data_pegawai->result_array() as $i) :
                                            $id_pegawai=$i['id_pegawai'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['nama_pegawai'];?></td> 
                                              <td><?php echo $i['tempat_lahir'];?></td> 
                                              <td><?php echo tgl_indo($i['tanggal_lahir']);?></td>
                                              <td><?php echo $i['jenis_kelamin'];?></td> 
                                              <td><?php echo $i['nomor_hp'];?></td> 
                                              <td><?php echo $i['jabatan'];?></td> 
                                              <td><?php echo $i['nama_cabang'];?></td> 
                                           <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pegawai;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pegawai;?>"> DELETE</button>
                                                
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

       <form  action="<?php echo base_url().'pegawai/simpan_pegawai'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH DATA KARYAWAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                                     
                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Cabang *</label>
                                        <select class="form-control" name="id_cabang" required>
                                            <option value="">--pilih--</option>
                                              <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                             <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                              <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Karyawan *</label>
                                        <input required type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir *</label>
                                        <input required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input required type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Kelamin *</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                          <option value="">--pilih--</option>
                                          <option>Laki-Laki</option>
                                          <option>Perempuan</option>
                                        </select>
                                  </div> 

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor HP *</label>
                                        <input required type="text" name="nomor_hp" class="form-control" placeholder="Nomor HP"> 
                                  </div> 

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jabatan *</label>
                                        <input required type="text" name="jabatan" class="form-control" placeholder="Jabatan"> 
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







  <?php foreach ($data_pegawai->result_array() as $i) :
                                            $id_pegawai=$i['id_pegawai'];
                                          ?>
       <form  action="<?php echo base_url().'pegawai/update_pegawai'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pegawai;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE DATA KARYAWAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai;?>">


                               

                             <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Cabang *</label>
                                        <select class="form-control" name="id_cabang" required>
                                            <option value="">--pilih--</option>
                                              <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                             <option <?= ($i['id_cabang']==$key['id_cabang'])?'selected':'';?> value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                              <?php endforeach;?>
                                        </select>
                                  </div> 

                                  
                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Karyawan *</label>
                                        <input value="<?php echo $i['nama_pegawai'];?>" required type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir *</label>
                                        <input value="<?php echo $i['tempat_lahir'];?>" required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input value="<?php echo $i['tanggal_lahir'];?>" required type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Kelamin *</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                          <option value="">--pilih--</option>
                                          <option <?= ($i['jenis_kelamin']=="Laki-Laki")?'selected':'';?> >Laki-Laki</option>
                                          <option <?= ($i['jenis_kelamin']=="Perempuan")?'selected':'';?> >Perempuan</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor HP *</label>
                                        <input value="<?php echo $i['nomor_hp'];?>"  required type="text" name="nomor_hp" class="form-control" placeholder="Nomor HP"> 
                                  </div> 

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jabatan *</label>
                                        <input value="<?php echo $i['jabatan'];?>" required type="text" name="jabatan" class="form-control" placeholder="Jabatan"> 
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



   <?php foreach ($data_pegawai->result_array() as $i) :
                                            $id_pegawai=$i['id_pegawai'];
                                          ?>
       <form  action="<?php echo base_url().'pegawai/hapus_pegawai'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pegawai;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS DATA KARYAWAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pegawai;?>">
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
  text: 'Karyawan Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Karyawan Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Karyawan Behasil di HAPUS'
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

