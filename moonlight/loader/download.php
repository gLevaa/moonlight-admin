<?php

include("../connection.php");

$uid = mysqli_real_escape_string($obj, $_GET["username"]);
$token = mysqli_real_escape_string($obj, $_GET["token"]);


if(isset($_GET['username']))
{
    // Valid request
    // Check token exists
    $result = $obj->query("SELECT * FROM tokens WHERE username='$uid'");
    
    if(!$result->num_rows > 0)
    {
        // User doesnt exist or token wasnt gen'd properly
        echo "2hu1ij123b";
        die();
    }
    else
    {
        // User exists and token was gen'd
        // Create array of row
        $row = $result->fetch_assoc();
        
        // Check the token was correct
        if($token = $row['token'])
        {
            // Correct token
            // Set timezone
            date_default_timezone_set('America/Los_Angeles');
            
            // Now check the expiry time is valid
            if($row['expiry'] < date("U"))
            {
                // The expiry time has passed
                // Expired token
                echo "2oj32ih312b3md";
                
                // Delete the token
                $obj->query("DELETE FROM `tokens` WHERE username='$uid'");
                exit();
                
                die();
            }
            else
            {
                // Everything checks out, token works 
                // Download the dll
                
                $path = 'checks.php';

                if (file_exists($path)) {
                    $mm_type="application/octet-stream";
                    header("Pragma: public");
                    header("Expires: 0");
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header("Cache-Control: public");
                    header("Content-Description: File Transfer");
                    header("Content-Type: " . $mm_type);
                    header("Content-Length: " .(string)(filesize($path)) );
                    header('Content-Disposition: attachment; filename="'.basename($path).'"');
                    header("Content-Transfer-Encoding: binary\n");
                    readfile($path);
                    
                    $obj->query("DELETE FROM `tokens` WHERE username='$uid'");
                    exit();
                } 
                else
                {
                    echo '9eriuasd2u';
                }
            }
            
            
        }
    }
    
    
    
}