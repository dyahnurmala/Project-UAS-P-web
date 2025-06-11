<?php
    session_start();
    include 'db_connect.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $product = mysqli_query($conn, "SELECT * FROM product WHERE id_product = '".$_GET['id']."' ");
    if(mysqli_num_rows($product) == 0){
        echo '<script>window.location="product.php"</script>';
    }
    $p = mysqli_fetch_object($product);
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
            <h3>Edit Data</h3>
            <div class = "box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-control" value= "<?php echo $p->product_name ?>" required>
                    <input type="text" name="harga" placeholder="Harga" class="input-control" value= "<?php echo $p->product_price ?>" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_desc ?></textarea>

                    <img src="product/<?php echo $p->product_image ?>" width="100px">
                    <input type = "hidden" name="foto" value="<?php echo $p->product_image?>">
                    <input type="file" name="gambar" class="input-control">
                    <input type="text" name="stock" placeholder="Stock" class="input-control" value= "<?php echo $p->product_stock ?>" required>
                    <input type="submit" name="submit" value="Edit" class="btn">
                </form>
                <?php 
                    if(isset ($_POST['submit'])){
                        // data form
                        $nama = $_POST['nama'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $stock = $_POST['stock'];
                        $foto = $_POST['foto'];

                        //data gambar baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'product'.time().'.'.$type2;

                        //data yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        //admin ganti gambar
                        if($filename != ''){

                            //validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                                echo '<script>alert("Format file tidak diizinkan")</script>';
                            }else{
                                unlink('./product/'.$foto);
                                move_uploaded_file($tmp_name, './product/'.$newname);
                                $namagambar = $newname;
                            }
                        }else{
                            //jika tidak ganti gambar
                            $namagambar = $foto;
                        }
                        //query produk
                        $update = mysqli_query($conn, "UPDATE product SET 
                                                product_name = '".$nama."',
                                                product_price = '".$harga."',
                                                product_desc = '".$deskripsi."',
                                                product_image = '".$namagambar."',
                                                product_stock = '".$stock."'
                                                WHERE id_product = '".$p->id_product."' ");

                        if($update){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="product.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
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