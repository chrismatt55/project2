<?php
// DO NOT CHANGE THIS PAGE!!!

require_once("../private/initialize.php");
$page_title = "Delete Page";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.
$id = $_GET['id'];

// find the user info based on passed id
$tax = Tax::find_by_id($id);

// set new variables to
$userName = $tax->userName;

if(is_post_request()) {
    //get id from form
    $id = $_POST['id'];

    //send array back to construct
    $args = [];
    $args['id'] = $id;

    //instantiate and call delete function.
    $tax = new Tax($args);
    $tax->delete();
        
    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="delete.php" method="post">
            <fieldset>
              <legend>Are you sure you want to delete <?php echo $userName; ?>'s taxes?</legend>
              <input name="id" type="hidden" value="<?php echo $id;?>">
              <button type="submit" value="Submit">Yes, Please Delete</button>
              <button type="button" onclick="location='index.php'">No, Don't Delete</button>
            </fieldset>
          </form>

         <br>
      </div>
   </section>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
