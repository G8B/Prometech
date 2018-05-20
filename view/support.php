<link rel="stylesheet" type="text/css" href="/public/css/ticketSupport.css">
<html>
	<div id="main">
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
			         echo '<td class="ticketRow">' . returnPriorite($Ticket['priorite']) . '</td>' ;
			         echo '<td class="ticketRow">' . $Ticket['email'] . '</td>';
			         echo '<td class="ticketRow">'. $Ticket['objet'].'</td>';
			         echo '<td class="ticketRow">'. returnStatut($Ticket['etat']) . '</td></tr>';
			     }
		
		        ?>
		
				</tr>
		      
			</table>
		</div>
		<div class = "Liste_ticket">
			<?php 
			$i = 0;
			foreach ($Tickets as $Ticket) : ?>
			<button class="Tickets"><div class="expander"><?php echo $Ticket['email'] . ' '. $Ticket['time'] ?></div></button>
			<p class="text"><?php echo $Ticket['contenu'] ?></p>
			<?php $i++ ;  endforeach;?>
		</div>
		
		<div class="boutons">
		
		<button id="answer-button"  class="support-button">Répondre</button>
		<button id="status-button" class="support-button">Changer statut</button>
		</div>
	</div>
			
<script type="text/javascript" src="/public/js/ticketSupport.js"></script>
	
	
</html>