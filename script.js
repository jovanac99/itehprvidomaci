$(document).ready(function () {
    vratiSveDoktore();
    dodajNovogDoktora();
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

function dodajNovogDoktora() {

    $(document).on('click', '#btn_add', function () {

        let ime = $('#ime').val();
        let prezime = $('#prezime').val();
        let specijalizacija = $('#specijalizacija').val();
        let ustanova = $('#ustanova').val();

        if (ime == '' || prezime == '' || specijalizacija == '' || ustanova == '') {
            alert('Neophodno je da popunite polja!');
            return;
        }

        $.ajax({
            url: 'add.php',
            method: 'post',
            data: { ime: ime, prezime: prezime, specijalizacija: specijalizacija, ustanova: ustanova },

            success: function (data) {
                alert(data);
                vratiSveDoktore();
                $('#ime').val('');
                $('#prezime').val('');
                $('#specijalizacija').val('');
                $('#ustanova').val(1);
            }
        })
    })

}