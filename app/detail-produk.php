<?php
error_reporting(0);
include "../database/db.php";
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1 ");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palletes |
        <?= $p->product_name ?>
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/product-detail.css">
</head>

<body>
    <!--header-->
    <?php require __DIR__ . '/components/navbar.php' ?>

    <!--search-->
    <div>
        <div class="search">
            <div class="container">
                <form action="produk.php" method>
                    <input type="text" name="search" placeholder="Search Product" value="<?php echo $_GET['search'] ?>">
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                    <input type="submit" name="cari" value="Search" class="sd12jsdf">
                </form>
            </div>
        </div>
    </div>

    <!--product detail-->
    <div class="section">
        <div class="container">
            <h2 class="dsa12r1">Product Detail</h2>
            <div class="box">
                <div class="col-2">
                    <img src="../resources/product/<?php echo $p->produk_image ?>" width="100%">
                </div>
                <div class="col-2">
                    <h1 class="product-name">
                        <?php echo $p->product_name ?>
                    </h1>
                    <h4>Rp.
                        <?php echo number_format($p->product_price) ?>
                    </h4>
                    <h2 class="description">Description :</h2>
                    <p>
                        <?php echo $p->product_description ?>
                    </p>
                    <div class="llopwerwe">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk Anda."
                            target="_blank" class="whatsapp-link">
                            <img src="../resources/img/WhatsApp.png" width="50px" alt="WhatsApp Logo"> Hubungi via
                            Whatsapp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require __DIR__ . '/components/footer.php' ?>