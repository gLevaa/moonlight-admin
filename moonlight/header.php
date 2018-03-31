<?php
    session_start();
    ?>

<html lang="en"><head>
        <title>
            indica / admin
        </title>
        
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link rel="apple-touch-icon" href="/images/logo.png">
        
        
    </head>

    <body>

        <div class="container">

            <div class="row navigation">
                <a href="http://antrax.pw/indica/">
                    <img src="/images/logo.png" class="navigation-icon">
                </a>
                
                <?php
                    if(isset($_SESSION['username']))
                    {
                        echo '<a href="https://antrax.pw/indica/admin/userlist.php">userlist</a>';
                        echo '<a href="https://antrax.pw/indica/admin/addusers.php">addusers</a>';
                        echo '<a href="https://antrax.pw/indica/admin/bannedusers.php">banned</a>';
                        
                        echo '<span class="aside">
			<a href="https://antrax.pw/indica/admin/logout.scr.php">logout</a>
		</span>';
                        
                    }
                    else
                    {
                        echo '<a href="https://antrax.pw/indica/">home</a>';
                    }
                
                    
                ?>
                

            </div>