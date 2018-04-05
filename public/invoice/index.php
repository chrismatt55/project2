<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Invoices";
$current = "invoice";
include(SHARED_PATH . '/public_header.php');
?>

 <section id="boxes">
      <div class="container">

         <br>
         <h2>Invoices</h2>
<button type="button" onclick="location= 'create.php'">Add an Invoice</button>
<br /><br />
         <table>
            <tr>
              <th>Reference Number</th>
              <th>Manufacturer</th>
              <th>Date Recieved</th>
              <th>Amount</th>
              <th>Submit</th>
              <th>Reset</th>

            </tr>



<?php

      $invoices = Invoice::find_all();
      //echo var_dump($taxs);
      foreach($invoices as $invoice)
      {
      echo "<tr><td>" .  $invoice->referenceNum . "</td>";
      echo "<td><a href='http://" .  $invoice->manufacturer . "' target='blank'>" . $invoice->manufacturer . "</a></td>";
      echo "<td>" . $invoice->receiveDate . "</td>";
      echo "<td>" . $invoice->amt . " " . $invoice->amt .  "</td>";
     
      echo "<td><a href='update.php?invoiceid=" . $invoice->invoiceid . "'>Submit</a></td>";
      echo "<td><a href='delete.php?invoiceid=" . $invoice->invoiceid . "'>Reset</a></td>";


      }

?>
      </table>
      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
