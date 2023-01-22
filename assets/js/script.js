// $(document).ready(function () {
//     $(".row-sign").hide();
//     $("#go-sign").click(function () {
//         $(".row-log").hide();
//         $(".row-sign").fadeToggle(300);
//     })
//     $("#go-log").click(function () {
//         $(".row-sign").hide();
//         $(".row-log").fadeToggle(300);
//     })
// });

$(document).ready(function () {
    if (session.error) {
        $(".row-log").hide();
        $(".row-sign").show();
    } else {
        $(".row-sign").hide();
    }
    $("#go-sign").click(function () {
        $(".row-log").hide();
        $(".row-sign").fadeToggle(300);
    })
    $("#go-log").click(function () {
        $(".row-sign").hide();
        $(".row-log").fadeToggle(300);
    })
});

$(document).ready(function () {
    $('#dtables').DataTable();
});