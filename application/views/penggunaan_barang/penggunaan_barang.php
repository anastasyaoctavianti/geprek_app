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
                                    <h4 class="card-title">DATA PENGGUNAAN BARANG</h4>
                                    <?php if($this->session->userdata('level')=="admin"):?>
                                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGGUNAAN BARANG</button>
                                     <?php endif;?>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Barang</th>
                                                        <th>Merek</th>
                                                        <th>Tanggal</th>
                                                        <th>Jumlah Penggunaan</th>
                                                        <th>Keterangan</th>
                                                        <th>Cabang</th>
                                                        <?php if($this->session->userdata('level')=="admin"):?>
                                                        <th style="text-align: right;">Action</th>
                                                        <?php endif;?>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; foreach ($data_penggunaan_barang->result_array() as $i) :
                                            $id_penggunaan_barang=$i['id_penggunaan_barang'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['nama_barang'];?></td> 
                                              <td><?php echo $i['merek'];?></td>  
                                              <td><?php echo tgl_indo($i['tanggal']);?></td> 
                                              <td><?php echo $i['jumlah_penggunaan'];?> <?php echo $i['satuan'];?></td> 
                                              <td><?php echo $i['keterangan'];?></td> 
                                              <td><?php echo $i['nama_cabang'];?></td> 
                                           <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_penggunaan_barang;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_penggunaan_barang;?>"> DELETE</button>
                                                
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

       <form  action="<?php echo base_url().'penggunaan_barang/simpan_penggunaan_barang'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH DATA PENGGUNAAN BARANG</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                                     

                                 <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Cabang *</label>
                                         <select class="form-control" name="id_cabang" id="id_cabang" required>
                                                <option value="">--pilih--</option>
                                               <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                            <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                                <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Barang *</label>
                                        <select class="form-control" name="id_barang" id="id_barang" required>
                                          <option value="">--pilih barang--</option>
                                        </select>
                                  </div> 



                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal *</label>
                                        <input required type="date" name="tanggal" class="form-control" placeholder="Tanggal"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Penggunaan *</label>
                                        <input required type="number" name="jumlah_penggunaan" class="form-control" placeholder="Jumlah Penggunaan"> 
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







  <?php foreach ($data_penggunaan_barang->result_array() as $i) :
                                            $id_penggunaan_barang=$i['id_penggunaan_barang'];
                                          ?>
       <form  action="<?php echo base_url().'penggunaan_barang/update_penggunaan_barang'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_penggunaan_barang;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE DATA PENGGUNAAN BARANG</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_penggunaan_barang" value="<?php echo $id_penggunaan_barang;?>">


                               




                             

                                 <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Barang *</label>
                                        <select class="form-control" name="id_barang" required>
                                          <option value="">--pilih barang--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM barang,cabang WHERE barang.id_cabang=cabang.id_cabang")->result_array() as $key):?>
                                              <option <?= ($i['id_barang']==$key['id_barang'])?'selected':'';?> value="<?php echo $key['id_barang'];?>"><?php echo $key['nama_barang'];?> | <?php echo $key['merek'];?> | <?php echo $key['nama_cabang'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 



                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal *</label>
                                        <input value="<?php echo $i['tanggal'];?>" required type="date" name="tanggal" class="form-control" placeholder="Tanggal"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Penggunaan *</label>
                                        <input value="<?php echo $i['jumlah_penggunaan'];?>" required type="number" name="jumlah_penggunaan" class="form-control" placeholder="Jumlah Penggunaan"> 
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



   <?php foreach ($data_penggunaan_barang->result_array() as $i) :
                                            $id_penggunaan_barang=$i['id_penggunaan_barang'];
                                          ?>
       <form  action="<?php echo base_url().'penggunaan_barang/hapus_penggunaan_barang'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_penggunaan_barang;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS DATA PENGGUNAAN BARANG</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_penggunaan_barang;?>">
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
  text: 'Penggunaan Barang Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Penggunaan Barang Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Penggunaan Barang Behasil di HAPUS'
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

