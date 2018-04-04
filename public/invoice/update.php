<?php
// DO NOT CHANGE THIS PAGE!!!

require_once("../../private/initialize.php");
require_login();
$page_title = "Update Invoices";
$current = "update";
include(SHARED_PATH . '/public_header.php');

//get the persons id - id
$invoiceid = $_GET['invoiceid'] ?? false;

// find the user info based on passed id
$invoice = Invoice::find_by_id($invoiceid);

// set new variables to


$receiveDate = $invoice->receiveDate;
$manufacturer = $invoice->manufacturer;
$referenceNum = $invoice->referenceNum;
$amt = $invoice->amt;







if(is_post_request()) {
    // get post variables

    $invoiceid = $_POST['invoiceid'];
    $receiveDate = $_POST['receiveDate'];
    $manufacturer = $_POST['manufacturer'];
    $referenceNum = $_POST['referenceNum'];
    $amt = $_POST['amt'];



  //create an array called args to be used with __construct
    $args = [];
    $args['id'] = $id;
    $args['receiveDate'] = $receiveDate;
    $args['manufacturer'] = $manufacturer;
    $args['referenceNum'] = $referenceNum;
    $args['amt'] = $amt;



    //instantiate a new object and use the merge attributes and save to update.
    $invoice = new Invoice;
    $invoice->merge_attributes($args);
    $invoice->update($invoiceid);

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="update.php" method="post">
            <fieldset>
              <legend>Updated Invoice Information</legend>
              <input name="invoiceid" type="hidden" value="<?php echo $invoiceid;?>">
              <p>Reference Number: <input type="number" name="referenceNum" value="<?php echo $referenceNum; ?>"></p>
              <p>Manufacturer Name: <input type="text" name="manufacturer" size="40" value="<?php echo $manufacturer; ?>"></p>
              <p>Amount: <input type="number" name="amt"  value="<?php echo $amt; ?>"></p>
              <p>Receive Date: <input type="date" name="receiveDate" value="<?php echo $receiveDate; ?>"></p>



            <button type="submit" value="submit">Update</button>
            <button type="button" onclick="location='index.php'">Cancel Update</button>
          </fieldset>
        </form>



        

      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
