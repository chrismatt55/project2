<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Delete Contract";
$current = "delete";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.
$contractid = $_GET['contractid'];

// find the user info based on passed id
$contract = Contract::find_by_id($contractid);

// set new variables to
$blogid = $contract->blogid;

if(is_post_request()) {
    //get id from form
    $contractid = $_POST['contractid'];
    $blogid = $_POST['blogid'];


    //send array back to construct
    $args = [];
    $args['contractid'] = $contractid;

    //instantiate and call delete function.

      $contract = new Contract($args);
      $contract->delete($contractid);
\

    //after saving redirect back to home page.
    header("Location: index.php?blogid=$blogid");

}

?>

 <section id="boxes">
      <div class="container">
          <form action="delete.php" method="post">
            <fieldset>
              <legend>Are you sure you want to delete <?php echo $userName;?> ?</legend>
              <input name="contractid" type="hidden" value="<?php echo $contractid;?>">
              <input name="blogid" type="hidden" value="<?php echo $blogid;?>">
              <button type="submit" value="Submit">Yes, Please Delete</button>
              <button type="button" onclick="location='index.php'">No, Don't Delete</button>
            </fieldset>
          </form>

         <br>
      </div>
   </section>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
