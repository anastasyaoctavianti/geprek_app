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
                                    <h4 class="card-title">PENGELUARAN</h4>
                                      <?php if($this->session->userdata('level')=="admin"):?>
                                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGELUARAN</button>
                                       <?php endif;?>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Pengeluaran</th>
                                                        <th>Biaya Pengeluaran</th>
                                                        <th>Tanggal </th>
                                                        <th>Keterangan </th>
                                                        <th>Cabang </th>
                                                          <?php if($this->session->userdata('level')=="admin"):?>
                                                        <th style="text-align: right;">Action</th>
                                                          <?php endif;?>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; foreach ($data_pengeluaran->result_array() as $i) :
                                            $id_pengeluaran=$i['id_pengeluaran'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['nama_pengeluaran'];?></td> 
                                              <td><?php echo rupiah($i['biaya_pengeluaran']);?></td>
                                              <td><?php echo tgl_indo($i['tanggal_pengeluaran']);?></td>
                                              <td><?php echo $i['keterangan_lain'];?></td>
                                              <td><?php echo $i['nama_cabang'];?></td>
                                             <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengeluaran;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengeluaran;?>"> DELETE</button>
                                                
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

       <form  action="<?php echo base_url().'pengeluaran/simpan_pengeluaran'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGELUARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pengeluaran *</label>
                                        <select class="form-control" name="nama_pengeluaran" required>
                                          <option value="">--pilih--</option>
                                          <option>Listrik</option>
                                          <option>PDAM</option>
                                          <option>ATK</option>
                                          <option>WIFI</option>
                                          <option>Pengeluaran Lainnya...</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Biaya Pengeluaran *</label>
                                        <input required type="text" name="biaya_pengeluaran" class="form-control uang" placeholder="Biaya Pengeluaran"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Pengeluaran *</label>
                                        <input required type="date" name="tanggal_pengeluaran" class="form-control" placeholder="Tanggal Pengeluaran"> 
                                  </div>  

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan_lain" ></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Cabang *</label>
                                        <select class="form-control" name="id_cabang" required>
                                          <option value="">--pilih--</option>
                                          <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                          <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                          <?php endforeach;?>
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







  <?php foreach ($data_pengeluaran->result_array() as $i) :
                                            $id_pengeluaran=$i['id_pengeluaran'];
                                          ?>
       <form  action="<?php echo base_url().'pengeluaran/update_pengeluaran'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengeluaran;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGELUARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengeluaran" value="<?php echo $id_pengeluaran;?>">


                               



                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pengeluaran *</label>
                                        <select class="form-control" name="nama_pengeluaran" required>
                                          <option value="">--pilih--</option>
                                          <option  <?= ($i['nama_pengeluaran']=="Listrik")?'selected':'';?> >Listrik</option>
                                          <option  <?= ($i['nama_pengeluaran']=="PDAM")?'selected':'';?> >PDAM</option>
                                          <option  <?= ($i['nama_pengeluaran']=="ATK")?'selected':'';?> >ATK</option>
                                          <option  <?= ($i['nama_pengeluaran']=="WIFI")?'selected':'';?> >WIFI</option>
                                          <option  <?= ($i['nama_pengeluaran']=="Pengeluaran Lainnya...")?'selected':'';?> >Pengeluaran Lainnya...</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Biaya Pengeluaran *</label>
                                        <input value="<?php echo $i['biaya_pengeluaran'];?>" required type="text" name="biaya_pengeluaran" class="form-control uang" placeholder="Biaya Pengeluaran"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Pengeluaran *</label>
                                        <input value="<?php echo $i['tanggal_pengeluaran'];?>" required type="date" name="tanggal_pengeluaran" class="form-control" placeholder="Tanggal Pengeluaran"> 
                                  </div>  

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan_lain" ><?php echo $i['keterangan_lain'];?></textarea>
                                  </div> 


                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Cabang *</label>
                                        <select class="form-control" name="id_cabang" required>
                                          <option value="">--pilih--</option>
                                          <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                          <option <?= ($i['id_cabang']==$key['id_cabang'])?'selected':'';?> value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                          <?php endforeach;?>
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



   <?php foreach ($data_pengeluaran->result_array() as $i) :
                                            $id_pengeluaran=$i['id_pengeluaran'];
                                          ?>
       <form  action="<?php echo base_url().'pengeluaran/hapus_pengeluaran'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengeluaran;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGELUARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengeluaran;?>">
                         <span style="">Apakah Anda yakin ingin menghapus data ini?</span>
                  

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
  text: 'Pengeluaran Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pengeluaran Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pengeluaran Behasil di HAPUS'
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

