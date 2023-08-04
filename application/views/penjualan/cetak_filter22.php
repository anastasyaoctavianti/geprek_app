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
        <font size="3"><b><u>LAPORAN DATA LABA RUGI CABANG <?php echo strtoupper($nama_cabang);?>  BULAN <?php echo strtoupper($bulan);?> TAHUN <?php echo $tahun;?></u></b></font><br>
    </div>
    <br>
<br>
  <!--   <div style="text-align: center;">
        <font size="2"><b><u> RINGKASAN BIAYA</u></b></font><br>
    </div> -->


<table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 
  <tr style="vertical-align: top; text-align: left;">
      <td width="300px"><b>Pendapatan</b></td>
      <td></td> 
 </tr>
  <?php $totall=0; $total2=0; $no=1; $laba=0; foreach ($this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen AND penjualan.id_cabang='$id_cabang' AND YEAR(tanggal_jual) = '$tahun' AND MONTH(tanggal_jual) = '$bln'")->result_array() as $i) :
                                            $id_penjualan=$i['id_penjualan'];

                                            

                                            $laba=$laba+$i['total'];

                                          ?>
                                           
                                          

         <?php endforeach ?>


  <tr style="vertical-align: top; text-align: left;">
      <td >Pendapatan Penjualan</td>
      <td width="150px"></td>
      <td> <?php echo rupiah($laba);?></td> 
 </tr>





  </tbody>
</div>
</table>
<hr>
  <table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
   <tr style="vertical-align: top; text-align: left;">
      <td ><b>Total dari Pendapatan</b></td>
      <td width="150px"></td>
      <td> <b><?php echo rupiah($laba);?></b></td> 
 </tr>
  <tr style="vertical-align: top; text-align: left;">
      <td width="300px"><b>Beban Pokok Pendapatan</b></td>
      <td></td> 
 </tr>
 <?php $pengeluaaran=0;
 foreach ($this->db->query("SELECT * FROM barang_masuk,barang,supplier,cabang where barang_masuk.id_barang=barang.id_barang AND supplier.id_supplier=barang_masuk.id_supplier AND barang.id_cabang=cabang.id_cabang AND barang.id_cabang='$id_cabang' AND YEAR(tanggal_masuk) = '$tahun' AND MONTH(tanggal_masuk) = '$bln'")->result_array() as $i) :
     $totall1341=$i['biaya_pengeluaran'];
                                           $pengeluaaran=$pengeluaaran+$totall1341;

                ?>

  <?php endforeach ?>
 <tr style="vertical-align: top; text-align: left;">
      <td >Beban Pokok Pendapatan</td>
      <td ></td>
      <td > (<?php echo rupiah($pengeluaaran);?>)</td> 
 </tr>
  </tbody>
</div>
</table>

<hr>
 <table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 <tr style="vertical-align: top; text-align: left;">
      <td width="300px"><b>Total dari Beban Pokok Pendapatan</b></td>
      <td width="150px"></td>
      <td > <b>(<?php echo rupiah($pengeluaaran);?>)</b></td> 
 </tr>
  </tbody>
</div>
</table>



<hr>
  <table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
    <tr style="vertical-align: top; text-align: left;">
      <td width="300px"><b>Laba Kotor </b></td>
      <td width="150px"></td>
      <td> <b><?php echo rupiah($laba-$pengeluaaran);?></b></td> 
 </tr>
    <tr style="vertical-align: top; text-align: left;">
      <td width="300px"><b>Beban Operasional </b></td>
      <td width="150px"></td>
      <td> </td> 
 </tr>
  <tr style="vertical-align: top; text-align: left;">
      <td >Complement Karyawan</td>
      <td ></td>
      

      <?php 
      $jumkr2=$this->db->query("SELECT * FROM complement_karyawan,menu_makanan where complement_karyawan.id_menu_makanan=menu_makanan.id_menu_makanan AND YEAR(tanggal_ambil) = '$tahun' AND MONTH(tanggal_ambil) = '$bln' AND complement_karyawan.id_cabang='$id_cabang'")->num_rows();
      if ($jumkr2==0) {
          $qwjelk=0;
      }else{
           $jumkr=$this->db->query("SELECT *,SUM(total) as total2 FROM complement_karyawan,menu_makanan where complement_karyawan.id_menu_makanan=menu_makanan.id_menu_makanan AND YEAR(tanggal_ambil) = '$tahun' AND MONTH(tanggal_ambil) = '$bln' AND complement_karyawan.id_cabang='$id_cabang'")->row_array();  
           $qwjelk=$jumkr['total2'];
      }
      ?>
      <td > (<?php echo rupiah($qwjelk);?>)</td> 
 </tr>
 <?php 
      $dtpenggajian=$this->db->query("SELECT * FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai AND YEAR(tanggal_penggajian) = '$tahun' AND MONTH(tanggal_penggajian) = '$bln' AND pegawai.id_cabang='$id_cabang'")->num_rows();
      if ($dtpenggajian==0) {
          $jum_penggajian=0;
      }else{
           $jumpenggajian=$this->db->query("SELECT SUM(gaji_bersih) as total2 FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai AND YEAR(tanggal_penggajian) = '$tahun' AND MONTH(tanggal_penggajian) = '$bln' AND pegawai.id_cabang='$id_cabang'")->row_array();  
           $jum_penggajian=$jumpenggajian['total2'];
      }
      ?>
    <?php if ($dtpenggajian!=0):?>
   <tr style="vertical-align: top; text-align: left;">
      <td >Penggajian Karyawan</td>
      <td ></td>
      

      <td > (<?php echo rupiah($jum_penggajian);?>)</td> 
 </tr>
<?php endif;?>

  <?php $summmp=0;
 foreach ($this->db->query("SELECT *,SUM(biaya_pengeluaran) as hasil FROM pengeluaran where YEAR(tanggal_pengeluaran) = '$tahun' AND MONTH(tanggal_pengeluaran) = '$bln'  GROUP by nama_pengeluaran")->result_array() as $i) :
                                            $summmp=$summmp+$i['hasil'];

                ?>
 <tr style="vertical-align: top; text-align: left;">
      <td ><?php echo $i['nama_pengeluaran'];?></td>
      <td ></td>
      <td > (<?php echo rupiah($i['hasil']);?>)</td> 
 </tr>
  <?php endforeach ?>

  </tbody>
</div>
</table>


<hr>
<table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 <tr style="vertical-align: top; text-align: left;">
      <td width="300px"><b>Total Beban Operasional </b></td>
      <td width="150px">-</td>
      <td> <b>(<?php echo rupiah($summmp+$qwjelk+$jum_penggajian);?>)</b></td> 
 </tr>
 
  </tbody>
</div>
</table>
<hr>
<table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 <tr style="vertical-align: top; text-align: left;">
      <td width="300px"><b>Laba (Rugi) </b></td>
      <td width="150px"></td>
      <?php
      $lbrugi=$laba-($pengeluaaran+$summmp+$qwjelk+$jum_penggajian);
       if($lbrugi<0):?>
      <td> <b>(<?php echo rupiah($lbrugi);?>)</b></td> 
    <?php else:?>
      <td> <b><?php echo rupiah($lbrugi);?></b></td> 
    <?php endif;?>
 </tr>


 
  </tbody>
</div>
</table>

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

