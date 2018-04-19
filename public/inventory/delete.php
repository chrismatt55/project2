<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Delete Inventory";
$current = "delete";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.
$inventoryid = $_GET['inventoryid'];

// find the user info based on passed id
$inventory = Inventory::find_by_id($inventoryid);

// set new variables to
$inventoryamt  = $inventory->inventoryid;

if(is_post_request()) {
    //get id from form
    $inventoryid = $_POST['inventoryid'];

    //send array back to construct
    $args = [];
    $args['inventoryid'] = $inventoryid;

    //instantiate and call delete function.
    $inventory = new Inventory($args);
    $inventory->delete($inventoryid);


    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="delete.php" method="post">
            <fieldset>
              <legend>Are you sure you want to delete <?php echo $inventoryamt;?> ?</legend>
              <input name="inventoryid" type="hidden" value="<?php echo $inventoryid;?>">
              <button type="submit" value="Submit">Yes, Please Delete</button>
              <button type="button" onclick="location='index.php'">No, Don't Delete</button>
            </fieldset>
          </form>

         <br>
      </div>
   </section>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
