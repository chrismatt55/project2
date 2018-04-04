<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Invoices";
$current = "invoice";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.

if(is_post_request()) {
    // get post variables

    $receiveDate = $_POST['receiveDate'];
    $manufacturer = $_POST['manufacturer'];
    $referenceNum = $_POST['referenceNum'];
    $amt = $_POST['amt'];


    //create an array called args to be used with __construct

    $args = [];

    $args['receiveDate'] = $receiveDate;
    $args['manufacturer'] = $manufacturer;
    $args['referenceNum'] = $referenceNum;
    $args['amt'] = $amt;
   


    //instantiate a new object and use the save function to create.
    $invoice = new invoice($args);
    $invoice->create();

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>



                 <section id="boxes">
                      <div class="container">
                          <form action="create.php" method="post">
                            <fieldset>
                              <legend>Add an Invoice</legend>
                              <p>Reference Number: <input type="number" name="referenceNum"></p>
                              <p>Manufacturer: <input type="text" name="manufacturer"></p>
                              <p>Date Received: <input type="date" name="receiveDate"></p>
                              <p>Amount: <input type="number" name="amt"></p>

                              <button type="submit" value="Submit">Submit</button>
                              <button type="reset" value="Reset">Reset</button>
                            </fieldset>
                          </form>






      </table>
      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
