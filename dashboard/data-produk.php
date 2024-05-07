<?php
session_start();
include '../database/db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palletes</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/global.css">
    <style>
        .table tr td a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Warna latar belakang dan teks untuk tombol Edit */
        .table tr td a[href^="edit"] {
            background-color: #007bff;
            /* Warna latar belakang untuk tombol Edit */
        }

        /* Warna latar belakang dan teks untuk tombol Hapus */
        .table tr td a[href^="proses-hapus"] {
            background-color: #dc3545;
            /* Warna latar belakang untuk tombol Hapus */
        }

        /* Efek hover untuk tombol */
        .table tr a[href^="edit"]:hover {
            background-color: #0056b3;
            /* Warna latar belakang saat tombol dihover */
        }

        .table tr a[href^="proses-hapus"]:hover {
            background-color: #dc3549;
            /* Warna latar belakang saat tombol dihover */
        }
    </style>
</head>

<body>
    <!--header-->
    <?php require __DIR__ . '/components/navbar.php' ?>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Products</h3>
            <div class="box">
                <p><a href="tambah-produk.php" class="sdsdf12dxsf">Add Product</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_kategori USING (category_id) ORDER BY product_id DESC");
                        if (mysqli_num_rows($produk) > 0) {
                            while ($row = mysqli_fetch_array($produk)) {
                                ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['category_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['product_name'] ?>
                                    </td>
                                    <td>Rp.
                                        <?php echo number_format($row['product_price']) ?>
                                    </td>
                                    <td><a href="../resources/product/<?php echo $row['produk_image'] ?>" target="_blank"> <img
                                                src="../resources/product/<?php echo $row['produk_image'] ?>" width="50px"> </a>
                                    </td>
                                    <td>
                                        <?php echo ($row['product_status'] == 0) ? 'N/A' : 'Available'; ?>
                                    </td>
                                    <td>
                                        <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> 
                                        <a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>">X</a>
                                    </td> 
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - PALLETES.</small>
        </div>
    </footer>

</body>

</html>