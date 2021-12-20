$(document).ready(function () {
    vratiSveDoktore();
})


function vratiSveDoktore() {

    $.ajax(
        {
            url: 'getall.php',
            method: 'get',
            success: function (data) {
                $('#table').html(data);
            }
        }

    )
}