$('#deleteElement').click(function () {
    var form = $('#form');

    var field = $('<input>');

    field.attr("type", "hidden");
    field.attr("name", "delete");
    field.attr("value", true);

    form.append(field);
    form.submit();
});
