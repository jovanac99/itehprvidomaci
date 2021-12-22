<table class="table table-bordered border-info table-striped mt-2">
    <thead>
        <tr class="text-center table-info">
            <th id="id" value="desc">ID</th>
            <th id="ime" value="desc">Ime</th>
            <th id="prezime" value="desc">Prezime</th>
            <th id="specijalizacija" value="desc">Specijalizacija</th>
            <th id="ustanova_id" value="desc">Ustanova</th>
            <th id="akcija" value="desc">Akcija</th>
        </tr>
    </thead>

    <tbody>
        <?php

        require "Database.php";
        $db = new Database('doktor_ustanova');

        $kriterijum = $_POST['input'];

        $query = "select d.id, d.ime, d.prezime, d.specijalizacija, u.naziv from doktor d join ustanova u on d.ustanova_id=u.id where
         d.id like '%" . $kriterijum . "%' or d.ime like '%" . $kriterijum . "%' or d.prezime like '%" . $kriterijum . "%' or d.specijalizacija like '%" . $kriterijum . "%' or u.naziv like '%" . $kriterijum . "%'";

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