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
                <font style="margin-right: 100px;" size="5">AYAM GEPREK SA'I BANJARBARU</font><br>
                <font style="margin-right: 100px;" size="3">Jl. Karang Anyar 1, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714</font><br>
                <font style="margin-right: 100px;" size="3">Telp. (0822) 5093 1567</font>
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
        <font size="3"><b><u>LAPORAN PENJUALAN</u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 12px;">
        <thead style=" text-align: center; ">
     <tr>
                                                <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                <th style="flex: 0 0 auto; min-width: 2em;">No Penjualan</th>
                                                <th>Tanggal Jual</th>
                                                <th>Nama Konsumen</th>
                                                <th>Nama Pegawai</th>
                                                <th style="flex: 0 0 auto; min-width: 17em;">Menu Makanan</th>
                                                <th >Diskon</th>
                                                <th >Bayar</th>
                                                <th >Kembalian</th>
                                                <th >Total+PPN</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             <?php $no=1; foreach ($data_penjualan->result_array() as $i) :
                                            $id_penjualan=$i['id_penjualan'];
                                            $totall=$i['harga']*$i['jumlah_jual'];

                $jumlah_jual=$i['jumlah_jual']+$i['jumlah_jual1']+$i['jumlah_jual2']+$i['jumlah_jual3'];
                $brg1=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang']."")->row_array();
                $brg2=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang1']."")->row_array();
                $brg3=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang2']."")->row_array();
                $brg4=$this->db->query("SELECT * from menu_makanan where id_menu_makanan=".$i['id_barang3']."")->row_array();

                                          ?>
                                            <tr>
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo sprintf("%03d", $id_penjualan);?></td> 
                                              <td><?php echo tgl_indo($i['tanggal_jual']);?></td> 

                                             <td><?php echo $i['nama_konsumen'];?></td> 
                                              <td><?php echo $i['nama_pegawai'];?></td> 
                                             <td>
                                                Kode :<?php echo $i['kode_menu'];?><br>
                                                Menu :<?php echo $i['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($i['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual'];?> 
                                                  <?php if($i['id_barang1']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg2['kode_menu'];?><br>
                                                Menu :<?php echo $brg2['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg2['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual1'];?> 

                                                  <?php 
                                                  $totall=$totall+($brg2['harga']*$i['jumlah_jual1']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_barang2']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg3['kode_menu'];?><br>
                                                Menu :<?php echo $brg3['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg3['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual2'];?> 

                                                  <?php 
                                                  $totall=$totall+($brg3['harga']*$i['jumlah_jual2']);
                                                  ?>
                                                  <?php endif;?>
                                                  <?php if($i['id_barang3']!=0):?>
                                                    <hr>
                                                Kode :<?php echo $brg4['kode_menu'];?><br>
                                                Menu :<?php echo $brg4['nama_menu'];?><br>
                                                Harga Jual :<?php echo rupiah($brg4['harga']);?><br>
                                                Qty :<?php echo $i['jumlah_jual3'];?> 
                                                  <?php 
                                                  $totall=$totall+($brg4['harga']*$i['jumlah_jual3']);
                                                  ?>
                                                  <?php endif;?>
                                                </td>
                                              <td><?php echo rupiah($i['diskon']);?></td>
                                              <td><?php echo rupiah($i['bayar']);?></td>
                                              <td><?php echo rupiah($i['kembalian']);?></td>
                                              <td><?php echo rupiah($i['total']);?></td>
                      
            
            </tr>
            <?php endforeach ?>
             <tr>
                                             
                                              <td colspan="8" style="text-align:center;"> TOTAL KESELURUHAN</td>
                                              <td colspan="1"><?php echo rupiah($totall);?></td> 
                      
            
            </tr>

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
                <b><u>Dea nita</u></b><br>
            </p>
        </label>
    </div> 
   
</body>

</html>

