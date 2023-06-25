console.log("hello")
//output
$(document).ready(function () {
    booking();
});

function booking() {
    let booking = "booking";
    $.ajax({
        type: "POST",
        url: "../account/booking.php",
        data: {booking:booking},
        case:false,
        contentType: false,
        processData: false,
        success: function (data, status) {
            $("#table").html(data)
        },
        error: function(){
            console.log("ErRoR");
        }
    });
}
//delete
function deleteBook(id) {
    var conf = confirm("Вы уверены, что хотите отменить данную запись?");
    if(conf === true){
    $.ajax({
        type: "POST",
        url: "../account/delete.php",
        data: {id:id},
        success: function (data,status) {
            console.log(data);
            booking();
        }
    });
}
}