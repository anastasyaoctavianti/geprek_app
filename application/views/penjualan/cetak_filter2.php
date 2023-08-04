<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
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
}

 function Terbilang($x)   
 {   
  $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
  if ($x < 12)   
   return " " . $bilangan[$x];   
  elseif ($x < 20)   
   return Terbilang($x - 10) . "belas";   
  elseif ($x < 100)   
   return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);   
  elseif ($x < 200)   
   return " seratus" . Terbilang($x - 100);   
  elseif ($x < 1000)   
   return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);   
  elseif ($x < 2000)   
   return " seribu" . Terbilang($x - 1000);   
  elseif ($x < 1000000)   
   return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);   
  elseif ($x < 1000000000)   
   return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);    
 } 

 function bulan_indo($bulan_eng)
{   
    if ($bulan_eng=="January") {
        $bulan_indo="Januari";
    }elseif($bulan_eng=="February"){
        $bulan_indo="Februari";
    }elseif($bulan_eng=="March"){
        $bulan_indo="Maret";
    }elseif($bulan_eng=="April"){
        $bulan_indo="April";
    }elseif($bulan_eng=="May"){
        $bulan_indo="Mei";
    }elseif($bulan_eng=="June"){
        $bulan_indo="Juni";
    }elseif($bulan_eng=="July"){
        $bulan_indo="Juli";
    }elseif($bulan_eng=="August"){
        $bulan_indo="Agustus";
    }elseif($bulan_eng=="September"){
        $bulan_indo="September";
    }elseif($bulan_eng=="October"){
        $bulan_indo="Oktober";
    }elseif($bulan_eng=="November"){
        $bulan_indo="November";
    }elseif($bulan_eng=="December"){
        $bulan_indo="Desember";
    }

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan_indo;
}

?>
<body onLoad="window.print()">
     <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                 <img width="100px" src="<?= base_url() ?>assets/logo2.png">
            </td>
            <td>
                <font style="margin-right: 100px;" size="5">AYAM GEPREK SA'I</font><br>
                <font style="margin-right: 100px;" size="3">Jl. Karang Anyar 1, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru</font><br>
                <font style="margin-right: 100px;" size="3">Telp. (0821) 6961 2018</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>



    <div style="text-align: center; ">
        <font size="3"><b><u>LAPORAN DATA LABA RUGI CABANG <?php echo strtoupper($nama_cabang);?> TAHUN <?php echo $tahun;?></u></b></font><br>
    </div>
    <br>
<br>
  <!--   <div style="text-align: center;">
        <font size="2"><b><u> RINGKASAN BIAYA</u></b></font><br>
    </div> -->


