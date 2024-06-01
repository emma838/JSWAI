<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
?>
<div class="container">
    <h3>Dodaj płytę do bazy</h3>
    <!-- fromularz dodawnaia plyty -->
    <form action="handle_form.php" method="post">
        <label>Tytuł: </label><input type="text" name="tytul"><br>
        <label>Wykonawca: </label><input type="text" name="wykonawca"><br>
        <label>Gatunek: </label>
        <select name="gatunek">
            <option value="Rock">Rock</option>
            <option value="Pop">Pop</option>
            <option value="Metal">Metal</option>
            <option value="Jazz">Jazz</option>
        </select><br>
        <label>Data wydania: </label><input type="date" name="data"><br>
        <button type="submit">Dodaj</button><br><br>
    </form>
    <?php
    // Wyświetlanie komunikatów o błędach lub sukcesie
    if (isset($_GET['error'])) {
        echo "<p style='color: red'>" . $_GET['error'] . "</p>";
    } elseif (isset($_GET['success'])) {
        echo "<p style='color: green'>" . $_GET['success'] . "</p>";
    }
    ?>

    <!-- formularz wyswietlania i filtrowania -->
    <h3>Wyświetl płyty</h3>

    <form action="" method="POST">
        <label>Wybierz gatunek: </label> 
        <select name="gatunek2">
        <option value=""></option>
            <option value="Rock">Rock</option>
            <option value="Pop">Pop</option>
            <option value="Metal">Metal</option>
            <option value="Jazz">Jazz</option>
        </select>
        <label>Wybierz wykonawce: </label>
        <select name="artysta">
        <option value=""></option>
        <?php
            // Połączenie z bazą danych MongoDB
            $connection = new MongoDB\Driver\Manager("mongodb://user1:password@localhost:27017/?authSource=labyphp&authMechanism=SCRAM-SHA-256");

            // Pobranie listy artystów z bazy danych
            $command = new MongoDB\Driver\Command(['distinct' => 'plyty', 'key' => 'wykonawca']);
            $cursor = $connection->executeCommand('labyphp', $command);
            $artists = current($cursor->toArray())->values;

            // Wyświetlenie opcji artystów
            foreach ($artists as $artist) {
                echo "<option value=\"$artist\">$artist</option>";
            }
            ?>
        ?>

        </select>
        <button type="submit">Wyswietl</button><br><br>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // Połączenie z bazą danych MongoDB
        $connection = new MongoDB\Driver\Manager("mongodb://user1:password@localhost:27017/?authSource=labyphp&authMechanism=SCRAM-SHA-256");
   
        //pobranie gatunku
        $gatunek=$_POST['gatunek2'];
        $artysta=$_POST['artysta'];

        $filter=[];

        //zapytanie do bazy
        if (!empty($gatunek)) {
            $filter['gatunek'] = $gatunek;
        }
        if (!empty($artysta)) {
            $filter['wykonawca'] = $artysta;
        }
        $query=new MongoDB\Driver\Query($filter);

        //wykonanie zapytania
        try{
            $cursor = $connection->executeQuery('labyphp.plyty', $query);
            echo "<ul style='list-style-type: none;'>";

            foreach($cursor as $doc){

                echo "<li>
                    <strong>ID: </strong>" .$doc->_id . "<br>
                    <strong>Tytuł: </strong>" .$doc->tytul . "<br>
                    <strong>Wykonawca: </strong>" .$doc->wykonawca . "<br> 
                    <strong>Gatunek: </strong>" .$doc->gatunek . "<br> 
                    <strong>Data wydania: </strong>" .$doc->data_wydania . "<br><hr>  
                </li>";

            }
            echo "</ul>";
        }
        catch (MongoDB\Driver\Exception\Exception $e) {
            echo "Błąd podczas wyświetlania płyt: " . $e->getMessage();
        }
    }
?>

<!-- edytowanie plyty -->
<h3>Edytuj album</h3>
    <form action="edit.php" method="post">
        <label for="plyta">Wybierz ID płyty:</label>
        <select name="plyta" id="plyta">
            <option value="">Wybierz ID płyty</option>
            <?php
            // Połączenie z bazą danych MongoDB
            $connection = new MongoDB\Driver\Manager("mongodb://user1:password@localhost:27017/?authSource=labyphp&authMechanism=SCRAM-SHA-256");

            // Pobranie wszystkich ID płyt z bazy danych
            $query = new MongoDB\Driver\Query([]);
            $cursor = $connection->executeQuery('labyphp.plyty', $query);

            // Wyświetlenie opcji ID płyt
            foreach ($cursor as $document) {
                echo "<option value=\"" . $document->_id . "\">" . $document->_id . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Edytuj">
    </form>

    

</div>
</body>
</html>