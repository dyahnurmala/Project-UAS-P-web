<?php
    session_start();
    include 'db_connect.php';
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
            <h4>Data Product</h4><br>
            <div class="box">
                <p><a href="tambah.php" class="btn">Tambah Data</a></p><br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Stock</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $product = mysqli_query($conn, "SELECT * FROM product ORDER BY id_product DESC");
                            if(mysqli_num_rows($product) > 0){
                            while($row = mysqli_fetch_array($product)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td><?php echo $row['product_desc'] ?></td>
                            <td><img src="product/<?php echo $row['product_image'] ?>" width="50px"></td>
                            <td><?php echo $row['product_stock'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id_product'] ?>" class="btn">Edit</a> <br> <br>
                                <a href="hapus.php?idp=<?php echo $row['id_product'] ?>" onclick="return confirm('Yakin ingin hapus?')" class="btn">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else { ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
