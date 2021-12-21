        <?php

        include 'Database.php';
        include 'Doktor.php';
        $db = new Database('doktor_ustanova');

        $id = $_POST['id'];

        $query = "select * from doktor where id=" . $id;

        $result = $db->conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];
            $ime = $row['ime'];
            $prezime = $row['prezime'];
            $specijalizacija = $row['specijalizacija'];
            $ustanova_id = $row['ustanova_id'];

            $doktor = new Doktor($id, $ime, $prezime, $specijalizacija, $ustanova_id);
        }

        echo json_encode($doktor);
