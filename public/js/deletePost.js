var log = function($selector) {
    $selector.each(function() {
        console.log(this);
    });
};

$('#deleteElement').click(function () {

    var form = $('#form');

    if (!form.length) {
        $('body').append('<form action="" method="post"></form>');
        console.log('Appended form');
    }

    var field = $('<input>');

    field.attr("type", "hidden");
    field.attr("name", "delete");
    field.attr("value", true);

    form.append(field);
    form.submit();
});

$('.house-delete').click(function () {

    var idHouse = $(this).parent().parent().attr('id');

    console.log(idHouse);

    checkFormExistence();

    var form = $('#form');

    var field = $('<input>');

    field.attr("type", "text");
    field.attr("name", "idHouse");
    field.attr("value", idHouse);

    form.append(field);

    $('#deletedElement').text("logement");
});

function checkFormExistence() {
    if (!$('#form').length) {
        $('body').append('<form action="" method="post" id="form"></form>');
        console.log('Appended form');
    }
}

$('.product-delete').click(function () {

    var idProduct = $(this).parent().attr('id');

    console.log(idProduct);

    checkFormExistence();

    var form = $('#form');

    var field = $('<input>');

    field.attr("type", "text");
    field.attr("name", "idProduct");
    field.attr("value", idProduct);

    form.append(field);

    $('#deletedElement').text("produit");

    console.log("Appended field")
});

$('.room-delete').click(function () {

    var idRoom = $(this).parent().attr('id');

    checkFormExistence();

    var form = $('#form');

    var field = $('<input>');

    field.attr("type", "text");
    field.attr("name", "idRoom");
    field.attr("value", idRoom);

    form.append(field);

    console.log("Appended field")
});
