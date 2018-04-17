<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Cogs";
$current = "cogs";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.

if(is_post_request()) {
    // get post variables

    $date = $_POST['date'];
    $amt = $_POST['amt'];


    //create an array called args to be used with __construct

    $args = [];

    $args['date'] = $date;
    $args['amt'] = $amt;
   


    //instantiate a new object and use the save function to create.
    $cogs = new cogs($args);
    $cogs->create();

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>



                 <section id="boxes">
                      <div class="container">
                          <form action="create.php" method="post">
                            <fieldset>
                              <legend>Add a Monthly Cogs</legend>
                              <p>Date: <input type="date" name="date"></p>
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
