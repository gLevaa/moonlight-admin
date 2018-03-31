<?php

include("../connection.php");

$uid = mysqli_real_escape_string($obj, $_POST["username"]);
$pwd = mysqli_real_escape_string($obj, $_POST["password"]);
$status = mysqli_real_escape_string($obj, $_POST["status"]);

// Random key gen func
function randomKey($length) {
    $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));

    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}

if(isset($_POST['submit']))
{
    // Gen salt and hash password
    $salt = randomKey(5);
    $password = md5(md5($salt).md5($pwd));
    
    // Select the row using the username sent
    $result = $obj->query("SELECT * FROM users WHERE username='$uid'");
    
    if($result->num_rows > 0)
    {
        // user exists
        header("Location: addusers.php?error=existing-username");
    }
    else
    {
        // username available
        
        // add the user
        $obj->query("INSERT INTO `users`(`username`, `password`, `salt`, `hwid`, `ip`, `status`, `banned`) VALUES ('$uid', '$password', '$salt', 'not set', 'not set', '$status', 'false')");
    
        // redirect back to addusers
        header("Location: addusers.php");
    }

}
else
{
    header("Location: userlist.php");   
}