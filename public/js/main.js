$("#login_button").click(function () {
    var error = document.getElementById("login_error");

    if ($("#pwd").val() == "" || $("#username").val() == "") {
        error.innerHTML = "Error: inputs cannot be empty";
        $("#login_error").removeClass("alert-success");
        $("#login_error").addClass("alert-danger");
        $("#login_error").css("display", "block");
    } else {
        error.innerHTML = "Success: welcome back";
        $("#login_error").removeClass("alert-danger");
        $("#login_error").addClass("alert-success");
        $("#login_error").css("display", "block");
    }
});


// $('.timepicker').wickedpicker(
//     {
//         twentyFour: true }
//
// );

$('.timepicker').each(function (e) {
    let value = $(this).val();
    $(this).wickedpicker(
        {
            twentyFour: true, now:  value ? value : `${new Date().getHours()} : ${new Date().getMinutes()}`
        }
    );
});
$('select').selectpicker();

$(function () {
    $("#datepicker").datepicker();
});

$("#report_form_submit").click(function () {
    var error = document.getElementById("login_error");

    if ($("#datepicker").val() == "" || $("#ETA").val() == "" || $("#comment").val() == "") {
        error.innerHTML = "Error: inputs cannot be empty";
        $("#login_error").removeClass("alert-success");
        $("#login_error").addClass("alert-danger");
        $("#login_error").css("display", "block");
    } else {
        error.innerHTML = "Success: welcome back";
        $("#login_error").removeClass("alert-danger");
        $("#login_error").addClass("alert-success");
        $("#login_error").css("display", "block");
    }
});
