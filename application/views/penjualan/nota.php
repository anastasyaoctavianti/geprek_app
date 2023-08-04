<html>
<head>
<title>Faktur Pembayaran</title>


 <?php  
 //thanks to miswanphp10.blogspot.co.id   
 function Terbilang($x)   
 {   
  $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
  if ($x < 12)   
   return " " . $bilangan[$x];   
  elseif ($x < 20)   
   return Terbilang($x - 10) . "Belas";   
  elseif ($x < 100)   
   return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);   
  elseif ($x < 200)   
   return " Seratus" . Terbilang($x - 100);   
  elseif ($x < 1000)   
   return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);   
  elseif ($x < 2000)   
   return " Seribu" . Terbilang($x - 1000);   
  elseif ($x < 1000000)   
   return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);   
  elseif ($x < 1000000000)   
   return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);    
 } 

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
   ?>

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    
   


<?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp" . number_format($angka,0,',','.');
  return $hasil_rupiah;
}

?>

<style>
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body onLoad="window.print()" style='font-family:tahoma; font-size:8pt;'>
<center>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
   
    <img width="50px" src="<?= base_url() ?>assets/logo2.png">
    <br>
<span style='font-size:12pt'><b>AYAM GEPREK SA'I</b></span></br>
Jl. Karang Anyar 1, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714 <br> Telp. (0821) 6961 2018 </br>
</td>

<td style='vertical-align:top' width='30%' align='left'>
<b><span style='font-size:12pt'><br><br><br>STRUK PEMBELIAN</span></b></br>
No Trans. : <?php echo sprintf('%03d', $edit_penjualan['id_penjualan']);?></br>
Tanggal : <?php echo tgl_indo($edit_penjualan['tanggal_jual']);?></br>
</td>
</table>

<br>
<br>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 
<tr align='center'>

<td width='20%'>Nama Menu</td>
<td width='13%'>Harga</td>
<td width='4%'>Qty</td>
<td width='13%'>Total Harga</td>
  
<tr>

<td><?php echo $edit_penjualan['nama_menu'];?></td>
<td><?php echo rupiah($edit_penjualan['harga']);?></td>
<td><?php echo $edit_penjualan['jumlah_jual']; $bar1=$edit_penjualan['jumlah_jual']*$edit_penjualan['harga'];?></td>
<td style='text-align:right'><?php echo rupiah($bar1);?></td>
</tr>

 <?php 
                $totall=$edit_penjualan['harga']*$edit_penjualan['jumlah_jual'];
               $brg1=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$edit_penjualan['id_barang']."")->row_array();
               $brg2=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$edit_penjualan['id_barang1']."")->row_array();
               $brg3=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$edit_penjualan['id_barang2']."")->row_array();
               $brg4=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$edit_penjualan['id_barang3']."")->row_array();?>

                                           
    <?php if($edit_penjualan['id_barang1']!=0):?>
<tr>

<td><?php echo $brg2['nama_menu'];?></td>
<td><?php echo rupiah($brg2['harga']);?></td>
<td><?php echo $edit_penjualan['jumlah_jual1']; $bar1=$edit_penjualan['jumlah_jual1']*$brg2['harga'];?> </td>
<td style='text-align:right'><?php echo rupiah($bar1);?></td>
</tr>
<?php $totall=$totall+$bar1;?>
    <?php endif;?>   


    <?php if($edit_penjualan['id_barang2']!=0):?>
<tr>

<td><?php echo $brg3['nama_menu'];?></td>
<td><?php echo rupiah($brg3['harga']);?></td>
<td><?php echo $edit_penjualan['jumlah_jual2']; $bar1=$edit_penjualan['jumlah_jual2']*$brg3['harga'];?> </td>
<td style='text-align:right'><?php echo rupiah($bar1);?></td>
</tr>
<?php $totall=$totall+$bar1;?>
    <?php endif;?>
    

     <?php if($edit_penjualan['id_barang3']!=0):?>
<tr>

<td><?php echo $brg4['nama_menu'];?></td>
<td><?php echo rupiah($brg4['harga']);?></td>
<td><?php echo $edit_penjualan['jumlah_jual3']; $bar1=$edit_penjualan['jumlah_jual3']*$brg4['harga'];?> </td>
<td style='text-align:right'><?php echo $bar1;?></td>
</tr>
<?php $totall=$totall+$bar1;?>
    <?php endif;?>
 

<!-- <tr>
<td colspan = '4'><div style='text-align:right'>Cash : </div></td>
<td style='text-align:right'><?php echo rupiah($totall);?></td>
</tr> -->
 <tr>
<td colspan = '3'><div style='text-align:right'>Diskon : </div></td><td style='text-align:right'><?php echo rupiah($edit_penjualan['diskon']);?></td>
</tr>
 <tr>
<td colspan = '3'><div style='text-align:right'>Bayar : </div></td><td style='text-align:right'><?php echo rupiah($edit_penjualan['bayar']);?></td>
</tr>
<tr>
<td colspan = '3'><div style='text-align:right'>Kembalian : </div></td>
<td style='text-align:right'><?php echo rupiah($edit_penjualan['kembalian']);?></td>
</tr>
<tr>
<td colspan = '3'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div></td>
<td style='text-align:right'><?php echo rupiah($totall-$edit_penjualan['diskon']);?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right'>Terbilang : <?php echo terbilang($totall-$edit_penjualan['diskon']);?> Rupiah</div></td>
</tr>
</table>
 <span style="margin-right:400px">*Harga sudah termasuk pajak</span>
<table style='width:650; font-size:7pt;' cellspacing='2'>
<!-- <tr>

<td align='center' style="float: right; margin-right:100px;"><br>Mengetahui,</br></br><br><br><u><?php// echo $edit_penjualan['nama_pegawai'];?></u></td>
</tr> -->
</table>
</center>
</body>
</html>