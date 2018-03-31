<?php
// Put your domain here eg. google.com (no http/https)
define('DB_SERVER', '');

// Put the username of the user you created with all privelages
// and added to the database
define('DB_USERNAME', '');

// Password of that user
define('DB_PASSWORD', '');

// The name of the database
define('DB_DATABASE', '');
$obj = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
