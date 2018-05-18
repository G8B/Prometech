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
			$Logs = getLogs();

			foreach ($Logs as $Log){
			    echo '<tr><td>' . $Log['ID'] . '</td>' ;
			    $adminNames = getAdminName($Log['ID_utilisateur']);
			    echo '<td>' . $Log['time'] . '</td>';
			    echo '<td>'. $Log['action'].'</td>';
			    echo '<td>'. $adminNames['nom'] . '</td></tr>';
			}
		
		 ?>
		
		</tr>
		      
	</table>
	</div>
	

</html>