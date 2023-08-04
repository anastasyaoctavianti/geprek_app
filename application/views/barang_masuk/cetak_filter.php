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




    <br>
    <div style="text-align: center; ">
        <font size="3"><b><u>LAPORAN BARANG MASUK CABANG <?php echo strtoupper($nama_cabang);?><br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?></u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 12px;">
        <thead style="background-color: #d5eacf; text-align: center; ">
   <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Barang</th>
                                                        <th>Merek</th>
                                                        <th>Nama Supplier</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Jumlah Masuk</th>
                                                        <th>Biaya Pengeluaran</th>
                                                     </tr>
                                                </thead>
                                                 <tbody>
                                             <?php $no=1; $to1=0; foreach ($data_barang_masuk->result_array() as $i) :
                                            $id_barang_masuk=$i['id_barang_masuk'];
                                            $to1=$to1+$i['biaya_pengeluaran'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['nama_barang'];?></td> 
                                              <td><?php echo $i['merek'];?></td> 
                                              <td><?php echo $i['nama_supplier'];?></td> 
                                              <td><?php echo tgl_indo($i['tanggal_masuk']);?></td> 
                                              <td><?php echo $i['jumlah_masuk'];?> <?php echo $i['satuan'];?></td> 
                                              <td><?php echo rupiah($i['biaya_pengeluaran']);?></td> 
                      
            
            </tr>
            <?php endforeach ?>
                <tr>
                                             
                                              <td colspan="6" style="text-align:center;">TOTAL KESELURUHAN</td>
                                              <td colspan="1"><?php echo rupiah($to1);?></td> 
                      
            
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
                <b><u>Dea Nita</u></b><br>
            </p>
        </label>
    </div> 
   
</body>

</html>

