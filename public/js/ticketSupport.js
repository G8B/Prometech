/* Get the ticket
var ticket = document.getElementById('myDIV');

//Get the button
 var row = document.getElementById("test");

 
 row.onclick = function showTicket() {
	 if (ticket.style.display === "none") {
	        ticket.style.display = "block";
	    } else {
	        ticket.style.display = "none";
	    }
 }
 
 */
var listes = document.getElementsByClassName("Liste_ticket");

for (i =0 ; i< listes.length ; i++){
	 listes[i].style.display = "block";
	 }

$(document).ready(function () {
    $('.text').hide();
    $('.expander').click(function () {
        // .parent() selects the button tag, .next() selects the P tag
        $(this).parent().next().slideToggle(200);
    });
    $('.text').slideUp(200);
});

