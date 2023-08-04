<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
       
        
            <section id="complex-header-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <span class="card-title">CUSTOMER</span>
                                    <?php if($this->session->userdata('level')!="OWNER"):?>
                                   <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaltambah">TAMBAH CUSTOMER</button>
                                   <?php endif;?>
                                </div>
                                <div class="table-responsive">
                                     <table class="table zero-configuration">
                                          <thead>
                                              <tr>
                                                <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                <th>Kode Customer</th>
                                                <th>Nama Lengkap</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <?php if($this->session->userdata('level')!="OWNER"):?>
                                                <th style="text-align: right;">Action</th>
                                                <?php endif;?>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             <?php $no=1; foreach ($data_konsumen->result_array() as $i) :
                                            $id_konsumen=$i['id_konsumen'];
                                          ?>
                                            <tr>
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['kode_konsumen'];?></td> 
                                              <td><?php echo $i['nama_konsumen'];?></td> 
                                              <td><?php echo $i['alamat'];?></td> 
                                              <td><?php echo $i['no_hp'];?></td> 
                                              <?php if($this->session->userdata('level')!="OWNER"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                               
                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-bs-toggle="modal" data-bs-target="#ModalUpdate<?php echo $id_konsumen;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus<?php echo $id_konsumen;?>"> DELETE</button>
                                                 
                                                </div>
                                              </td>
                                            <?php endif;?>
                                            </tr>
                                            <?php endforeach;?>
                                          </tbody>
                                      </table>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


    </div>
</div>









    <form  action="<?php echo base_url().'konsumen/simpan_konsumen'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH CUSTOMER</b></h4>
                                  <button  type="button"  class="close"  data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">

       <?php 
$cek04792 = $this->db->query("SELECT max(id_konsumen) AS no FROM konsumen order by id_konsumen desc limit 1");
$dt_Kon = $cek04792->row_array();
$no289132 = $dt_Kon['no']+1;

$a8481 = "K";
$num1368 = $a8481 . sprintf('%03s', $no289132);
        ?>  


                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Kode Customer *</label>
                                <input value="<?php echo $num1368;?>" readonly required type="text" name="kode_konsumen" class="form-control" placeholder="Kode Customer"> 
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Nama Customer *</label>
                                <input required type="text" name="nama_konsumen" class="form-control" placeholder="Nama Customer"> 
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Alamat *</label>
                                <textarea class="form-control" name="alamat" required></textarea>
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >No HP *</label>
                                <input required type="number" name="no_hp" class="form-control" placeholder="No HP"> 
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Password *</label>
                                <input autocomplete="new-password" required type="password" name="password" class="form-control" placeholder="Password"> 
                          </div> 

                         

                          
                            
                              
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>







  <?php foreach ($data_konsumen->result_array() as $i) :
                                            $id_konsumen=$i['id_konsumen'];
                                          ?>
       <form  action="<?php echo base_url().'konsumen/update_konsumen'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_konsumen;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE CUSTOMER</b></h4>
                                  <button  type="button"  class="close"  data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_konsumen" value="<?php echo $id_konsumen;?>">



                           <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Kode Customer *</label>
                                <input readonly value="<?php echo $i['kode_konsumen'];?>" required type="text" name="kode_konsumen" class="form-control" placeholder="Kode Customer"> 
                          </div>

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Nama Customer *</label>
                                <input value="<?php echo $i['nama_konsumen'];?>" required type="text" name="nama_konsumen" class="form-control" placeholder="Nama Customer"> 
                          </div> 


                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Alamat *</label>
                                <textarea class="form-control" name="alamat" required><?php echo $i['alamat'];?></textarea>
                          </div> 

                          <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >No HP *</label>
                                <input value="<?php echo $i['no_hp'];?>" required type="number" name="no_hp" class="form-control" placeholder="No HP"> 
                          </div> 

                           <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                <label class="form-label" >Password </label>
                                <input autocomplete="new-password"  type="password" name="password" class="form-control" placeholder="Password"> 
                          </div> 
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_konsumen->result_array() as $i) :
                                            $id_konsumen=$i['id_konsumen'];
                                          ?>
       <form  action="<?php echo base_url().'konsumen/hapus_konsumen'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_konsumen;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS CUSTOMER</b></h4>
                                  <button  type="button"  class="close"  data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_konsumen;?>">
                         Apakah Anda yakin ingin menghapus data ini?
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-warning">HAPUS</button>
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
  text: 'Customer Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Customer Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Customer Behasil di HAPUS'
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



