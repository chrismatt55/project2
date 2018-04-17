<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Delete Cogs";
$current = "delete";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.
$cogsid = $_GET['cogsid'];

// find the user info based on passed id
$cogs = Cogs::find_by_id($cogsid);

// set new variables to
$cogs = $cogs->cgsid;

if(is_post_request()) {
    //get id from form
    $cogsid = $_POST['cogsid'];

    //send array back to construct
    $args = [];
    $args['cogsid'] = $cogsid;

    //instantiate and call delete function.
    $cogs = new Cogs($args);
    $cogs->delete($cogsid);


    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="delete.php" method="post">
            <fieldset>
              <legend>Are you sure you want to delete <?php echo $cogsid;?> ?</legend>
              <input name="cogsid" type="hidden" value="<?php echo $cogsid;?>">
              <button type="submit" value="Submit">Yes, Please Delete</button>
              <button type="button" onclick="location='index.php'">No, Don't Delete</button>
            </fieldset>
          </form>

         <br>
      </div>
   </section>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
