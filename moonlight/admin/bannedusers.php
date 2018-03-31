<?php

include("../check.php");
include("../connection.php");

include("../header.php");

?>

<table >
		<tbody>
		  
		  <tr>
		      <td><strong>Username</strong></td>
		      <td><strong>IP</strong></td>
		      <td><strong>HWID</strong></td>
		      <td><strong>Status</strong></td>
		      <td><strong>Unban</strong></td>
		  </tr>
		  
		  
		  <?php
		  $result = $obj->query("SELECT * FROM users");
		  
		  while($row = $result->fetch_assoc())
		  {
		      if($row['banned'] != 'false') {
		        echo htmlspecialchars('<tr style="font-family: monospace, monospace; ">
			            <td>' . $row['username'] . "</td>
			            <td>" . $row['ip'] . "</td>
			            <td>" . $row['hwid'] . "</td>
			            <td>" . $row['status']. '</td>
			            
			            <td><form action="unban.scr.php" method="post">
                            <input name="username" type="hidden" value="' . $row['username'] . '"> 
                            <input name="submit" type="submit" class="" value="unban" style="padding: 0.5em, 0.5em, 0.5em, 0.5em;">
                        </form>
                        </td>
                        
		            </tr>', ENT_QUOTES, 'UTF-8');
		      }
		  }
		  
		  ?>
		  
		
	    </tbody>
	</table>


<?php

include("../footer.php");

?>
