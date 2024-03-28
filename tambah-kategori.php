<?php
    session_start();
    include 'db.php';
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
   <!--header-->
   <header>
        <div class="container">
            <h1><a class="logo-brand" href="dashboard.php">PALLETES</a></h1>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Kategori</a></li>
                <li><a href="data-produk.php">Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
   </header>

   <!--content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input" required>
                    <input type="submit" name="submit" value="Submit" class="btn1">
                </form>
                <?php
                if(isset($_POST['submit'])){

                    $nama = ucwords($_POST['nama']);

                    $insert = mysqli_query($conn, "INSERT INTO tb_kategori VALUES ( 
                                        null,
                                        '".$nama."') ");
                    if($insert){
                        echo '<script>alert("Tambah data berhasil")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    }else  {
                        echo 'Gagal '.mysqli_error($conn);
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
