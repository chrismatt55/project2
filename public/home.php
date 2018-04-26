

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

     <?php
     $sql="SELECT inventoryamt
     From inventory;";

     $inventory = Inventory::find_by_sql($sql);

     echo "We are trying to keep our inventory at " . $inventory->inventoryamt;
     ?>
     
     <br>You have $0.00 left to spend this month<br>


   </div>
 </section>
 <?php
 include(SHARED_PATH .'/public_footer.php');
?>
