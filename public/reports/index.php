<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Reports Page";
$current = "reports";
include(SHARED_PATH . '/public_header.php');
?>

 <section id="boxes">
      <div class="container">

         <br>
         <h2>Report Page</h2>
<?php
$month= date(m);
$sql="SELECT paymentAmt
FROM contract
WHERE month(paymentDate) = {$month}; ";

$amount = Contract::find_by_sql($sql);

foreach($amount as $amt) {
  $math= $amt->paymentAmt;
  $total+= $math;

}

echo "<h4>1. How much $$ did we spend on this month on advertising?  " . $total;

$sql="SELECT blogName
FROM blog
WHERE blogid NOT IN (SELECT blogid FROM contract)
ORDER BY qualityScore
DESC LIMIT 1";

$quality = Blog::find_by_sql($sql);
foreach($quality as $qual) {
  $ans= $qual->qualityScore;
  $blog+= $ans;
}
echo "<h4>2. Who is the biggest blogger without a contract?   " . $qual ->blogName;
?>

<?php

include(SHARED_PATH . '/public_footer.php');

?>
