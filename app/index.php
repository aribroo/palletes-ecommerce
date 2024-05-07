<?php
include "../database/db.php";
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1 ");
$a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palletes | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/card.css">
    <link rel="stylesheet" type="text/css" href="./css/search-bar.css">

    <style>
        .sadfskdfnlhh{
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!--header-->
    <?php require __DIR__ . '/components/navbar.php' ?>


    <!--kategori-->
    <div class="sadfskdfnlhh">


        <div class="section">
            <div class="container">
                <h3>Categories</h3>
                <div class="box">
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY category_id DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while ($k = mysqli_fetch_array($kategori)) {
                            ?>
                            <a href="./produk.php?kat=<?php echo $k['category_id'] ?>">
                                <div class="col-5">
                                    <img src="../resources/img/<?= $k['category_name'] ?>.png" width="50px">
                                    <p>
                                        <?php echo $k['category_name'] ?>
                                    </p>
                                </div>
                            </a>
                        <?php }
                    } else { ?>
                        <p>Kategori tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!--search-->
        <div>
            <div class="search">
                <div class="container">
                    <form action="produk.php" method>
                        <input type="text" name="search" placeholder="Search Product">
                        <input type="submit" name="cari" value="Search" class="sd12jsdf">
                    </form>
                </div>
            </div>
        </div>



        <!--new produk-->
        <div class="section">
            <div class="container">
                <h3>New Product</h3>
                <div class="sdlfksdflksdf">
                    <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                    if (mysqli_num_rows($produk) > 0) {
                        while ($p = mysqli_fetch_array($produk)) {
                            ?>
                            <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                                <div class="sdfwg23r">
                                    <img src="../resources/product/<?php echo $p['produk_image'] ?>">
                                    <p class="p_name">
                                        <?php echo substr($p['product_name'], 0, 30) ?>
                                    </p>
                                    <p class="p_price">Rp.
                                        <?php echo number_format($p['product_price']) ?>
                                    </p>
                                </div>
                            </a>
                        <?php }
                    } else { ?>
                        <p>Produk tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </div>  
    </div>

    <!--footer-->
    <?php require __DIR__ . '/components/footer.php' ?>