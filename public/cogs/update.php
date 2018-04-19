<?php
// DO NOT CHANGE THIS PAGE!!!

require_once("../../private/initialize.php");
require_login();
$page_title = "Update Cogs";
$current = "update";
include(SHARED_PATH . '/public_header.php');

//get the persons id - id
$cogsid = $_GET['cogsid'] ?? false;

// find the user info based on passed id
$cogs = Cogs::find_by_id($cogsid);

// set new variables to


$date = $cogs->date;
$amount = $cogs->amount;








if(is_post_request()) {
    // get post variables

    $cogsid = $_POST['cogsid'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];



  //create an array called args to be used with __construct
    $args = [];
    $args['id'] = $id;
    $args['date'] = $date;
    $args['amount'] = $amount;




    //instantiate a new object and use the merge attributes and save to update.
    $cogs = new Cogs;
    $cogs->merge_attributes($args);
    $cogs->update($cogsid);

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="update.php" method="post">
            <fieldset>
              <legend>Updated Cogs Information</legend>
              <input name="cogsid" type="hidden" value="<?php echo $cogsid;?>">
              <p>Date: <input type="date" name="date" value="<?php echo $date; ?>"></p>
              <p>Amount: <input type="number" name="amount"  value="<?php echo $amount; ?>"></p>
            



            <button type="submit" value="submit">Update</button>
            <button type="button" onclick="location='index.php'">Cancel Update</button>
          </fieldset>
        </form>



        

      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
