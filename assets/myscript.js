

      $('.fin_sama').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

      $('.button_komber').on('click', function() {
    var $this = $(this);
    var tampung_username = document.getElementById('username').value;
    var tampung_no_hp = document.getElementById('no_hp').value;
    var tampung_no_wa = document.getElementById('no_wa').value;
    var tampung_email = document.getElementById('email').value;
    var tampung_pw1 = document.getElementById('pw1').value;
    var tampung_pw2 = document.getElementById('pw2').value;
    var tampung_pin_transaksi = document.getElementById('pin_transaksi').value;
    var rs = document.getElementById('email').value;
    var atps=rs.indexOf("@");
    var dots=rs.lastIndexOf(".");

     if((tampung_username == "")||(tampung_no_hp == "")||(tampung_no_wa == "")||(tampung_email == "")||(tampung_pw1 == "")||(tampung_pw2 == "")||(tampung_pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    }else if(atps<1 || dots<atps+2 || dots+2>=rs.length){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    } else{
        $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay").fadeIn("slow");
    }      
    
});


     $('.button_tolak_member').on('click', function() {
      var x1 = document.getElementById("myDIV");
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        x1.style.display = "none";
        $("#overlay4").fadeIn("slow");
    
});

      $('.button_terima_member').on('click', function() {
      var x2 = document.getElementById("myDIV2");
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        x2.style.display = "none";
        $("#overlay3").fadeIn("slow");
    
});


$('.bukti_donasi_button').on('click', function() {
    var $this = $(this);
     if( document.getElementById("chooseFile").files.length == 0 ){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    }else{
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 100000);
        $("#overlay3").fadeIn("slow");
    }
});



  $('.sdfdsfew').on('click', function() {
    var $this = $(this);
    var tampung_nama_depan = document.getElementById('nama_depan').value;
    var tampung_nama_belakang = document.getElementById('nama_belakang').value;
    var tampung_email = document.getElementById('email').value;
    var tampung_no_wa = document.getElementById('no_wa').value;
    var tampung_no_hp = document.getElementById('no_hp').value;
    var tampung_alamat = document.getElementById('alamat').value;
    var tampung_username = document.getElementById('username').value;
    var tampung_pw1 = document.getElementById('pw1').value;
    var tampung_pw2 = document.getElementById('pw2').value;
    var tampung_jenis_tiket = document.getElementById('jenis_tiket').value;
    var tampung_pin_transaksi = document.getElementById('pin_transaksi').value;
    var rs = document.getElementById('email').value;
    var atps=rs.indexOf("@");
    var dots=rs.lastIndexOf(".");

    var v3tampung_username=tampung_username.length;

     if((tampung_nama_depan == "")||(tampung_nama_belakang == "")||(tampung_email == "")||(tampung_no_wa == "")||(tampung_no_hp == "")||(tampung_alamat == "")||(tampung_username == "")||(tampung_pw1 == "")||(tampung_pw2 == "")||(tampung_jenis_tiket == "")||(tampung_pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
          $('#regis_modal').modal('hide');
    }else if(atps<1 || dots<atps+2 || dots+2>=rs.length){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
          $('#regis_modal').modal('hide');
    }else if(v3tampung_username<5){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
          $('#regis_modal').modal('hide');
    } else{
        $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay").fadeIn("slow");
    }


        
    
});

    $('.sdfdsfew2').on('click', function() {
    var $this = $(this);
    var t_pin_transaksi = document.getElementById('pin_transaksi').value;
    var t_nominal_kirim = document.getElementById('nominal_kirim').value;
    var t_id_pengguna2 = document.getElementById('cari_downline').value;

     if((t_nominal_kirim == "")||(t_id_pengguna2 == "")||(t_pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    }else if(t_nominal_kirim<1){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    } else{
        $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay2").fadeIn("slow");
    }


        
    
});


        $('.button_withdrawal').on('click', function() {
    var $this = $(this);
    var pin_transaksi = document.getElementById('pin_transaksi').value;
    var nominal_withdrawal = document.getElementById('nominal_withdrawal').value;

     if((nominal_withdrawal == "")||(pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    } else{
        $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay3").fadeIn("slow");
    }
    
});



         $('.button_tf_free_wallet').on('click', function() {
    var $this = $(this);
    var pin_transaksi = document.getElementById('pin_transaksi').value;
    var nominal_transfer = document.getElementById('nominal_transfer').value;

     if((nominal_transfer == "")||(pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    } else{
        $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay4").fadeIn("slow");
    }
    
});



             $('.button_tf_ppob').on('click', function() {
    var $this = $(this);
    var username_tpayer = document.getElementById('username_tpayer').value;
    var pw_pin_transaksi = document.getElementById('pin_transaksi').value;
    var nominal_transfer = document.getElementById('nominal_transfer').value;

     if((nominal_transfer == "")||(username_tpayer == "")||(pw_pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    } else{
           $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay4").fadeIn("slow");
    }
    
});



$('.button_deposit').on('click', function() {
    var $this = $(this);
    var username_tpayer = document.getElementById('username_tpayer').value;
    var pin_transaksi = document.getElementById('pin_transaksi').value;
    var nominal_deposit = document.getElementById('nominal_deposit').value;

     if((nominal_deposit == "")||(username_tpayer == "")||(pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    } else{
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay4").fadeIn("slow");
    }
    
});


  $('.sekali1').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

  $('.sekali2').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

  $('.sekali3').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

  $('.sekali4').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

  $('.sekali51').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

  $('.sekali6').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

  $('.sekali7').on('click', function() {
    var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
         $this.button('reset');
        }, 900000);
        $("#overlay4").fadeIn("slow");
    
});

$('.button_konvert').on('click', function() {
    var $this = $(this);
    var jumlah_tiket = document.getElementById('jumlah_tiket').value;
    var pin_transaksi = document.getElementById('pin_transaksi').value;
    var nominal_wallet_bonus = document.getElementById('nominal_wallet_bonus').value;

     if((nominal_wallet_bonus == "")||(jumlah_tiket == "")||(pin_transaksi == "")){
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 100);
    } else{
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 10000);
        $("#overlay3").fadeIn("slow");
    }
    
});

