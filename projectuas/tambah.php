<?php
    session_start();
    include 'db_connect.php';
    if($_SESSION['status_login'] != true){
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
            <h3>Tambah Data</h3>
            <div class = "box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-control" required>
                    <input type="text" name="harga" placeholder="Harga" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <input type="file" name="gambar" class="input-control" required>
                    <input type="text" name="stock" placeholder="Stock" class="input-control" required>
                    <input type="submit" name="submit" value="Tambah" class="btn">
                </form>
                <?php 
                    if(isset ($_POST['submit'])){
                      //print_r($_FILES['gambar']); 

                      //inputan form
                      $nama = $_POST['nama'];
                      $harga = $_POST['harga'];
                      $deskripsi = $_POST['deskripsi'];
                      $stock = $_POST['stock'];

                      //data yang di upload
                      $filename = $_FILES['gambar']['name'];
                      $tmp_name = $_FILES['gambar']['tmp_name'];

                      $type1 = explode('.', $filename);
                      $type2 = $type1[1];

                      $newname = 'product'.time(). '.' .$type2;

                      //data yang diizinkan
                      $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                      //validasi format file
                      if(!in_array($type2, $tipe_diizinkan)){
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                      }else{
                        //create product directory if not exist
                        if (!is_dir('./product')) {
                            mkdir('./product', 0755); // Create the directory with permissions
                        }

                        //set product directory permissions
                        chmod('./product', 0755); // Sets permissions for read, write, and execute 

                        //upload and insert file
                        move_uploaded_file($tmp_name, './product/' .$newname);

                        // Use prepared statements for better security and efficiency
                        $stmt = $conn->prepare("INSERT INTO product (product_name, product_price, product_desc, product_image, product_stock) VALUES (?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssss", $nama, $harga, $deskripsi, $newname, $stock);
                        if ($stmt->execute()) {
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="product.php"</script>';
                        } else {
                            echo 'Gagal: ' . $stmt->error;
                        }
                        $stmt->close();
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