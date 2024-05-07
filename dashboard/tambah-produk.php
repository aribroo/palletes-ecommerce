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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
   <!--header-->
   <?php require __DIR__ . '/components/navbar.php' ?>  

   <!--content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                   <select class="input" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY category_id DESC");
                            while ($r = mysqli_fetch_array($kategori)){
                         ?>
                        <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name'] ?></option>
                         <?php } ?>
                   </select>

                   <input type="text" name="nama" class="input" placeholder="Nama Produk" required>
                   <input type="text" name="harga" class="input" placeholder="Harga" required>
                   <input type="file" name="gambar" class="input" required>
                   <textarea class="input" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                   <select class="input" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0"> Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn1">
                </form>
                <?php
                if(isset($_POST['submit'])){

                    // print_r($_FILES['gambar']);
                    // menampung inputan dari form
                    $kategori   = $_POST['kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $deskripsi  = $_POST['deskripsi'];
                    $status     = $_POST['status'];

                    // menampung data file yang diupload
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'produk' .time().'.' .$type2;

                    // menampung data format file yang diizinkan

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    // validasi format file
                    
                    if(!in_array($type2, $tipe_diizinkan)){
                        //jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    }else{
                        //jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                        //proses upload file sekaligus insert ke database
                        move_uploaded_file($tmp_name, '../resources/product/'. $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                    null, 
                                    '".$kategori."',
                                    '".$nama."',
                                    '".$harga."',
                                    '".$deskripsi."',
                                    '".$newname."',
                                    '".$status."',
                                    null
                                         )");
                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="data-produk.php"</script>';
                        }else {
                            echo 'gagal'.mysqli_error($conn);
                        }
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
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>
