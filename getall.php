<table class="table table-bordered border-info table-striped mt-2">
    <thead>
        <tr class="text-center table-info">
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Specijalizacija</th>
            <th>Ustanova</th>
            <th>Akcija</th>
        </tr>
    </thead>

    <tbody>

        <?php

        require "Database.php";
        $db = new Database('doktor_ustanova');

        $query = "select d.id, d.ime, d.prezime, d.specijalizacija, u.naziv from doktor d join ustanova u on d.ustanova_id=u.id";

        $result = $db->conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) :
        ?>
            <tr class="text-center">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ime'];  ?></td>
                <td><?php echo $row['prezime'];  ?></td>
                <td><?php echo $row['specijalizacija'];  ?></td>
                <td><?php echo $row['naziv']; ?></td>
                <td>
                    <button class="btn btn-info" id="btn_edit" value="<?php echo $row['id'] ?>">Izmeni</button>
                    <button class="btn btn-danger" id="btn_delete" value="<?php echo $row['id'] ?>">Obriši</button>
                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>

</table>