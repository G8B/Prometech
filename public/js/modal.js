var modal = document.getElementById('confirmationModale');

var span = document.getElementsByClassName("close")[0];

var cancel = document.getElementById('cancel');

$('.supprimer').click(function () {
    modal.style.display = "block";
});

span.onclick = function () {
    modal.style.display = "none";
};

cancel.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};