<?php
    session_start();
    if($_SESSION['status_login'] !== true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/style.css">

<!--=============== FAVICON ===============-->
<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

<!--=============== REMIX ICONS ===============-->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


      <title>Botanic Bliss</title>
   </head>
   <body>
<!--=============== HEADER ===============-->
    <header>
        <div class="container">
            <h1><a href="index.php">Botanic Bliss</a></h1>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>   
            </h1>
        </div>
    </header>

<!--==================== ABOUT ====================-->
<section class="about section container" id="about">
            <div class="about__container grid">
                <img src="assets/img/about.png" alt="" class="about__img">

                <div class="about__data">
                    <h2 class="section__title about__title">
                        Siapa kami sebenarnya & <br> mengapa memilih kami
                    </h2>

                    <p class="about__description">
                        Kami memiliki lebih dari 4000+ ulasan yang tidak memihak 
                        dan pelanggan kami mempercayai proses pabrik dan layanan pengiriman kami setiap saat
                    </p>

                    <div class="about__details">
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Kami selalu mengirim tepat waktu.
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Kami memberikan Anda panduan untuk melindungi dan merawat tanaman Anda.
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Kami selalu datang untuk pemeriksaan setelah penjualan.
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Jaminan 100% uang kembali.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== STEPS ====================-->
        <section class="steps section container">
            <div class="steps__bg">
                <h2 class="section__title-center steps__title">
                    Langkah-langkah untuk memulai <br> tanaman Anda dengan benar
                </h2>

                <div class="steps__container grid">
                    <div class="steps__card">
                        <div class="steps__card-number">01</div>
                        <h3 class="steps__card-title">Pilih Tanaman</h3>
                        <p class="steps__card-description">
                            Kami memiliki beberapa varietas tanaman yang dapat Anda pilih.
                        </p>
                    </div>

                    <div class="steps__card">
                        <div class="steps__card-number">02</div>
                        <h3 class="steps__card-title">Lakukan pemesanan</h3>
                        <p class="steps__card-description">
                            Setelah pesanan Anda selesai, kami akan melanjutkan 
                            ke langkah berikutnya, yaitu pengiriman.
                        </p>
                    </div>

                    <div class="steps__card">
                        <div class="steps__card-number">03</div>
                        <h3 class="steps__card-title">Dapatkan pengiriman tanaman</h3>
                        <p class="steps__card-description">
                            Proses pengiriman kami mudah, Anda menerima tanaman langsung ke rumah Anda.
                        </p>
                    </div>
                </div>
            </div>
        </section>

<!--=============== FOOTER ===============-->
    <footer>
            <div class="container">
                <small>Copyright &copy - Dyah Nurmala Sari 20220801297</small>
            </div>
        </footer>

    </body>
</html>