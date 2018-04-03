<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Blog Page";
$current = "blog";
include(SHARED_PATH . '/public_header.php');
?>

 <section id="boxes">
      <div class="container">

         <br>
         <h2>Blogs</h2>
<button type="button" onclick="location= 'create.php'">Create a Blog</button>
<br /><br />
         <table>
            <tr>
              <th>Blog Names</th>
              <th>URL</th>
              <th>Email</th>
              <th>Contact Name</th>
              <th>Quality Score</th>
              <th>Detail</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>



<?php

      $blogs = Blog::find_all();
      //echo var_dump($taxs);
      foreach($blogs as $blog)
      {
      echo "<tr><td>" .  $blog->blogName . "</td>";
      echo "<td><a href='http://" .  $blog->url . "' target='blank'>" . $blog->url . "</a></td>";
      echo "<td>" . $blog->email . "</td>";
      echo "<td>" . $blog->contactFName . " " . $blog->contactLName .  "</td>";
      echo "<td>" . $blog->qualityScore . "</td>";
      echo "<td><a href='../contracts/index.php?blogid=" . $blog->blogid . "'>Detail</a></td>";
      echo "<td><a href='update.php?blogid=" . $blog->blogid . "'>Update</a></td>";
      echo "<td><a href='delete.php?blogid=" . $blog->blogid . "'>Delete</a></td>";


      }

?>
      </table>
      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
