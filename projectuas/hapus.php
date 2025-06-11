<?php
    include 'db_connect.php';

    if(isset($_GET['idp'])){
        $product = mysqli_query($conn, "SELECT product_image FROM product WHERE id_product = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($product);

        unlink('./product/' .$p->product_image);

        $delete = mysqli_query($conn, "DELETE FROM product WHERE id_product = '".$_GET['idp']."'");
        echo '<script>window.location="product.php"</script>';
    }
?>