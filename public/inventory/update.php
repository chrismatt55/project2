<?php
// DO NOT CHANGE THIS PAGE!!!

require_once("../../private/initialize.php");
require_login();
$page_title = "Update Inventory";
$current = "inventory";
include(SHARED_PATH . '/public_header.php');

//get the persons id - id
$inventoryid = $_GET['inventoryid'] ?? false;

// find the user info based on passed id
$inventory = Inventory::find_by_id($inventoryid);

// set new variables to
$inventoryamt = $inventory->inventoryamt;





if(is_post_request()) {
    // get post variables
    $inventoryid = $_POST['inventoryid'];
    $inventoryamt = $_POST['inventoryamt'];


  //create an array called args to be used with __construct
    $args = [];
    $args['inventoryid'] = $inventoryid;
    $args['inventoryamt'] = $inventoryamt;





    //instantiate a new object and use the merge attributes and save to update.
    $inventory = new Inventory;
    $inventory->merge_attributes($args);
    $inventory->update($inventoryid);

    //after saving redirect back to home page.
    header("Location: index.php?inventoryid=$inventoryid");


}

?>

 <section id="boxes">
      <div class="container">
          <form action="update.php" method="post">
            <fieldset>
              <legend>Updated Inventory Information</legend>
              <input name="inventoryid" type="hidden" value="<?php echo $inventoryid;?>">
              <p>Inventory Amount: <input type="number" name="inventoryamt" min ="1" value="<?php echo $inventoryamt; ?>"></p>
              <button type="submit" value="Submit">Submit</button>
              <button type="button" onclick="location='index.php?inventoryid=<?php echo $inventoryid; ?>'">Cancel Update</button>
            </fieldset>
          </form>

      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
