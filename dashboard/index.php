<?php
session_start();
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <style>
        .dsfwsdf12 {
            background-color: #e6e6e6;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dsfwsdf12 h4 {
            font-size: 20px;
            color: #333;
            text-align: center;
            margin-bottom: 0;
        }

        .dsfwsdf12 h4::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: #4CAF50;
            margin: 10px auto;
            border-radius: 2px;
        }

        .s2sdg23 {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: #f2f2f2;
        }

        .sadaf12w3e {
            padding: 20px;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            width: 50%;
            justify-content: space-evenly;
        }


        .sadaf12w3e a {
            margin: 10px 0;
            text-align: center;
            font-size: 20px;
            text-decoration: none;
            color: #fff;
            padding: 30px 20px;
            border-radius: 20px;
            background-color: #4CAF50;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .sadaf12w3e a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .sadaf12w3e a:nth-child(1) {
            background-color: #2196F3;
            /* Warna biru */
        }

        .sadaf12w3e a:nth-child(2) {
            background-color: #FF9800;
            /* Warna oranye */
        }

        .sadaf12w3e a:nth-child(3) {
            background-color: #9C27B0;
            /* Warna ungu */
        }

        @media screen and (max-width: 900px) {
            .logo-brand {
                font-size: 30px;
                
            }

            ul li a{
                font-size: 20px;
            }

            .sadaf12w3e a {
                font-size: 20px;
                padding: 20px 20px;
            }
        }

        @media screen and (max-width: 520px) {
            .logo-brand {
                font-size: 20px;
            }

            ul li a{
                font-size: 10px;
            }

            .sadaf12w3e a {
                font-size: 10px;
                padding: 10px 20px;
            }
        }
    </style>
</head>

<body>
    <!--header-->
    <?php require __DIR__ . '/components/navbar.php' ?>

    <!--content-->
    <div class="sectiond">
        <div class="container">
            <h3>Home</h3>
            <div class="dsfwsdf12">
                <h4>Hi👋
                    <?php echo $_SESSION['a_global']->admin_name ?>
                </h4>
            </div>
        </div>
    </div>


    <div class="container s2sdg23">
        <div class="sadaf12w3e">
            <a href="profil.php">Profile</a>
            <a href="data-produk.php">Product</a>
            <a href="data-kategori.php">Category</a>
        </div>
    </div>

    <!--footer-->
    <footer style="position: sticky; top: 100%;">
        <div class="container">
            <small>Copyright &copy; 2023 - PALLETES.</small>
        </div>
    </footer>

</body>

</html>