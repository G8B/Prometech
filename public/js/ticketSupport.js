var listes = document.getElementsByClassName("Liste_ticket");

for (var i = 0; i < listes.length; i++) {
    listes[i].style.display = "block";
}

$(document).ready(function () {
    $('.text').hide();
    $('.expander').click(function () {
        
        $(this).parent().next().slideToggle(200);
    });
    $('.text').slideUp(200);
});

