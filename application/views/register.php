<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title >APLIKASI POINT OF SALES (POS) DAN PENGELOLAAN DATA STOK BAHAN BAKU PADA RUMAH MAKAN CEPAT SAJI AYAM GEPREK SA’I </title>
    <link rel="apple-touch-icon" href="<?php echo base_url();?>/assets/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/assets/logo2.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

  <link href="<?php echo base_url();?>assets/alert/sweetalert2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/alert/sweetalert2.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/alert/sweetalert2.min.js"></script>
 <script src="<?php echo base_url();?>assets/alert/sweetalert2.js"></script>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0" style="background-color: #f8fcff">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="<?php echo base_url();?>/assets/bg2.webp" width="400px" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <center>
                                                    <img src="<?php echo base_url();?>assets/logo.jpg" width="130px;">
                                                </center>
                                                <br>
                                                <h4 class="mb-0 text-uppercase" style="text-align: center;">FORM REGISTER KONSUMEN</h4>
                                            </div>
                                        </div>
                                                              <?php 
                        $cek = $this->db->query("SELECT max(id_konsumen) AS no FROM konsumen order by id_konsumen desc limit 1");
$data = $cek->row_array();
$no2 = $data['no']+1;

$a = "K";
$num = $a . sprintf('%03s', $no2);
?>  
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form class="form-horizontal" action="<?php echo base_url();?>login/daftar" method="POST" >
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                         <input value="<?php echo $num;?>" readonly class="form-control" type="text" name="kode_konsumen">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Kode Registrasi</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                         <input class="form-control" type="text" required name="nama_konsumen" autofocus="" tabindex="1" />
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Nama Lengkap</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                         <input class="form-control" type="text" required name="alamat" autofocus="" tabindex="1" />
                                                        <div class="form-control-position">
                                                            <i class="feather icon-map"></i>
                                                        </div>
                                                        <label for="user-name">Alamat</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                         <input class="form-control" type="number" required name="no_hp" autofocus="" tabindex="1" />
                                                        <div class="form-control-position">
                                                            <i class="feather icon-phone"></i>
                                                        </div>
                                                        <label for="user-name">No HP</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                         <input class="form-control" type="date" required name="tanggal_lahir" autofocus="" tabindex="1" />
                                                        <div class="form-control-position">
                                                            <i class="feather icon-phone"></i>
                                                        </div>
                                                        <label for="user-name">Tanggal Lahir</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input autocomplete="new-password" class="form-control form-control-merge" id="password" type="password" name="password"  aria-describedby="password" tabindex="2" />
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input autocomplete="new-password" class="form-control form-control-merge" id="password" type="password" name="password2"  aria-describedby="password" tabindex="2" />
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Ulangi Password</label>
                                                    </fieldset>


                                                    <button style="width: 100%;" type="submit" class="btn btn-primary float-right btn-inline">Register</button>

                                                    <a class="btn btn-info w-100" href="<?php echo base_url();?>login" style="margin-top: 10px;">Back to Login</a>


                                             
                                                </form>
                                            </div>
                                        </div>
                                        <br>
                                        
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


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>

<?php if($this->session->flashdata('username_salah') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Username Tidak Ditemukan!", "error");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('pw_salah') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Password Anda Salah!", "error");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Anda berhasil register silahkan login!", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Anda berhasil melakukan reset password, silahkan cek Password baru Anda di Whatsapp!", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('username_salah') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Nomor Handphone sudah digunakan!", "nik_ada");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('salahaa') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Password dan ulangi password salah", "error");
 </script>
<?php endif; ?>