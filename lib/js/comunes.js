function validaSoloNumeros(id) //leandro
{

    var val = $("#" + id).val().trim();
    if (val.trim().match(/[^0-9\ ]*$/)) {
        $("#" + id).val(val.trim().replace(/[^0-9\ ]*$/gi, ""));
    }
}