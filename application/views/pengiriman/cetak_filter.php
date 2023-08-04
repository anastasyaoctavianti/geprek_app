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
<body onLoad="window.print()">
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


    <span style="float:right; font-size: 11px;">
        Tanggal Cetak : <?php echo tgl_indo(date('Y-m-d'));?>
    </span>
    <br>
    <div style="text-align: center; ">
        <font size="3"><b><u>LAPORAN DATA PENGIRIMAN <?php if($status_pengiriman!="SEMUA"):?><?php echo strtoupper($status_pengiriman);?><?php endif;?> <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?></u></b></font><br>
    </div>
    <br>

    <br>
   <table border="1" cellspacing="0" width="100%">
        <thead style=" text-align: center;">
       <tr>
                                               <th style="flex: 0 0 auto; min-width: 2em;">No.Resi</th>
                                                <th style="flex: 0 0 auto; min-width: 2em;">No Penjualan</th>
                                                <th>Nama Customer</th>
                                                <th style="flex: 0 0 auto; min-width: 17em;">Data Barang</th>
                                                <th >Diskon</th>
                                                <th >Bayar</th>
                                                <th >Kembalian</th>
                                                <th >Ongkir</th>
                                                <th >Total</th>
                                                <th>Tanggal Jual</th>
                                                <th>Kurir</th>
                                                <th>Alamat Penerima</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Status Pengiriman</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php $no=1; $no2=0; foreach ($data_pengiriman->result_array() as $i) :
                                            $id_pengiriman=$i['id_pengiriman'];
                                            $id_penjualan=$i['id_penjualan'];
                                            $totall=$i['harga_jual']*$i['jumlah_jual'];

                                            $num_pengiriman=$hsl=$this->db->query("SELECT * FROM penjualan,barang,konsumen,pengiriman,pegawai where  penjualan.id_barang=barang.id_barang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai AND penjualan.id_penjualan='$id_penjualan'")->num_rows();
                                            if ($num_pengiriman>=1) {
                                                $dt_pengiriman=$hsl=$this->db->query("SELECT * FROM penjualan,barang,konsumen,pengiriman,pegawai where  penjualan.id_barang=barang.id_barang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai AND penjualan.id_penjualan='$id_penjualan'")->row_array();
                                                $nama_pegawai=$dt_pengiriman['nama_pegawai'];
                                                $tanggal_pengiriman=$dt_pengiriman['tanggal_pengiriman'];
                                                $alamat_penerima=$dt_pengiriman['alamat_penerima'];
                                                $status_pengiriman=$dt_pengiriman['status_pengiriman'];
                                                $catatan_kurir=$dt_pengiriman['catatan_kurir'];
                                            }else{
                                                $nama_pegawai="-";
                                                $tanggal_pengiriman="-";
                                                $alamat_penerima="-";
                                                $status_pengiriman="-";
                                                $catatan_kurir="-";
                                            }



                                             $jumlah_jual=$i['jumlah_jual']+$i['jumlah_jual1']+$i['jumlah_jual2']+$i['jumlah_jual3'];
                $brg1=$this->db->query("SELECT * from barang where id_barang=".$i['id_barang']."")->row_array();
                $brg2=$this->db->query("SELECT * from barang where id_barang=".$i['id_barang1']."")->row_array();
                $brg3=$this->db->query("SELECT * from barang where id_barang=".$i['id_barang2']."")->row_array();
                $brg4=$this->db->query("SELECT * from barang where id_barang=".$i['id_barang3']."")->row_array();

                                          ?>
                                            <tr>
                                              <td><?php echo sprintf('%03d', $id_pengiriman);?></td> 
                                              <td><?php echo sprintf("%03d", $id_penjualan);?></td> 

                                              <td><?php echo $i['nama_konsumen'];?></td> 
                                             <td>
                                                Kode :<?php echo $i['kode_barang'];?><br>
                                                Nama :<?php echo $i['nama_barang'];?><br>
                                                Harga Jual :<?php echo rupiah($i['harga_jual']);?><br>
                                                Qty :<?php echo $i['jumlah_jual'];?> <?php echo $i['satuan'];?>
                                                  <?php if($i['id_barang1']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg2['kode_barang'];?><br>
                                                Nama :<?php echo $brg2['nama_barang'];?><br>
                                                Harga Jual :<?php echo rupiah($brg2['harga_jual']);?><br>
                                                Qty :<?php echo $i['jumlah_jual1'];?> <?php echo $brg2['satuan'];?>

                                                  <?php 
                                                  $totall=$totall+($brg2['harga_jual']*$i['jumlah_jual1']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_barang2']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg3['kode_barang'];?><br>
                                                Nama :<?php echo $brg3['nama_barang'];?><br>
                                                Harga Jual :<?php echo rupiah($brg3['harga_jual']);?><br>
                                                Qty :<?php echo $i['jumlah_jual2'];?> <?php echo $brg3['satuan'];?>

                                                  <?php 
                                                  $totall=$totall+($brg3['harga_jual']*$i['jumlah_jual2']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_barang3']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg4['kode_barang'];?><br>
                                                Nama :<?php echo $brg4['nama_barang'];?><br>
                                                Harga Jual :<?php echo rupiah($brg4['harga_jual']);?><br>
                                                Qty :<?php echo $i['jumlah_jual3'];?> <?php echo $brg4['satuan'];?>
                                                  <?php 
                                                  $totall=$totall+($brg4['harga_jual']*$i['jumlah_jual3']);
                                                  ?>
                                                  <?php endif;?>
                                                </td>
                                              <td><?php echo rupiah($i['diskon']);?></td>
                                              <td><?php echo rupiah($i['bayar']);?></td>
                                              <td><?php echo rupiah($i['kembalian']);?></td>
                                               <td><?php echo rupiah($i['ongkir']);?></td>
                                              <td><?php echo rupiah($i['total']);?></td>
                                              <td><?php echo tgl_indo($i['tanggal_jual']);?></td> 
                                               <td><?php echo $nama_pegawai;?></td>
                                               <td><?php echo $alamat_penerima;?></td>
                                               <?php if($tanggal_pengiriman=="-"):?>
                                                <td>-</td>
                                            <?php else:?>
                                               <td><?php echo tgl_indo($tanggal_pengiriman);?></td>
                                           <?php endif;?>
                                               <td><?php echo $status_pengiriman;?></td>
                      
            
            </tr>
            <?php endforeach ?>
            <!-- <tr>
                <td colspan="5" style="text-align:center;"> TOTAL</td>
                <td><?php// echo rupiah($no2);?></td>
                <td colspan="4"></td>
            </tr> -->
                
                </tbody>
              </table>


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

