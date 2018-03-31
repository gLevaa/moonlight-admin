<?php

include("../check.php");
include("../connection.php");

session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password']) && $_SESSION['suwoo'] != 'suwoo')
{
    header("Location: https://antrax.pw/indica/");
}

include("../header.php");

?>


    <table >
		<tbody>
		  
		  <tr>
		      <td><strong>Username</strong></td>
		      <td><strong>IP</strong></td>
		      <td><strong>HWID</strong></td>
		      <td><strong>Status</strong></td>
		      <td><strong>Ban</strong></td>
		  </tr>
		  
		  
		  <?php
		  $result = $obj->query("SELECT * FROM users");
		  
		  while($row = $result->fetch_assoc())
		  {
		      if($row['banned'] != 'true') {
		        echo '<tr style="font-family: monospace, monospace;">
			            <td>' . $row['username'] . "</td>
			            <td>" . $row['ip'] . "</td>
			            <td>" . $row['hwid'] . "</td>
			            <td>" . $row['status']. '</td>
			            
			            <td><form action="ban.scr.php" method="post">
                            <input name="username" type="hidden" value="' . $row['username'] . '"> 
                            <input name="submit" type="submit" value="ban">
                        </form>
                        </td>
                        
		            </tr>';
		      }
		  }
		  
		  ?>
		  
		
	    </tbody>
	</table>


<?php
include("../footer.php");
?>