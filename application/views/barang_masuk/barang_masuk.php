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
                                    <h4 class="card-title">DATA BARANG MASUK</h4>
                                    <?php if($this->session->userdata('level')=="admin"):?>
                                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH BARANG MASUK</button>
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
                                                        <th>Nama Supplier</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Jumlah Masuk</th>
                                                        <th>Biaya Pengeluaran</th>
                                                        <th>Keterangan</th>
                                                        <th>Cabang</th>
                                                        <?php if($this->session->userdata('level')=="admin"):?>
                                                        <th style="text-align: right;">Action</th>
                                                        <?php endif;?>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; foreach ($data_barang_masuk->result_array() as $i) :
                                            $id_barang_masuk=$i['id_barang_masuk'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['nama_barang'];?></td> 
                                              <td><?php echo $i['merek'];?></td> 
                                              <td><?php echo $i['nama_supplier'];?></td> 
                                              <td><?php echo tgl_indo($i['tanggal_masuk']);?></td> 
                                              <td><?php echo $i['jumlah_masuk'];?> <?php echo $i['satuan'];?></td> 
                                              <td><?php echo rupiah($i['biaya_pengeluaran']);?></td> 
                                              <td><?php echo $i['keterangan'];?></td> 
                                              <td><?php echo $i['nama_cabang'];?></td> 
                                           <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_barang_masuk;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_barang_masuk;?>"> DELETE</button>
                                                
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

       <form  action="<?php echo base_url().'barang_masuk/simpan_barang_masuk'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH DATA BARANG MASUK</b></h4>
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
                                        <label class="form-label" >Supplier *</label>
                                        <select class="form-control" name="id_supplier" required>
                                          <option value="">--pilih supplier--</option>
                                          <?php foreach ($this->db->get('supplier')->result_array() as $key):?>
                                              <option value="<?php echo $key['id_supplier'];?>"><?php echo $key['nama_supplier'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk *</label>
                                        <input required type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Masuk *</label>
                                        <input required type="number" name="jumlah_masuk" class="form-control" placeholder="Jumlah Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Biaya Pengeluaran *</label>
                                        <input required type="text" name="biaya_pengeluaran" class="form-control uang" placeholder="Biaya Pengeluaran"> 
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







  <?php foreach ($data_barang_masuk->result_array() as $i) :
                                            $id_barang_masuk=$i['id_barang_masuk'];
                                          ?>
       <form  action="<?php echo base_url().'barang_masuk/update_barang_masuk'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_barang_masuk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE DATA BARANG MASUK</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_barang_masuk" value="<?php echo $id_barang_masuk;?>">


                               




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
                                        <label class="form-label" >Supplier *</label>
                                        <select class="form-control" name="id_supplier" required>
                                          <option value="">--pilih supplier--</option>
                                          <?php foreach ($this->db->get('supplier')->result_array() as $key):?>
                                              <option <?= ($i['id_supplier']==$key['id_supplier'])?'selected':'';?> value="<?php echo $key['id_supplier'];?>"><?php echo $key['nama_supplier'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk *</label>
                                        <input value="<?php echo $i['tanggal_masuk'];?>" required type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Masuk *</label>
                                        <input value="<?php echo $i['jumlah_masuk'];?>" required type="number" name="jumlah_masuk" class="form-control" placeholder="Jumlah Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Biaya Pengeluaran *</label>
                                        <input value="<?php echo $i['biaya_pengeluaran'];?>" required type="text" name="biaya_pengeluaran" class="form-control uang" placeholder="Biaya Pengeluaran"> 
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



   <?php foreach ($data_barang_masuk->result_array() as $i) :
                                            $id_barang_masuk=$i['id_barang_masuk'];
                                          ?>
       <form  action="<?php echo base_url().'barang_masuk/hapus_barang_masuk'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_barang_masuk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS DATA BARANG MASUK</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_barang_masuk;?>">
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
  text: 'Barang Masuk Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Barang Masuk Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Barang Masuk Behasil di HAPUS'
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

