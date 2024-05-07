<?php
include "../database/db.php";
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1 ");
$a = mysqli_fetch_object($kontak);
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Palletes | About</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <link rel="stylesheet" type="text/css" href="./css/about.css">
</head>
<style>
   body {
      margin-top: 50px;
   }
</style>

<body>

   <?php require __DIR__ . '/components/navbar.php' ?>


   <!-- About -->
   <div class="about-section">
      <h1>About Us</h1>

      <img src="../resources/img/about.png" alt="" width="100%">
      <br>
      <br>

      <h4>PALLETES: Your Fashion, Your Style</h4>

      <br>
      <div class="llooijsadfn">
         <p>

            Tired of the same old fashion? PALLETES was founded in April 2023 by two young people who understand the
            importance of fashion in expressing who you are. We believe that fashion is not just about clothes, but
            about
            boosting your confidence and giving you a platform to showcase your unique style.

            You don't have to break the bank to look good. PALLETES offers a collection of high-quality clothing and
            accessories at prices that won't hurt your wallet. Everyone can experience the power of fashion without
            sacrificing their lifestyle.

            More than just a brand, PALLETES is a community. We want to support young people to express themselves to
            the
            fullest. Join the movement!

            PALLETES always releases limited edition designs, lho! Each item is only produced in limited quantities, so
            you'll definitely stand out and won't be a twin with anyone else.

         </p>

         <b> #PALLETES #FashionYouDeserve #ExpressYourself</b>

      </div>
   </div>

   <h2 style="text-align:center">Our Team</h2>
   <div class="sdfsad2we23">
      <div class="bbdsbbdsfb17">
         <div class="nj18sdn12sdf">
            <img src="../resources/img/pp.jpg" alt="Mike" style="width:50%">
            <div class="jbhdsj18213r">
               <h2>John Doe</h2>
               <p class="title12rsd">CEO & Founder</p>
               <p class="email">test@exmaple.com</p>
            </div>
         </div>
      </div>

      <div class="bbdsbbdsfb17">
         <div class="nj18sdn12sdf">
            <img src="../resources/img/pp.jpg" alt="Mike" style="width:50%">
            <div class="jbhdsj18213r">
               <h2>John Doe</h2>
               <p class="title12rsd">Art Director</p>
               <p class="email">test@exmaple.com</p>
            </div>
         </div>
      </div>
   </div>


   <?php require __DIR__ . '/components/footer.php' ?>