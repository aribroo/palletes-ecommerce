<?php

    include '../database/db.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE category_id = '".$_GET['idk']."'");
        echo '<script>window.location="data-kategori.php"</script>';
    }

    if(isset($_GET['idp'])){
        $produk = mysqli_query($conn, "SELECT produk_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('../resources/product/'.$p->produk_image);

        $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."'");
        echo '<script>window.location="data-produk.php"</script>';
    }
?>