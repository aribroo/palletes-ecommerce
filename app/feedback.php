<?php
include "../database/db.php";
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1 ");
$a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <title>Palletes | Feedback</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <link rel="stylesheet" type="text/css" href="./css/feedback.css">
</head>

<body>
   <?php require __DIR__ . '/components/navbar.php' ?>


   <div class="lln121dfsd">

      <div class="form-box">
         <div class="textup">
            <i class="fa fa-solid fa-clock sd23rsdf"></i>
            It only takes two minutes!!
         </div>
         <form>
            <label for="uname">
               <i class="fa fa-solid fa-user"></i>
               Name
            </label>
            <input type="text" id="uname" name="uname" required>

            <label for="email">
               <i class="fa fa-solid fa-envelope"></i>
               Email Address
            </label>
            <input type="email" id="email" name="email" required>

            <label for="phone">
               <i class="fa-solid fa-phone"></i>
               Phone No
            </label>
            <input type="tel" id="phone" name="phone" required>

            <label>
               <i class="fa-solid fa-face-smile"></i>
               Do you satisfy with our service?
            </label>
            <div class="radio-group">
               <input type="radio" id="yes" name="satisfy" value="yes" checked>
               <label for="yes" style="margin-right : 50px">Yes</label>

               <input type="radio" id="no" name="satisfy" value="no">
               <label for="no">No</label>
            </div>

            <label for="msg">
               <i class="fa-solid fa-comments" style="margin-right: 3px;"></i>
               Write your Suggestions:
            </label>
            <textarea id="msg" name="msg" rows="4" cols="10" required resize="false">
            </textarea>
            <button type="submit">
               Submit
            </button>
         </form>
      </div>
   </div>

   <!-- footer -->
   <?php require __DIR__ . '/components/footer.php' ?>