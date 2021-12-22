<?php

require "Database.php";
$db = new Database('doktor_ustanova');

$id = $_POST['id'];
$poredak = $_POST['poredak'];

?>

<table class="table table-bordered border-info table-striped mt-2"">
    <thead>
        <tr class=" text-center table-info">
    <th id="id" value="<?php
                        if ($id != 'id') {
                            echo 'desc';
                        } else {
                            if ($poredak == 'asc') {
                                echo 'desc';
                            } else {
                                echo 'asc';
                            }
                        }
                        ?>">ID</th>
    <th id="ime" value="<?php if ($id != 'ime') {
                            echo 'desc';
                        } else {
                            if ($poredak == 'asc') {
                                echo 'desc';
                            } else {
                                echo 'asc';
                            }
                        }
                        ?>">Ime</th>
    <th id="prezime" value="<?php if ($id != 'prezime') {
                                echo 'desc';
                            } else {
                                if ($poredak == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                }
                            }
                            ?>">Prezime</th>
    <th id="specijalizacija" value="<?php if ($id != 'specijalizacija') {
                                        echo 'desc';
                                    } else {
                                        if ($poredak == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        }
                                    }
                                    ?>">Specijalizacija</th>
    <th id="ustanova_id" value="<?php if ($id != 'ustanova_id') {
                                    echo 'desc';
                                } else {
                                    if ($poredak == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    }
                                }
                                ?>">Ustanova</th>
    <th id="akcija">Akcija</th>
    </tr>
    </thead>

    <tbody>
        <?php

        $query = "select d.id, d.ime, d.prezime, d.specijalizacija, u.naziv from doktor d join ustanova u on d.ustanova_id=u.id order by " . $id . " " . $poredak . "";
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