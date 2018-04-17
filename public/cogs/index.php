<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Cogs";
$current = "cogs";
include(SHARED_PATH . '/public_header.php');
?>

 <section id="boxes">
      <div class="container">

         <br>
         <h2>Cogs</h2>
<button type="button" onclick="location= 'create.php'">Add a Monthly Cogs</button>
<br /><br />
         <table>
            <tr>

              <th>Date Recieved</th>
              <th>Amount</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>



<?php

      $cogs = Cogs::find_all();
      //echo var_dump($taxs);
      foreach($cogs as $cog)
      {
      echo "<tr><td>" .  $cogs->date . "</td>";
      echo "<td>" . $cogs->amt . "</td>";

     
      echo "<td><a href='update.php?cogsid=" . $cogs->cogsid . "'>Update</a></td>";
      echo "<td><a href='delete.php?cogsid=" . $cogs->cogsid . "'>Delete</a></td>";


      }

?>
      </table>
      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
