<?php
    session_start();
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
            <h3>Home</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name?> di Palletes</h4>
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