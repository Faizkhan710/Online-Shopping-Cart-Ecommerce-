<?php

session_start();

?>

<!DOCTYPE html>
<html>

<body>
 <?php   
$_SESSION["userid"] = "Aneeq";
$_SESSION["username"] = "Admin";

echo "Session variables are set";
?>
</body>
</html>