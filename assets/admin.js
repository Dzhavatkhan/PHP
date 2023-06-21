console.log("hello")
//output
$(document).ready(function () {
    readbooks();
    readbarbers();
    readclients();
});

function readbooks() {
    let readbooks = "readbooks";
    $.ajax({
        type: "POST",
        url: "../admin_panel/bk/book_have.php",
        data: {readbooks:readbooks},
        case:false,
        contentType: false,
        processData: false,
        success: function (data, status) {
            $("#home").html(data)
        }
    });
}
function readclients(){
    let readclients = "readclients";
    $.ajax({
        type: "POST",
        url: "../admin_panel/clnt/client_have.php",
        data: {readclients:readclients},
        case:false,
        contentType: false,
        processData: false,
        success: function (data, status) {
            $("#menu2").html(data)
        }
    });
}

function readbarbers() {
    let readbarbers = "readbarbers";
    $.ajax({
        type: "POST",
        url: "../admin_panel/brb/barbers_have.php",
        data: {readbarbers:readbarbers},
        case:false,
        contentType: false,
        processData: false,
        success: function (data, status) {
            $("#menu1").html(data)
        }
    });
}

//delete
function deleteBarber(id) {
    var conf = confirm("Вы уверены, что хотите удалить?");
    if(conf === true){
    $.ajax({
        type: "POST",
        url: "../admin_panel/brb/delete.php",
        data: {id:id},
        success: function (data,status) {
            readbarbers();
        }
    });
}
}
function deleteBook(id) {
    var conf = confirm("Вы уверены, что хотите удалить?");
    if(conf === true){
    $.ajax({
        type: "POST",
        url: "../admin_panel/bk/delete.php",
        data: {id:id},
        success: function (data,status) {
            console.log(data);
            readbooks();
        }
    });
    }
}
function deleteClient(id) {
    let conf = confirm("Вы уверены, что хотите удалить?")
    if (conf === true) {
        $.ajax({
            type: "POST",
            url: "../admin_panel/clnt/delete.php",
            data: {id:id},
            success: function (data,status) {
                readclients();
            }
        });
    }
    
}


// add
$(document).ready(function (){
    $('.form').on('submit', function (e){
        e.preventDefault();
        console.log("click")
        $("#modal .close").click()
        let formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "../admin_panel/brb/addB.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

        })
        .done(function (data){ 
        console.log($('#modal'))

        readbarbers();
    })




    })

});
