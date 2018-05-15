<link rel="stylesheet" type="text/css" href="/public/css/logs.css">
<html>
	<div class="tableau">
	<table>
		<tr>
			<th>ID</th>
			<th>Date / Horaire</th>
			<th>Action</th>
			<th>Admin</th>
		</tr>
		<tr>
			<?php 
			$IDs = getIDAdmin() ;
			$Dates = getDates();
			while($row_ID = $IDs->fetchObject () AND $row_date = $Dates->fetchObject ()) {
			    echo '<tr><td>' . $row_ID->ID . '</td>';
			    echo '<td>' . $row_date->time . '</td></tr>';
			
			}
			
		
		 ?>
		
		</tr>
		      
	</table>
	</div>
	

</html>