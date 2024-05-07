<?php
error_reporting(0);
include "../database/db.php";
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1 ");
$a = mysqli_fetch_object($kontak);


$c = "";

$isExist = false;

if (isset($_GET['kat'])) {
    $query = $_GET['kat'];
    $sql = "SELECT category_name FROM tb_kategori WHERE category_id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $query);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $category = $result->fetch_object();

        $c = $category->category_name;
    } else {
        $s = $_GET['search'];

        $c = "Searching for product " . $s;
    }

    $stmt->close();
} else {
    $s = $_GET['search'];

    $c = "Searching for product " . $s;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palletes | <?= $c ?> </title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/card.css">
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
                    <input type="submit" name="cari" value="Search" class="sd12jsdf"    >
                </form>
            </div>
        </div>
    </div>

    <!--new produk-->
    <div class="section" style="margin-bottom: 250px">
        <div class="container">

            <h3>
                <?= $c ?>
            </h3>
            <div class="sdlfksdflksdf">
                <?php
                if ($_GET['search'] != '' || $_GET['kat'] != '') {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
                }
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1  $where ORDER BY product_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                    $isExist = true;
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

                <?php } ?>
            </div>
            <?php if ($isExist == false) { ?>
                <div class="sa213123x">
                    <h2>Product not available</h2>
                    <a href="index.php" class="btn-home">Back to Home</a>
                </div>
            <?php } ?>
        </div>
    </div>

    <!--footer-->
<?php require __DIR__ . '/components/footer.php' ?>