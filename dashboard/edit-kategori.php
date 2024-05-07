<?php
session_start();
include '../database/db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE category_id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="data-kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palletes</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <?php require __DIR__ . '/components/navbar.php' ?>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input"
                        value="<?php echo $k->category_name ?>" required>
                    <input type="submit" name="submit" value="Submit" class="btn1">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['nama']);

                    $update = mysqli_query($conn, "UPDATE tb_kategori SET 
                                            category_name = '" . $nama . "'
                                            WHERE category_id = '" . $k->category_id . "'");

                    if ($update) {
                        echo '<script>alert("Edit data berhasil data berhasil")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    } else {
                        echo 'Gagal ' . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="container">
            <small> Copyright &copy; 2023 - PALLETES.</small>
        </div>
    </footer>

</body>

</html>