<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title >APLIKASI PENJUALAN DAN KEUANGAN PADA AYAM GEPREK SA'I BANJARBARU BERBASIS WEB</title>
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
                                    <img src="<?php echo base_url();?>/assets/key.jpg" width="400px" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <center>
                                                    <img src="<?php echo base_url();?>assets/logo.jpg" width="130px;">
                                                </center>
                                                <br>
                                                <h4 class="mb-0 text-uppercase" style="text-align: center;">FORM LUPA PASSWORD</h4>
                                                
                                            </div><div class="alert alert-primary" role="alert">
                                                  Password baru akan dikirimkan ke no hp whatsapp yang telah terdaftar.
                                                </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form class="form-horizontal" action="<?php echo base_url();?>login/reset" method="POST" >
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" name="username" class="form-control" id="user-name" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" name="no_hp" class="form-control" id="np-hp" placeholder="Nomor HP" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-phone"></i>
                                                        </div>
                                                        <label for="np-hp">Nomor HP</label>
                                                    </fieldset>


                                                    <button style="width: 100%; margin-bottom: 10px;" type="submit" class="btn btn-primary float-right btn-inline">RESET PASSWORD</button>

                                                    <a style="width: 100%;" href="<?php echo base_url();?>login" class="btn btn-info float-right btn-inline">KEMBALI KE LOGIN</a>


                                             
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

<?php if($this->session->flashdata('nphp_salah') == TRUE): ?>
 <script type="text/javascript">
 swal("", "No HP Anda Salah!", "error");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Anda berhasil register silahkan login!", "success");
 </script>
<?php endif; ?>