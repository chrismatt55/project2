<?php

echo"    <footer>
      <p>Blog Manager, Copyright &copy; " . date("Y") . "</p>
    </footer>
  </body>
</html>";

//this calls the function to close the database
db_disconnect($database);

?>
