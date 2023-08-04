<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
  <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}
?>

  <?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
<body>
       <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                 <img width="100px" src="<?= base_url() ?>assets/logo2.png">
            </td>
            <td>
                <font style="margin-right: 100px;" size="5">AYAM GEPREK SA'I</font><br>
                <font style="margin-right: 100px;" size="3">Jl. Karang Anyar 1, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714</font><br>
                <font style="margin-right: 100px;" size="3">Telp. (0821) 6961 2018</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>




    <br>
    <div style="text-align: center; ">
        <font size="3"><b><u>LAPORAN GRAFIK MENU MAKANAN PALING LAKU CABANG <?php echo strtoupper($nama_cabang);?> TAHUN <?php echo $tahun;?></u></b></font><br>
    </div>
    <br>

    <br>
 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <canvas id="myChart" style="width:100%; height: 600px;"></canvas>
<BR><BR>



<script type="text/javascript">
   var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar', // also try bar or other graph types

        // The data for our dataset
        data: {
            labels: [<?php foreach ($this->db->query("SELECT * FROM menu_makanan")->result_array() as $key):?>"<?php echo $key['nama_menu'];?>",<?php endforeach;?>],
            // Information about the dataset
        datasets: [{
                label: 'Total Terjual',
                backgroundColor: ['rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)',],
                borderColor: ['rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)',],
                data: [<?php 
                              $stt="";
                        foreach ($this->db->query("SELECT * FROM menu_makanan")->result_array() as $key){
                            $nm_awal=0;
                            $id_menu_makanan=$key['id_menu_makanan'];
                            $num_jm1=$this->db->query("SELECT SUM(jumlah_jual) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_barang='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->num_rows();
                            $jm1=$this->db->query("SELECT SUM(jumlah_jual) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_barang='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->row_array();
                            if ($num_jm1!=0) {
                                $nm_awal=$nm_awal+$jm1['jum1'];
                            }
                            $num_jm2=$this->db->query("SELECT SUM(jumlah_jual1) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang1=menu_makanan.id_menu_makanan AND penjualan.id_barang1='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->num_rows();
                            $jm2=$this->db->query("SELECT SUM(jumlah_jual1) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang1=menu_makanan.id_menu_makanan AND penjualan.id_barang1='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->row_array();
                            if ($num_jm2!=0) {
                                $nm_awal=$nm_awal+$jm2['jum1'];
                            }
                            $num_jm3=$this->db->query("SELECT SUM(jumlah_jual2) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang2=menu_makanan.id_menu_makanan AND penjualan.id_barang2='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->num_rows();
                            $jm3=$this->db->query("SELECT SUM(jumlah_jual2) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang2=menu_makanan.id_menu_makanan AND penjualan.id_barang2='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->row_array();
                            if ($num_jm3!=0) {
                                $nm_awal=$nm_awal+$jm3['jum1'];
                            }
                            $num_jm4=$this->db->query("SELECT SUM(jumlah_jual3) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang3=menu_makanan.id_menu_makanan AND penjualan.id_barang3='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->num_rows();
                            $jm4=$this->db->query("SELECT SUM(jumlah_jual3) as jum1 FROM penjualan,menu_makanan where  penjualan.id_barang3=menu_makanan.id_menu_makanan AND penjualan.id_barang3='$id_menu_makanan' AND YEAR(tanggal_jual)='$tahun' AND penjualan.id_cabang='$id_cabang'")->row_array();
                            if ($num_jm4!=0) {
                                $nm_awal=$nm_awal+$jm4['jum1'];
                            }

                         $stt.=$nm_awal.",";
                        }
                        $stt2=substr($stt, 0, -1);
                        echo $stt2;?>],
            }]
        },

       
    });

</script>

<script type="text/javascript">
  var delayInMilliseconds = 1000; 

setTimeout(function() {
  window.print()
}, delayInMilliseconds);
</script>



    <br><br><br>
<div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
        <label>
            Banjarbaru, <?php  echo tgl_indo(date('Y-m-d')) ?>
            <br>
            <p style="text-align: center;">
                <b>Owner</b>
            </p>
            <br><br><br>
            <p style="text-align: center;">
                <b><u>Dea Nita</u></b><br>
            </p>
        </label>
    </div> 

   
</body>

</html>

