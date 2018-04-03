<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Delete Page";
$current = "delete";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.
$userid = $_GET['userid'];

// find the user info based on passed id
$user = user::find_by_id($userid);

// set new variables to
$userName = $user->userName;

if(is_post_request()) {
    //get id from form
    $userid = $_POST['userid'];

    //send array back to construct
    $args = [];
    $args['userid'] = $userid;

    //instantiate and call delete function.
    $user = new User($args);
    $user->delete($userid);


    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="delete.php" method="post">
            <fieldset>
              <legend>Are you sure you want to delete <?php echo $userName;?> ?</legend>
              <input name="userid" type="hidden" value="<?php echo $userid;?>">
              <button type="submit" value="Submit">Yes, Please Delete</button>
              <button type="button" onclick="location='index.php'">No, Don't Delete</button>
            </fieldset>
          </form>

         <br>
      </div>
   </section>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
