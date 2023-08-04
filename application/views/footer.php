

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <?php echo date('Y');?> APLIKASI POINT OF SALES (POS) DAN PENGELOLAAN DATA STOK BAHAN BAKU PADA RUMAH MAKAN CEPAT SAJI AYAM GEPREK SA’I 
       </span>
           
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

     <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <!-- END: Page Vendor JS-->

     <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/scripts/datatables/datatable.js"></script>

     <script src="<?php echo base_url();?>assets/alert/query.js"></script>
<script type="text/javascript">
    $( '.uang' ).mask('00.000.000.000', {reverse: true});
</script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>


<script>
  $(document).ready(function(){ 
   
    
    $("#kd_konsumen").change(function(){ 

      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("/barang/carikon"); ?>", 
        data: {kd_konsumen : $("#kd_konsumen").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#kd_penjualan").html(response.list_barang).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });


    });

   


  });
  </script>



<script>
  $(document).ready(function(){ 
   
    
    $("#kd_penjualan").change(function(){ 

      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("/menu_makanan/carihrg"); ?>", 
        data: {kd_penjualan : $("#kd_penjualan").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#hasilretur").html(response.list_barang).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });


    });

   


  });
  </script>

   <script>
  $(document).ready(function(){ 
    $("#kd_barang").change(function(){ 
     
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("/penjualan/fungsitambah"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_barang : $("#kd_barang").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#harga1").html(response.list_barang).show();

        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });

    });


  });
  </script>
    <script>
    
function convertToRupiah(angka)
{
  var rupiah = '';    
  var angkarev = angka.toString().split('').reverse().join('');
  for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
  return ''+rupiah.split('',rupiah.length-1).reverse().join('');
}

function sum1() {
      var harga_jual1 = document.getElementById('harga_jual1').value;
      var qwe1 = harga_jual1.replace(".", "");
      var qwe2 = qwe1.replace(".", "");
      var qwe3 = qwe2.replace(".", "");
      var hasil_harga_jual = qwe3.replace(".", "");



      var jumlah_jual1 = document.getElementById('jumlah_jual1').value;
      var q1we1 = jumlah_jual1.replace(".", "");
      var q1we2 = q1we1.replace(".", "");
      var q1we3 = q1we2.replace(".", "");
      var hasil_jumlah_jual = q1we3.replace(".", "");


      if(document.getElementById('harga_jual11')!=null){
        var harga_jual11 = document.getElementById('harga_jual11').value;
        var qwe1 = harga_jual11.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_harga_jual1 = qwe3.replace(".", "");
      }else{
        var hasil_harga_jual1 =0;
      }

      if(document.getElementById('jumlah_jual11')!=null){
        var jumlah_jual11 = document.getElementById('jumlah_jual11').value;
        var qwe1 = jumlah_jual11.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_jumlah_jual1 = qwe3.replace(".", "");
      }else{
        var hasil_jumlah_jual1 =0;
      }

      if(document.getElementById('harga_jual12')!=null){
        var harga_jual12 = document.getElementById('harga_jual12').value;
        var qwe1 = harga_jual12.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_harga_jual2 = qwe3.replace(".", "");
      }else{
        var hasil_harga_jual2 =0;
      }

      if(document.getElementById('jumlah_jual12')!=null){
        var jumlah_jual12 = document.getElementById('jumlah_jual12').value;
        var qwe1 = jumlah_jual12.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_jumlah_jual2 = qwe3.replace(".", "");
      }else{
        var hasil_jumlah_jual2 =0;
      }

      if(document.getElementById('harga_jual13')!=null){
        var harga_jual13 = document.getElementById('harga_jual13').value;
        var qwe1 = harga_jual13.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_harga_jual3 = qwe3.replace(".", "");
      }else{
        var hasil_harga_jual3 =0;
      }

      if(document.getElementById('jumlah_jual13')!=null){
        var jumlah_jual13 = document.getElementById('jumlah_jual13').value;
        var qwe1 = jumlah_jual13.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_jumlah_jual3 = qwe3.replace(".", "");
      }else{
        var hasil_jumlah_jual3 =0;
      }

      



      var result = parseInt(hasil_harga_jual) * parseInt(hasil_jumlah_jual);
      var result2 = parseInt(hasil_harga_jual1) * parseInt(hasil_jumlah_jual1);
      var result3 = parseInt(hasil_harga_jual2) * parseInt(hasil_jumlah_jual2);
      var result4 = parseInt(hasil_harga_jual3) * parseInt(hasil_jumlah_jual3);
      var num = result+result2+result3+result4;
      if (!isNaN(num)) {

         document.getElementById('subtotal1').value = convertToRupiah(result);
         document.getElementById('hasil_total').value = convertToRupiah(num);

      }
}

function sum11() {
      var harga_jual1 = document.getElementById('harga_jual1').value;
      var qwe1 = harga_jual1.replace(".", "");
      var qwe2 = qwe1.replace(".", "");
      var qwe3 = qwe2.replace(".", "");
      var hasil_harga_jual = qwe3.replace(".", "");



      var jumlah_ambil1 = document.getElementById('jumlah_ambil1').value;
      var q1we1 = jumlah_ambil1.replace(".", "");
      var q1we2 = q1we1.replace(".", "");
      var q1we3 = q1we2.replace(".", "");
      var hasil_jumlah_ambil = q1we3.replace(".", "");


      if(document.getElementById('harga_jual11')!=null){
        var harga_jual11 = document.getElementById('harga_jual11').value;
        var qwe1 = harga_jual11.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_harga_jual1 = qwe3.replace(".", "");
      }else{
        var hasil_harga_jual1 =0;
      }

      if(document.getElementById('jumlah_ambil11')!=null){
        var jumlah_ambil11 = document.getElementById('jumlah_ambil11').value;
        var qwe1 = jumlah_ambil11.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_jumlah_ambil1 = qwe3.replace(".", "");
      }else{
        var hasil_jumlah_ambil1 =0;
      }

      if(document.getElementById('harga_jual12')!=null){
        var harga_jual12 = document.getElementById('harga_jual12').value;
        var qwe1 = harga_jual12.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_harga_jual2 = qwe3.replace(".", "");
      }else{
        var hasil_harga_jual2 =0;
      }

      if(document.getElementById('jumlah_ambil12')!=null){
        var jumlah_ambil12 = document.getElementById('jumlah_ambil12').value;
        var qwe1 = jumlah_ambil12.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_jumlah_ambil2 = qwe3.replace(".", "");
      }else{
        var hasil_jumlah_ambil2 =0;
      }

      if(document.getElementById('harga_jual13')!=null){
        var harga_jual13 = document.getElementById('harga_jual13').value;
        var qwe1 = harga_jual13.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_harga_jual3 = qwe3.replace(".", "");
      }else{
        var hasil_harga_jual3 =0;
      }

      if(document.getElementById('jumlah_ambil13')!=null){
        var jumlah_ambil13 = document.getElementById('jumlah_ambil13').value;
        var qwe1 = jumlah_ambil13.replace(".", "");
        var qwe2 = qwe1.replace(".", "");
        var qwe3 = qwe2.replace(".", "");
        var hasil_jumlah_ambil3 = qwe3.replace(".", "");
      }else{
        var hasil_jumlah_ambil3 =0;
      }

      



      var result = parseInt(hasil_harga_jual) * parseInt(hasil_jumlah_ambil);
      var result2 = parseInt(hasil_harga_jual1) * parseInt(hasil_jumlah_ambil1);
      var result3 = parseInt(hasil_harga_jual2) * parseInt(hasil_jumlah_ambil2);
      var result4 = parseInt(hasil_harga_jual3) * parseInt(hasil_jumlah_ambil3);
      var num = result+result2+result3+result4;
      if (!isNaN(num)) {

         document.getElementById('subtotal1').value = convertToRupiah(result);
         document.getElementById('hasil_total').value = convertToRupiah(num);

      }
}

 
</script>




<script>
    
function convertToRupiah(angka)
{
  var rupiah = '';    
  var angkarev = angka.toString().split('').reverse().join('');
  for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
  return ''+rupiah.split('',rupiah.length-1).reverse().join('');
}

function sumt() {
      var subtota = document.getElementById('subtota').value;
      var qwe1 = subtota.replace(".", "");
      var qwe2 = qwe1.replace(".", "");
      var qwe3 = qwe2.replace(".", "");
      var subtota = qwe3.replace(".", "");

      var diskon = document.getElementById('diskon').value;
      var qwe1 = diskon.replace(".", "");
      var qwe2 = qwe1.replace(".", "");
      var qwe3 = qwe2.replace(".", "");
      var diskon = qwe3.replace(".", "");

      var bayar = document.getElementById('bayar').value;
      var q1we1 = bayar.replace(".", "");
      var q1we2 = q1we1.replace(".", "");
      var q1we3 = q1we2.replace(".", "");
      var bayar = q1we3.replace(".", "");

      var kembalian = document.getElementById('kembalian').value;
      var q1we1 = kembalian.replace(".", "");
      var q1we2 = q1we1.replace(".", "");
      var q1we3 = q1we2.replace(".", "");
      var kembalian = q1we3.replace(".", "");

      var result = parseInt(subtota) - parseInt(diskon);
      var grandtotal = result;
      if (!isNaN(grandtotal)) {

         document.getElementById('grandtotal').value = convertToRupiah(grandtotal);

      }
}
function sumr() {
      var subtota = document.getElementById('subtota').value;
      var qwe1 = subtota.replace(".", "");
      var qwe2 = qwe1.replace(".", "");
      var qwe3 = qwe2.replace(".", "");
      var subtota = qwe3.replace(".", "");

      var diskon = document.getElementById('diskon').value;
      var qwe1 = diskon.replace(".", "");
      var qwe2 = qwe1.replace(".", "");
      var qwe3 = qwe2.replace(".", "");
      var diskon = qwe3.replace(".", "");

      var bayar = document.getElementById('bayar').value;
      var q1we1 = bayar.replace(".", "");
      var q1we2 = q1we1.replace(".", "");
      var q1we3 = q1we2.replace(".", "");
      var bayar = q1we3.replace(".", "");

      var kembalian = document.getElementById('kembalian').value;
      var q1we1 = kembalian.replace(".", "");
      var q1we2 = q1we1.replace(".", "");
      var q1we3 = q1we2.replace(".", "");
      var kembalian = q1we3.replace(".", "");

      var result = parseInt(subtota) - parseInt(diskon);
      var result2 = parseInt(bayar)-parseInt(result);
      var kembalian = result2;
      if (!isNaN(kembalian)) {

         document.getElementById('kembalian').value = convertToRupiah(kembalian);

      }
}

 
</script>


<script>
  $(document).ready(function(){ 
    $("#id_cabang").change(function(){ 
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("/barang/cari_barang"); ?>", 
        data: {id_cabang : $("#id_cabang").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#id_barang").html(response.list_barang).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>


  
<?php if(!empty($id_penjualan)):?>
<script>
  $(document).ready(function(){ 
    $("#kk_konsumen").change(function(){ 
            kk_konsumen = document.getElementById('kk_konsumen').value;
            if (kk_konsumen==="baru") {
             window.location = "<?php echo base_url();?>penjualan/tambahv2/<?php echo $id_penjualan;?>";
            }
    });


  });
  </script>
  <?php endif;?>

  <script type="text/javascript">
     $("#stat_peng").change(function(){ 
      if($("#stat_peng").val()=="Penjualan Dikirim"){
        document.getElementById("demo").innerHTML = '<div class="row"><div class="col-xl-3 col-md-6 col-12 mb-1">'+
                                            '<div class="form-group">'+
                                                '<label>Kurir </label>'+
                                               '<select class="form-control js-example-basic-single" required name="id_kurir">'+
                                  '<option value="">--pilih kurir--</option>'+
                                  <?php foreach ($this->db->query("SELECT * FROM pegawai")->result() as $key):?>'<option value="<?php echo $key->id_pegawai;?>"><?php echo $key->nama_pegawai;?></option>'+<?php endforeach;?>
                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xl-3 col-md-6 col-12 mb-1">'+
                                            '<div class="form-group">'+
                                                '<label>Tanggal Pengiriman </label>'+
                                               '<input required type="date" name="tanggal_pengiriman" class="form-control" placeholder="Tanggal Pengiriman">'+ 
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xl-3 col-md-6 col-12 mb-1">'+
                                            '<div class="form-group">'+
                                                '<label>Alamat Penerima </label>'+
                                               '<textarea class="form-control" name="alamat_penerima" required></textarea>'+
                                            '</div>'+
                                       '</div>'+
                                        '<div class="col-xl-3 col-md-6 col-12 mb-1">'+
                                            '<div class="form-group">'+
                                                '<label>Status Pengiriman </label>'+
                                               '<select class="form-control js-example-basic-single" name="status_pengiriman">'+
                                  '<option value="">--pilih--</option>'+
                                   '<option>Menunggu</option>'+
                                  '<option>Dalam Perjalanan</option>'+
                                  '<option>Telah Sampai</option></select>'+
                                            '</div>'+
                                        '</div></div>';
        $('.js-example-basic-single').select2({});
      }else{
        document.getElementById("demo").innerHTML = "";
      }


        
          });
</script>
<?php foreach ($this->db->query('SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen order by penjualan.id_penjualan asc')->result() as $i) :
                                            $id_penjualan=$i->id_penjualan;

                                          ?>
  <script type="text/javascript">
     $("#status_pembelian<?php echo $id_penjualan;?>").change(function(){ 
      if($("#status_pembelian<?php echo $id_penjualan;?>").val()=="DIPROSES"){
        document.getElementById("demo2v<?php echo $id_penjualan;?>").innerHTML = '<div class="col-12 col-md-12" style="margin-bottom: 12px;">'+
                                            '<div class="form-group">'+
                                                '<label>Kurir </label>'+
                                               '<select class="form-control js-example-basic-single" required name="id_kurir">'+
                                  '<option value="">--pilih kurir--</option>'+
                                  <?php foreach ($this->db->query("SELECT * FROM pegawai")->result() as $key):?>'<option  value="<?php echo $key->id_pegawai;?>"><?php echo $key->nama_pegawai;?></option>'+<?php endforeach;?>
                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-12 col-md-12" style="margin-bottom: 12px;">'+
                                            '<div class="form-group">'+
                                                '<label>Tanggal Pengiriman </label>'+
                                               '<input  required type="date" name="tanggal_pengiriman" class="form-control" placeholder="Tanggal Pengiriman">'+ 
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-12 col-md-12" style="margin-bottom: 12px;">'+
                                            '<div class="form-group">'+
                                                '<label>Alamat Penerima </label>'+
                                               '<textarea class="form-control" name="alamat_penerima" required><?php echo $i->alamat;?></textarea>'+
                                            '</div>'+
                                       '</div>'+
                                        '<div class="col-12 col-md-12" style="margin-bottom: 12px;">'+
                                            '<div class="form-group">'+
                                                '<label>Status Pengiriman </label>'+
                                               '<select class="form-control js-example-basic-single" name="status_pengiriman">'+
                                  '<option value="">--pilih--</option>'+
                                   '<option  >Menunggu</option>'+
                                  '<option >Dalam Perjalanan</option>'+
                                  '<option >Telah Sampai</option></select>'+
                                            '</div>'+
                                        '</div>';
        $('.js-example-basic-single').select2({});
      }else{
        document.getElementById("demo2v<?php echo $id_penjualan;?>").innerHTML = "";
      }


        
          });
</script>
<?php endforeach;?>

  <script type="text/javascript">
     $("#metode_pembayaran").change(function(){ 
      if($("#metode_pembayaran").val()=="TRANSFER"){
        document.getElementById("demo3v").innerHTML = '<div class="col-12 col-md-12" style="margin-bottom: 12px;">'+
                                '<label class="form-label" >Bukti Pembayaran Transfer *</label>'+
                                '<input name="bukti_pembayaran" required class="form-control" type="file">'+
                          '</div>';
      }else{
        document.getElementById("demo3v").innerHTML = "";
      }


        
          });
</script>