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
                                    <h4 class="card-title">PENGGAJIAN</h4>
                                      <?php if($this->session->userdata('level')=="admin"):?>
                                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGGAJIAN</button>
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
                                                        <th>Tanggal Penggajian</th>
                                                        <th>Gaji Pokok </th>
                                                        <th>Lembur </th>
                                                        <th>Tunjangan </th>
                                                        <th>Hutang </th>
                                                        <th>Gaji Bersih </th>
                                                        <th>Keterangan </th>
                                                          <?php if($this->session->userdata('level')=="admin"):?>
                                                        <th style="text-align: right;">Action</th>
                                                          <?php endif;?>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; foreach ($data_penggajian->result_array() as $i) :
                                            $id_penggajian=$i['id_penggajian'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['nama_pegawai'];?></td> 
                                              <td><?php echo tgl_indo($i['tanggal_penggajian']);?></td>
                                              <td><?php echo rupiah($i['gaji_pokok']);?></td>
                                              <td><?php echo rupiah($i['lembur']);?></td>
                                              <td><?php echo rupiah($i['tunjangan']);?></td>
                                              <td><?php echo rupiah($i['hutang']);?></td>
                                              <td><?php echo rupiah($i['gaji_bersih']);?></td>
                                              <td><?php echo $i['keterangan'];?></td>
                                             <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_penggajian;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_penggajian;?>"> DELETE</button>
                                                
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

       <form  action="<?php echo base_url().'penggajian/simpan_penggajian'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGGAJIAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pegawai *</label>
                                        <select class="form-control js-example-basic-single" required name="id_pegawai">
                                                  <option value="">--pilih pegawai--</option>
                                                  <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                                  <option value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nama_pegawai'];?></option>
                                                  <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Penggajian *</label>
                                        <input required type="date" name="tanggal_penggajian" class="form-control" placeholder="Tanggal Penggajian"> 
                                  </div>  

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Gaji Pokok *</label>
                                        <input required type="text" name="gaji_pokok" class="form-control uang" placeholder="Gaji Pokok"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Lembur *</label>
                                        <input required type="text" name="lembur" class="form-control uang" placeholder="Lembur"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tunjangan *</label>
                                        <input required type="text" name="tunjangan" class="form-control uang" placeholder="Tunjangan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Hutang *</label>
                                        <input required type="text" name="hutang" class="form-control uang" placeholder="Hutang"> 
                                  </div> 

                                  

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ></textarea>
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







  <?php foreach ($data_penggajian->result_array() as $i) :
                                            $id_penggajian=$i['id_penggajian'];
                                          ?>
       <form  action="<?php echo base_url().'penggajian/update_penggajian'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_penggajian;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGGAJIAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_penggajian" value="<?php echo $id_penggajian;?>">


                               



                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pegawai *</label>
                                        <select class="form-control" required name="id_pegawai">
                                                  <option value="">--pilih pegawai--</option>
                                                  <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                                  <option <?= ($i['id_pegawai']==$key['id_pegawai'])?'selected':'';?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nama_pegawai'];?></option>
                                                  <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Penggajian *</label>
                                        <input value="<?php echo $i['tanggal_penggajian'];?>" required type="date" name="tanggal_penggajian" class="form-control" placeholder="Tanggal Penggajian"> 
                                  </div>  

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Gaji Pokok *</label>
                                        <input value="<?php echo $i['gaji_pokok'];?>" required type="text" name="gaji_pokok" class="form-control uang" placeholder="Gaji Pokok"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Lembur *</label>
                                        <input value="<?php echo $i['lembur'];?>" required type="text" name="lembur" class="form-control uang" placeholder="Lembur"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tunjangan *</label>
                                        <input value="<?php echo $i['tunjangan'];?>" required type="text" name="tunjangan" class="form-control uang" placeholder="Tunjangan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Hutang *</label>
                                        <input value="<?php echo $i['hutang'];?>" required type="text" name="hutang" class="form-control uang" placeholder="Hutang"> 
                                  </div> 

                                  

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ><?php echo $i['keterangan'];?></textarea>
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



   <?php foreach ($data_penggajian->result_array() as $i) :
                                            $id_penggajian=$i['id_penggajian'];
                                          ?>
       <form  action="<?php echo base_url().'penggajian/hapus_penggajian'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_penggajian;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGGAJIAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_penggajian;?>">
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
  text: 'Penggajian Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Penggajian Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Penggajian Behasil di HAPUS'
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

