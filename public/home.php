

<?php require_once("../private/initialize.php");
require_login();
$page_title = "Welcome Page";
$current = "home";
include(SHARED_PATH . '/public_header.php');

$inventory = Inventory::find_all();
foreach($inventory as $inventory) {$inventoryamt = $inventory->inventoryamt;}

//$invoice = Invoice::find_all();
//foreach($invoice as $inv) {$invoiceTotal = $inv->amt;}

//$cogs = Cogs::find_all();
//foreach($cogs as $cog) {$cogsTotal = $cog->amount;}

//$leftToSpend = $cogsTotal - $invoiceTotal;
//$overSpent = $invoiceTotal - $cogsTotal;

 ?>


 <section id="boxes">
   <div class="container">

     <br>

     <h2>Welcome to the Invoice and COGS Manager</h2>
<p>We are trying to keep our inventory at $<?php echo number_format($inventoryamt, 2);?></p>



    


</div>
 </section>
 
 <?php
 include(SHARED_PATH .'/public_footer.php');
?>