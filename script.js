$(document).ready(function () {
    vratiSveDoktore();
    dodajNovogDoktora();
    obrisiDoktora();
    napuniFormu();
    sacuvajIzmenjenogDoktora();
    pretraziDoktore();
    sortirajDoktore();
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

function obrisiDoktora() {

    $(document).on('click', '#btn_delete', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                alert(data);
                vratiSveDoktore();
            }
        })
    })
}

function napuniFormu() {

    $(document).on('click', '#btn_edit', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'edit.php',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                $('#hiddenid').val(data.id);
                $('#ime').val(data.ime);
                $('#prezime').val(data.prezime);
                $('#specijalizacija').val(data.specijalizacija);
                $('#ustanova').val(data.ustanova_id);
                $('#btn_add').hide();
                $('#btn_update').show();
            }
        })
    })
}

function sacuvajIzmenjenogDoktora() {

    $(document).on('click', '#btn_update', function () {

        let id = $('#hiddenid').val();
        let ime = $('#ime').val();
        let prezime = $('#prezime').val();
        let specijalizacija = $('#specijalizacija').val();
        let ustanova_id = $('#ustanova').val();

        $.ajax({
            url: 'update.php',
            method: 'post',
            data: { id: id, ime: ime, prezime: prezime, specijalizacija: specijalizacija, ustanova_id: ustanova_id },

            success: function (data) {
                alert(data);
                vratiSveDoktore();
            }
        })

    })
}

function pretraziDoktore() {

    $(document).on('keyup', '#searchinput', function () {

        let input = this.value;

        $.ajax(
            {
                url: 'getallSearch.php',
                method: 'post',
                data: { input: input },
                success: function (data) {
                    {
                        $('#table').html(data);
                    }
                }
            }
        )
    })
}

function sortirajDoktore() {

    $(document).on('click', 'th', function () {

        let id = $(this).attr('id');
        let poredak = $(this).attr('value');


        if (id == 'akcija') {
            alert('Ova kolona se ne moze sortirati!');
            return;
        }

        $.ajax({
            url: 'getallSort.php',
            method: 'post',
            data: { id: id, poredak: poredak },

            success: function (data) {
                $('#table').html(data);
            }
        })

    })
}