<link rel="stylesheet" type="text/css" href="/public/css/ticketSupport.css">

<div id="main">
    <div class="tableau-support">
        <table>
            <tr>
                <th>ID</th>
                <th>Priorité</th>
                <th>Email</th>
                <th>Objet</th>
                <th>Statut</th>
                <th rowspan="2"></th>
            </tr>
            <tr>
                <?php
                $Tickets = getTickets();
                foreach ($Tickets

                as $Ticket) : ?>
            <tr>
                <td> <?php echo $Ticket['ID'] ?></td>
                <td class="ticketRow"> <?php echo returnPriorite($Ticket['priorite']) ?></td>
                <td class="ticketRow"> <?php echo $Ticket['email'] ?></td>
                <td class="ticketRow"> <?php echo $Ticket['objet'] ?></td>
                <td class="ticketRow"> <?php echo returnStatut($Ticket['etat']) ?></td>
                <td><a href="mailto: <?php echo $Ticket["email"] ?>?Subject=RE:<?php echo $Ticket['objet'] ?>">
                        <button id="answer-button" class="support-button">Répondre</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <div class="Liste_ticket">
        <?php
        $i = 0;
        foreach ($Tickets as $Ticket) : ?>
            <div class="Tickets">
                <div class="expander"><?php echo $Ticket['email'] . ' ' . $Ticket['time'] ?></div>
            </div>
            <p class="text"><?php echo $Ticket['contenu'] ?></p>
            <?php $i++; endforeach; ?>
    </div>

    <div class="status-form">
        <form action="" method="post">

            <select class="ticketChoice" id="ticketChoice" title="Ticket">
                <?php foreach ($Tickets as $Ticket) : ?>
                    <option>Ticket <?php echo $Ticket['ID'] ?></option>
                <?php endforeach; ?>
            </select>


            <select class="Statuts" name="Statuts" title="Statuts">
                <option>A traiter</option>
                <option>En attente</option>
                <option>Terminé</option>
            </select>
            <button id="status-button" class="support-button">Changer statut</button>

        </form>
    </div>
</div>

<script type="text/javascript" src="/public/js/ticketSupport.js"></script>
	
	