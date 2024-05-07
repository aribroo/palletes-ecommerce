<?php
    session_start();
    include '../database/db.php';
    if($_SESSION['status_login'] != true){
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
            <h3>Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php" class="sdsdf12dxsf">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY category_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                            while ($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td style="text-align: center"><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td style="text-align: center">
                                <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> 
                                <a href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus')">X</a>
                            </td>
                            
                        </tr>
                        <?php } }else{ ?>
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>
                        <?php }?>
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