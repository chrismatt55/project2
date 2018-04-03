<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Blog Detail Page";
$current = "blog";
include(SHARED_PATH . '/public_header.php');

$blogid = $_GET['blogid'] ?? false;

$blog = Blog::find_by_id($blogid);

?>

 <section id="boxes">
      <div class="container">

         <br>
         <h2>Blogs</h2>
         <p>
           <?php echo "Blog Name: " . $blog->blogName; ?>
           <p>
             <?php echo "Quality Score: " . $blog->qualityScore; ?>
           </p>
           <p>
             <?php echo "Email: " . $blog->email; ?>
           </p>

           <button type="button" onclick="location='create.php?blogid=<?php echo $blogid; ?>'"> Add a contract Button </button>
             <br /><br />

             <table>
               <tr>
                 <th>Payment Date</th>
                 <th>Payment Amount</th>
                 <th>Contract Length</th>
                 <th>Update</th>
                 <th>Delete</th>
               </tr>

               <?php
               $contracts = Contract::find_contract($blogid);

               foreach($contracts as $contract)

               {
                 echo "<tr><td>" . $contract->paymentDate . "</td>";
                 echo "<td>" . $contract->paymentAmt . "</td>";
                 echo "<td>" . $contract->contractLength . "</td>";
                 echo "<td><a href='update.php?contractid=" . $contract->contractid . "'>Update</a></td>";
                 echo "<tr><a href='delete.php?contractid=" . $contract->contractid . "'>Delete</a></td></tr>";


               }

?>
</table>
</div>
</section>
<?php



include(SHARED_PATH . '/public_footer.php');
?>
