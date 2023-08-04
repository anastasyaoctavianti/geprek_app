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
                                      <h4 class="card-title" style="float: left; margin-left: 20px; margin-top: 20px;">LAPORAN PEREDARAN BRUTO</h4>



                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                     

                  <div class="row">
                        <div class="col-md-3">
                            TAHUN
                        </div>
                      </div>
                             <form target="_blank" action="<?php echo site_url('penjualan/filter3') ?>" method="post">
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
                </section>
                                          

            </div>
        </div>
    </div>
    <!-- END: Content-->
