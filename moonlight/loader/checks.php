<?php

include("../connection.php");

$uid = mysqli_real_escape_string($obj, $_GET["username"]);
$pwd = mysqli_real_escape_string($obj, $_GET["password"]);
$hwid = mysqli_real_escape_string($obj, $_GET["hwid"]);

// Random key gen func
function randomKey($length) {
    $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));

    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}

if(isset($_GET['username']))
{
    // Valid request
    
    // First of all, check that this user exists
    $result = $obj->query("SELECT * FROM users WHERE username='$uid'");
    
    if(!$result->num_rows > 0)
    {
        // If the user doesnt exist
        echo "202";
        die();
    }
    else
    {
        // User exists
        // Now, check the password
        
        // Create array of row
        $row = $result->fetch_assoc();
        
        // Hash the password given with the salt from the users row
        $password = md5(md5($row['salt']).md5($pwd));
        
        // Check the password is correct
        if($password != $row['password'])
        {
            // Incorrect password
            echo "203";
            die();
        }
        else
        {
            // Correct password
            // Check the HWID is set
            
            if($row['hwid'] == "not set")
            {
                // HWID is not set
                // Set the HWID
                $obj->query("UPDATE `users` SET `hwid`='$hwid' WHERE username='$uid'");
                
                // Save ip
                $ip = $_SERVER['REMOTE_ADDR'];
                
                // Set the IP
                $obj->query("UPDATE `users` SET `ip`='$ip' WHERE username='$uid'");
                
                 // Now, we want to gen the token.
                $token = randomKey(20);
                    
                // Current time + 2 minutes
                $time = date("U") + 120;
                    
                // Insert the token into the DB
                $obj->query("INSERT INTO `tokens`(`username`, `token`, `expiry`) VALUES ('$uid', '$token', '$time')");
                    
                // Return the token and the OK to the loader.
                echo("205:" . $token);
                
                die();
            }
            else
            {
                // HWID is set
                // Check the HWID
                if($hwid != $row['hwid'])
                {
                    // Incorrect HWID
                    echo("204");
                    die();
                }
                else
                {
                    // Correct HWID
                    // Overall successful login
                    
                    // Now, we want to gen the token.
                    $token = randomKey(20);
                    
                    // Current time + 2 minutes
                    $time = date("U") + 120;
                    
                    // Insert the token into the DB
                    $obj->query("INSERT INTO `tokens`(`username`, `token`, `expiry`) VALUES ('$uid', '$token', '$time')");
                    
                    // Return the token and the OK to the loader.
                    echo("206:" . $token);
                    
                }
                
            }
            
            
        }
        
        
    }
    
    
}
else 
{
    // Invalid request
    header("Location: https://nou.org");
}
