<?php
// DO NOT CHANGE THIS PAGE!!!

require_once("../private/initialize.php");
require_login();
$page_title = "Update Page";
include(SHARED_PATH . '/public_header.php');

//get the persons id - id
$id = $_GET['id'] ?? false;

// find the user info based on passed id
$tax = Tax::find_by_id($id);

// set new variables to
$userName = $tax->userName;
$wage = $tax->totalWages;
$withholdings = $tax->withholdings;


if(is_post_request()) {
    // get post variables
    $id = $_POST['id'];
    $userName = $_POST['name'];
    $wage = $_POST['wage'];
    $withholdings = $_POST['withholdings'];


    //calculate taxable income
    $taxableIncome = $wage - 10400;
    if($taxableIncome < 0){
      $taxableIncome = 0;
    }

    //calculate taxes based on taxableIncome
    $taxes = Tax::taxation($taxableIncome);

    //calculate owed money or return
    if($withholdings > $taxes) {
        $owe = 0;
        $refund = $withholdings - $taxes;
    } else {
        $owe = $taxes - $withholdings;
        $refund = 0;
    }

    //create an array called args to be used with __construct
    $args = [];
    $args['id'] = $id;
    $args['userName'] = $userName;
    $args['totalWages'] = $wage;
    $args['taxableIncome'] = $taxableIncome;
    $args['withholdings'] = $withholdings;
    $args['taxes'] = $taxes;
    $args['owe'] = $owe;
    $args['refund'] = $refund;

    //instantiate a new object and use the merge attributes and save to update.
    $tax = new Tax;
    $tax->merge_attributes($args);
    $tax->save();

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="update.php" method="post">
            <fieldset>
              <legend>Updated User Information</legend>
              <input name="id" type="hidden" value="<?php echo $id;?>">
              <p>Name: <input type="text" name="name" value="<?php echo $userName; ?>"></p>
              <p>Wages: <input type="text" name="wage" value="<?php echo $wage; ?>"></p>
              <p>Federal Tax Withheld: <input type="text" name="withholdings" value="<?php echo $withholdings; ?>"></p>
              <button type="submit" value="Submit">Submit</button>
              <button type="button" onclick="location='index.php'">Cancel Update</button>
            </fieldset>
          </form>

      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
