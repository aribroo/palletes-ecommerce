<div class="footer">
   <div class="container">
      <h4>Address</h4>
      <p>
         <?php echo $a->admin_address ?>
      </p>

      <h4>Email</h4>
      <p>
         <?php echo $a->admin_email ?>
      </p>

      <h4>Contact</h4>
      <p>
         <?php echo $a->admin_telp ?>
      </p>

      <small>Copyright &copy; 2023 - PALLETES.</small>
   </div>
</div>


<script>
   function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
         x.className += " responsive";
      } else {
         x.className = "topnav";
      }
   }
</script>
</body>

</html>