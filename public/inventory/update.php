<?php
// DO NOT CHANGE THIS PAGE!!!

require_once("../../private/initialize.php");
require_login();
$page_title = "Update Inventory";
$current = "update";
include(SHARED_PATH . '/public_header.php');

//get the persons id - id
$inventoryid = $_GET['inventoryid'] ?? false;

// find the user info based on passed id
$inventory = Inventory::find_by_id($inventoryid);

// set new variables to


$inventoryamt = $inventory->inventoryamt;








if(is_post_request()) {
    // get post variables


    $inventoryamt = $_POST['inventoryamt'];
   


  //create an array called args to be used with __construct
    $args = [];
    $args['id'] = $id;
    $args['inventoryamt'] = $inventoryamt;
  



    //instantiate a new object and use the merge attributes and save to update.
    $inventory = new Inventory;
    $inventory->merge_attributes($args);
    $inventory->update($inventoryid);

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="update.php" method="post">
            <fieldset>
              <legend>Updated Inventory Amount</legend>
              <input name="inventoryid" type="hidden" value="<?php echo $inventoryid;?>">
              <p>Inventory Amount: <input type="number" name="inventoryamt" value="<?php echo $inventoryamt; ?>"></p>
          



            <button type="submit" value="submit">Update</button>
            <button type="button" onclick="location='index.php'">Cancel Update</button>
          </fieldset>
        </form>



        

      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
