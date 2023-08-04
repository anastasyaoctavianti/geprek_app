<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
       
        
            <section id="complex-header-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <span class="card-title">LAPORAN PENGIRIMAN</span>
                                </div>
                              


                                       <div class="row" style="margin-left: 20px; margin-top: 10px;">
      <div class="col-md-3 text-right">
  <h6 style="text-align: left;">DARI TANGGAL</h6>
   </div>
      <div class="col-md-3 text-right">
  <h6 style="text-align: left;">SAMPAI TANGGAL</h6>
   </div>
      <div class="col-md-3 text-right">
  <h6 style="text-align: left;">STATUS PENGIRIMAN</h6>
   </div>
 </div>
                             <form target="_blank" action="<?php echo site_url('pengiriman/filter') ?>" method="post">
                                 <div class="row" style="margin-left: 20px; margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-md-3">
                            <input type="date" name="tgl1" class="form-control" required autocomplete="off" />
                        </div>
                          <div class="col-md-3">
                        <input type="date" name="tgl2" class="form-control" required autocomplete="off" />
                        </div>
                          <div class="col-md-3">
                       <select class="form-control js-example-basic-single" name="status_pengiriman">
                                  <option value="">--pilih--</option>
                                  <option  >SEMUA</option>
                                  <option  >Menunggu</option>
                                  <option  >Dalam Perjalanan</option>
                                  <option  >Telah Sampai</option>
                                </select>
                        </div>
                          
                         <div class="col-md-1">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak" >
                        </div>
                      </div>
                      </form>
              </div>


                            </div>
                        </div>
                    </div>
                </section>


                
    </div>
</div>






