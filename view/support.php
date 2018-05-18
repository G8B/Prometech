<link rel="stylesheet" type="text/css" href="/public/css/ticketSupport.css">
<html>
	<div class="tableau-support">
	<table>
		<tr>
			<th>ID</th>
			<th>Priorité</th>
			<th>Email</th>
			<th>Objet</th>
			<th>Statut</th>
		</tr>
		<tr>
			<?php 
			$Tickets = getTickets();

			foreach ($Tickets as $Ticket){
			    echo '<tr><td>' . $Ticket['ID'] . '</td>' ;
			    echo '<td>' . returnPriorite($Ticket['priorite']) . '</td>' ;
			    echo '<td>' . $Ticket['email'] . '</td>';
			    echo '<td>'. $Ticket['objet'].'</td>';
			    echo '<td>'. returnStatut($Ticket['etat']) . '</td></tr>';
			}
		
		 ?>
		
		</tr>
		      
	</table>
	</div>
	

</html>