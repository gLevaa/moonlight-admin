<?php

session_start();

if(isset($_SESSION['username']))
{
    header("Location: admin/userlist.php");
}

include 'header.php';

$error = $_GET['error'];

?>




    <h3 class="call-to-action" style="text-align: left;">
        Login to <strong>moonlight.</strong>
	        <br>An easy to use, open source, web panel.</br>
	        
	        
     </h3>
     
     
    <form action="admin/login.scr.php" method="post" class="loginform" style="font-size: 18px; margin-top: -3em;">	
	<div class="row form-row">
	    <?php
     
     
     if($error=="incorrect") 
     {
        echo '<p class="hint" style="color: red;">Incorrect username or password.</p>';
     } 
     else if ($error=="empty-field")
     {
         echo '<p class="hint" style="color: red;">Please fill out all fields.</p>';
     }
     else if ($error=="banned")
     {
         echo '<p class="hint" style="color: red;">This account has been banned.</p>';
     }
     else if ($error=="not-admin")
     {
         echo '<p class="hint" style="color: red;">User is not admin.</p>';
     } 
     
     
     ?>
		<div class="twelve columns">
			<label>Username</label>
			<input type="text" required="" name="username" class="wide" value="">
		</div>
	</div>
	<div class="row form-row" style="padding-bottom: -2em; ">
		<div class="twelve columns">
			<label>Password</label>
			<input type="password" required="" name="password" class="wide" >
		</div>
	</div>
		
	<div class="row form-row">
		<div class="four columns">
			<label>&nbsp;</label>
			<input type="submit" class="button primary" value="Login">
		</div>
	</div>
</form>
    
<?php
include 'footer.php';
?>