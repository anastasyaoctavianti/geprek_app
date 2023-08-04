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
                                      <h4 class="card-title" style="float: left; margin-left: 20px; margin-top: 20px;">LAPORAN LABA/RUGI PERTAHUN</h4>



                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                     

                  <div class="row">
                        <div class="col-md-3">
                           TAHUN
                        </div>
                         <div class="col-md-3">
                        CABANG
                        </div>
                      </div>
                             <form target="_blank" action="<?php echo site_url('penjualan/filter2') ?>" method="post">
                   <div class="row">
                        <div class="col-md-3 text-right">
                            <select class="form-control" name="tahun" required>
                                <option value="">--pilih--</option>
                                <?php 
                               $thn=date('Y');
                                for ($i=0; $i < 12; $i++) { 
                                ?>
                                <option><?php echo $thn;?></option>

                              <?php $thn=$thn-1;  }?>
                            </select>
                        </div>
                         <div class="col-md-3 text-right">
                            <select class="form-control" name="id_cabang" id="id_cabang" required>
                                    <option value="">--pilih--</option>
                                    <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                    <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                    <?php endforeach;?>
                            </select>
                        </div>
                          
                         <div class="col-md-1 text-right">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak" >
                        </div>
                      </div>
                      
                      </form>
              </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          

           <div class="content-body">
              
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div>
                                      <h4 class="card-title" style="float: left; margin-left: 20px; margin-top: 20px;">LAPORAN LABA/RUGI PERBULAN</h4>



                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                     

                  <div class="row">
                        <div class="col-md-3">
                           TAHUN
                        </div>
                        <div class="col-md-3">
                           BULAN
                        </div>
                        <div class="col-md-3">
                           CABANG
                        </div>
                      </div>
                             <form target="_blank" action="<?php echo site_url('penjualan/filter22') ?>" method="post">
                   <div class="row">
                        <div class="col-md-3 text-right">
                            <select class="form-control" name="tahun" required>
                                <option value="">--pilih--</option>
                                <?php 
                               $thn=date('Y');
                                for ($i=0; $i < 12; $i++) { 
                                ?>
                                <option><?php echo $thn;?></option>

                              <?php $thn=$thn-1;  }?>
                            </select>
                        </div>
                        <div class="col-md-3 text-right">
                              <select class="form-control" name="bulan" required>
                                  <option value="">--pilih bulan--</option>
                                  <option>Januari</option>
                                  <option>Februari</option>
                                  <option>Maret</option>
                                  <option>April</option>
                                  <option>Mei</option>
                                  <option>Juni</option>
                                  <option>Juli</option>
                                  <option>Agustus</option>
                                  <option>September</option>
                                  <option>Oktober</option>
                                  <option>November</option>
                                  <option>Desember</option>
                                </select>
                              </div>
                        <div class="col-md-3 text-right">
                            <select class="form-control" name="id_cabang" id="id_cabang" required>
                                    <option value="">--pilih--</option>
                                    <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                    <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                    <?php endforeach;?>
                            </select>
                        </div>
                          
                         <div class="col-md-1 text-right">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak" >
                        </div>
                      </div>
                      
                      </form>
              </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                          

            </div>
        </div>
    </div>
    <!-- END: Content-->
