

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
     <br>We are trying to keep our inventory at $300,000.00<br>
     <br>You have $0.00 left to spend this month<br>


   </div>
 </section>
 <?php
 include(SHARED_PATH .'/public_footer.php');
?>
