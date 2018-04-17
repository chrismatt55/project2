<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Inventory";
$current = "inventory";
include(SHARED_PATH . '/public_header.php');

$inventoryid = $_GET['inventoryid'] ?? false;

$inventory = Inventory::find_by_id($inventoryid);

?>

 <section id="boxes">
      <div class="container">

         <br>
         <h2>Inventory Report</h2>
         
          

        

             <table>
               <tr>
                 <th>Inventory Amount</th>
                 <th>Update</th>
              
               </tr>

 <?php

      $inventory = Inventory::find_all();
      //echo var_dump($taxs);
      foreach($inventory as $inventory)
      {
      echo "<tr><td>" .  $inventory->inventoryamt . "</td>";
      echo "<td><a href='update.php?inventoryid=" . $inventory->inventoryamt . "'>Update</a></td>";
     


      }

?>
</table>
</div>
</section>
<?php



include(SHARED_PATH . '/public_footer.php');
?>
