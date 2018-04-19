<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Inventory";
$current = "inventory";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.

if(is_post_request()) {
    // get post variables

   
    $inventoryamt = $_POST['amt'];


    //create an array called args to be used with __construct

    $args = [];

   
    $args['inventoryamt'] = $inventoryamt;
   


    //instantiate a new object and use the save function to create.
    $inventory = new Inventory($args);
    $inventory->create();

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>



                 <section id="boxes">
                      <div class="container">
                          <form action="create.php" method="post">
                            <fieldset>
                              <legend>Add Inventory</legend>
                             
                             
                              <p>Amount: <input type="number" name="amt"></p>

                              <button type="update" value="Update">Update</button>
                           
                            </fieldset>
                          </form>






      </table>
      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
