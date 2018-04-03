<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "User Page";
$current = "user";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.

if(is_post_request()) {
    // get post variables
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];





    //create an array called args to be used with __construct
    $args = [];
    $args['userName'] = $userName;
    $args['password'] = $password;
    $args['firstName'] = $firstName;

    //instantiate a new object and use the save function to create.
    $user = new User($args);
    $user->save($userid);

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>



                 <section id="boxes">
                      <div class="container">
                          <form action="create.php" method="post">
                            <fieldset>
                              <legend>Create a User</legend>
                              <p>User Name: <input type="text" name="userName"></p>
                              <p>Password: <input type="text" name="password"></p>
                              <p>First Name: <input type="text" name="firstName"></p>
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
