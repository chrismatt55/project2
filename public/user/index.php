<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "User Page";
$current = "user";
include(SHARED_PATH . '/public_header.php');
?>

 <section id="boxes">
      <div class="container">

         <br>
         <h2>Users</h2>

<button type="button" onclick="location='create.php'">Create a User</button>
         <table>
            <tr>
              <th>User Name</th>
              <th>Password</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>

            <section id="boxes">
                 <div class="container">



                         <br>
                         <br />


<?php

      $users = User::find_all();
      //echo var_dump($taxs);
      foreach($users as $user)
      {
      echo "<tr><td>" .  $user->userName . "</td>";
      echo "<td>" .  $user->password . "</td>";
    

      echo "<td><a href='update.php?userid=" . $user->userid . "'>Update</a></td>";
      echo "<td><a href='delete.php?userid=" . $user->userid . "'>Delete</a></td></tr>";
      }

?>
      </table>
      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
