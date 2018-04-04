

<?php require_once("../private/initialize.php");
require_login();
$page_title = "Welcome Page";
$current = "home";
include(SHARED_PATH . '/public_header.php');

 ?>

 <section id="boxes">
   <div class="container">

     <br>
     <h2>Welcome to the Invoice and COGS Manager</h2>


   </div>
 </section>
 <?php
 include(SHARED_PATH .'/public_footer.php');
?>