<center>
  <table border="1" cellspacing="0" width="70%" style="font-size: 12px;">
        <thead style=" text-align: center; ">
     <tr>
                                                <th >No.</th>
                                                <th >Bulan</th>
                                                <th >Pengeluaran</th>
                                                <th >Pemasukan</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                           <?php $no=1; $totall=0; $totall2=0; $totall3=0; $totall4=0; for ($i=1; $i < 13; $i++) { 
                                            $dt_pemasukan2=$this->db->query("SELECT SUM(total) as hasil FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen AND YEAR(tanggal_jual) = '$tahun' AND MONTH(tanggal_jual) = '$i' AND penjualan.id_cabang='$id_cabang'")->num_rows();
                                            $dt_pemasukan=$this->db->query("SELECT SUM(total) as hasil FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen AND YEAR(tanggal_jual) = '$tahun' AND MONTH(tanggal_jual) = '$i' AND penjualan.id_cabang='$id_cabang'")->row_array();
                                            if ($dt_pemasukan2==0) {
                                                $pemasukan1=0;
                                            }else{
                                                $pemasukan1=$dt_pemasukan['hasil'];
                                            }
                                            $dt_pengeluaran2=$this->db->query("SELECT SUM(biaya_pengeluaran) as hasil FROM pengeluaran where YEAR(tanggal_pengeluaran) = '$tahun' AND MONTH(tanggal_pengeluaran) = '$i' AND pengeluaran.id_cabang='$id_cabang'")->num_rows();
                                            $dt_pengeluaran=$this->db->query("SELECT SUM(biaya_pengeluaran) as hasil FROM pengeluaran where YEAR(tanggal_pengeluaran) = '$tahun' AND MONTH(tanggal_pengeluaran) = '$i' AND pengeluaran.id_cabang='$id_cabang'")->row_array();
                                            if ($dt_pengeluaran2==0) {
                                                $pengeluaran1=0;
                                            }else{
                                                $pengeluaran1=$dt_pengeluaran['hasil'];
                                            }

                                            $dt_pengeluaranv22=$this->db->query("SELECT SUM(total) as hasil FROM complement_karyawan,menu_makanan where complement_karyawan.id_menu_makanan=menu_makanan.id_menu_makanan AND YEAR(tanggal_ambil) = '$tahun' AND MONTH(tanggal_ambil) = '$i' AND complement_karyawan.id_cabang='$id_cabang'")->num_rows();
                                            $dt_pengeluaranv2=$this->db->query("SELECT SUM(total) as hasil FROM complement_karyawan,menu_makanan where complement_karyawan.id_menu_makanan=menu_makanan.id_menu_makanan AND YEAR(tanggal_ambil) = '$tahun' AND MONTH(tanggal_ambil) = '$i' AND complement_karyawan.id_cabang='$id_cabang'")->row_array();
                                            if ($dt_pengeluaranv22==0) {
                                                $pengeluaranv21=0;
                                            }else{
                                                $pengeluaranv21=$dt_pengeluaranv2['hasil'];
                                            }
                                            
                                            $dt_pengeluaranv44=$this->db->query("SELECT SUM(gaji_bersih) as hasil FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai AND YEAR(tanggal_penggajian) = '$tahun' AND MONTH(tanggal_penggajian) = '$i' AND pegawai.id_cabang='$id_cabang'")->num_rows();
                                            $dt_pengeluaranv4=$this->db->query("SELECT SUM(gaji_bersih) as hasil FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai AND YEAR(tanggal_penggajian) = '$tahun' AND MONTH(tanggal_penggajian) = '$i' AND pegawai.id_cabang='$id_cabang'")->row_array();
                                            if ($dt_pengeluaranv44==0) {
                                                $pengeluaranv25=0;
                                            }else{
                                                $pengeluaranv25=$dt_pengeluaranv4['hasil'];
                                            }



                                            $dt_barnagmasuk44=$this->db->query("SELECT SUM(biaya_pengeluaran) as hasil FROM barang_masuk,barang,supplier,cabang where barang_masuk.id_barang=barang.id_barang AND supplier.id_supplier=barang_masuk.id_supplier AND barang.id_cabang=cabang.id_cabang AND YEAR(tanggal_masuk) = '$tahun' AND MONTH(tanggal_masuk) = '$i' AND barang.id_cabang='$id_cabang'")->num_rows();
                                            $dt_barnagmasuk4=$this->db->query("SELECT SUM(biaya_pengeluaran) as hasil FROM barang_masuk,barang,supplier,cabang where barang_masuk.id_barang=barang.id_barang AND supplier.id_supplier=barang_masuk.id_supplier AND barang.id_cabang=cabang.id_cabang AND YEAR(tanggal_masuk) = '$tahun' AND MONTH(tanggal_masuk) = '$i' AND barang.id_cabang='$id_cabang'")->row_array();
                                            if ($dt_barnagmasuk44==0) {
                                                $barnagmasuk25=0;
                                            }else{
                                                $barnagmasuk25=$dt_barnagmasuk4['hasil'];
                                            }

                                            $totall=$totall+$pengeluaranv21+$pengeluaran1+$pengeluaranv25+$barnagmasuk25;
                                            $totall2=$totall2+$pemasukan1;
                                            $bulan_eng=date("F", mktime(0, 0, 0, $i, 10));
                                            ?>
                                            <tr>
                                              <td style="text-align:center;"><?php echo $no++;;?></td>
                                              <td style="text-align:center;"><?php echo bulan_indo($bulan_eng);?></td>
                                              <td style="text-align:center;"><?php echo rupiah($pengeluaran1+$pengeluaranv21+$pengeluaranv25+$barnagmasuk25);?></td>
                                              <td style="text-align:center;"><?php echo rupiah($pemasukan1);?></td>
                      
            
            </tr>
             <?php  } ?>
             <tr>
                                             
                                              <td colspan="2" style="text-align:center;"> TOTAL KESELURUHAN</td>
                                              <td colspan="1" style="text-align:center;"><?php echo rupiah($totall);?></td> 
                                              <td colspan="1" style="text-align:center;"><?php echo rupiah($totall2);?></td> 
                      
            
            </tr>
             <tr>
                                             
                                              <td colspan="2" style="text-align:center;"> LABA RUGI</td>
                                              <td colspan="2" style="text-align:center;"><?php $labarugi=$totall2-$totall; echo rupiah($labarugi);?> (<?php if($labarugi>=0):?>LABA<?php else:?>RUGI<?php endif;?>)</td>  
                      
            
            </tr>

                </tbody>
              </table>

</center>





    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

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

