<?php

     // Połączenie z bazą danych MongoDB
     $connection = new MongoDB\Driver\Manager("mongodb://user1:password@localhost:27017/?authSource=labyphp&authMechanism=SCRAM-SHA-256");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Jeśli został wybrany ID płyty, wyświetl drugi formularz do edycji
        if (!empty($_POST['plyta'])) {
            $selected_id = $_POST['plyta'];

            // Pobranie danych wybranej płyty z bazy danych
            $filter = ['_id' => new MongoDB\BSON\ObjectID($selected_id)];
            $query = new MongoDB\Driver\Query($filter);
            $cursor = $connection->executeQuery('labyphp.plyty', $query);
            $document = current($cursor->toArray());

            // Wyświetlenie formularza z danymi wybranej płyty
            if ($document) {
    ?>
    <form action="handle_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $document->_id; ?>">

        <label for="tytul">Tytuł:</label>
        <input type="text" name="tytul" value="<?php echo $document->tytul; ?>"><br>

        <label for="gatunek">Gatunek:</label>
        <input type="text" name="gatunek" value="<?php echo $document->gatunek; ?>"><br>

        <label for="artysta">Artysta:</label>
        <input type="text" name="artysta" value="<?php echo $document->wykonawca; ?>"><br>

        <label for="data">Data wydania:</label>
        <input type="date" name="data" value="<?php echo $document->data_wydania; ?>"><br>

        <input type="submit" name="submit" value="Zapisz">
    </form>
    <?php
            } else {
                echo "Nie znaleziono danych dla wybranego ID płyty.";
            }
        } else {
            echo "Proszę wybrać ID płyty.";
        }
    }
    ?>