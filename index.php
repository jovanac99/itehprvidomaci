<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>Doktori</title>
</head>

<body>

    <div class="container">

        <div class="forma">

            <div class="col" style="padding-left: 100px;">
                <h2 class="text-center mt-3">Doktor</h2>
                <form action="" class="text-center">

                    <hidden id="hiddenid" value=""></hidden>

                    <div class="form-group mt-3 mb-3">
                        <label for="ime">Ime: </label>
                        <input type="text" class="form-control" id="ime" name="ime">
                    </div>
                    <div class="form-group mb-3">
                        <label for="prezime">Prezime: </label>
                        <input type="text" class="form-control" id="prezime" name="prezime">
                    </div>
                    <div class="form-group mb-3">
                        <label for="specijalizacija">Specijalizacija: </label>
                        <input type="text" class="form-control" id="specijalizacija" name="specijalizacija">
                    </div>
                    <div class="form-group mb-3">
                        <label for="ustanova" class="form-label">Ustanova: </label>
                        <select name="ustanova" id="ustanova" class="form-select">
                            <?php

                            include 'Database.php';
                            $db = new Database('doktor_ustanova');

                            $query = "select * from ustanova";
                            $result = $db->conn->query($query);

                            while ($row = mysqli_fetch_assoc($result)) :
                            ?>
                                <option class="text-center" value="<?php echo $row['id']; ?>"><?php echo $row['naziv']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <button type="button" id="btn_add" class="btn btn-primary">Sačuvaj</button>
                    <button type="button" id="btn_update" class="btn btn-primary" style="display: none;">Izmeni</button>

                </form>
            </div>

        </div>


        <div class="tabela">

            <h4 style="margin-top:20px;">Pretraga: </h4>
            <input type="text" id="searchinput">

            <div class="col" style="padding-right: 150px; margin-top:10px;" id="table">

            </div>
        </div>


</body>

</html>