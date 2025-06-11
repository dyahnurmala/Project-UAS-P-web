<?php
    session_start();
    include 'db_connect.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);

?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/style.css">

      <title>Botanic Bliss</title>
   </head>
   <body>
<!--=============== HEADER ===============-->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Botanic Bliss</a></h1>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>   
            </h1>
        </div>
    </header>

<!--=============== CONTENT ===============-->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class = "box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="kontak" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email_admin ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat_admin ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>

                <?php
                    // Check if $d is valid and has necessary properties
                    if (is_object($d) && isset($d->admin_name) && isset($d->username) && isset($d->admin_telp) && isset($d->email_admin) && isset($d->alamat_admin)) {
                        // Process form submission
                        if(isset($_POST['submit'])){
                            $nama = $_POST['nama'];
                            $user = $_POST['user'];
                            $kontak = $_POST['kontak'];
                            $email = $_POST['email'];
                            $alamat = $_POST['alamat'];

                            $update = mysqli_query($conn, "UPDATE admin SET
                                admin_name = '$nama',
                                username = '$user',
                                admin_telp = '$kontak',
                                email_admin = '$email',
                                alamat_admin = '$alamat'
                                WHERE id_admin = '".$d->id_admin."'
                            ");
                            if($update){
                                echo '<script>alert("Data Berhasil Diubah");</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo '<script>alert("Gagal Mengubah Data");</script>';
                            }
                        }
                        } else {
                        // Handle the case where $d is invalid or missing properties
                        echo '<script>alert("Data User Tidak Ditemukan. Silahkan hubungi Administrator");</script>';
                        echo '<script>window.location="login.php"</script>';
                    }
                ?>
            </div>
            
            <br>
            <h3>Password</h3>
            <div class = "box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>

                <?php
                    // Check if $d is valid and has necessary properties
                    if (is_object($d) && isset($d->admin_name) && isset($d->username) && isset($d->admin_telp) && isset($d->email_admin) && isset($d->alamat_admin)) {
                        // Process form submission
                        if(isset($_POST['ubah_password'])){
                            $pass1 = $_POST['pass1'];
                            $pass2 = $_POST['pass2'];

                            if($pass2 != $pass1){
                                echo '<script>alert("Konfirmasi Password Baru Tidak Sesuai")</script>';
                            }else{
                                $u_pass = mysqli_query($conn, "UPDATE admin SET
                                            password = '".MD5($pass1)."'
                                            WHERE id_admin = '".$d->id_admin."'");
                                if($u_pass){
                                    echo '<script>alert("Ubah Data Berhasil")</script>';
                                    echo '<script>window.location="profil.php"</script>';
                                }else{
                                    echo 'gagal' .mysqli_error($conn);
                                }
                            }
                        }    
                    }
                ?>
            </div>

        </div>
    </div>
<!--=============== FOOTER ===============-->
    <footer>
        <div class="container">
            <small>Copyright &copy - Dyah Nurmala Sari 20220801297</small>
        </div>
    </footer>

   </body>
</html>