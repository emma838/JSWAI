<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // Połączenie z bazą danych MongoDB
        $connection = new MongoDB\Driver\Manager("mongodb://user1:password@localhost:27017/?authSource=labyphp&authMechanism=SCRAM-SHA-256");
   
        //pobranie gatunku
        $gatunek=$_POST['gatunek2'];

        $filter=[];

        //zapytanie do bazy
        if(!empty($gatunek)){
            $filter=['gatunek'=>$gatunek];
        }
        $query=new MongoDB\Driver\Query($filter);

        //wykonanie zapytania
        try{
            $cursor = $connection->executeQuery('labyphp.plyty', $query);
            echo "<ul>";

            foreach($cursor as $doc){

                echo "<li>
                    <strong>Tytuł: </strong><p>" .$doc->tytul . "</p><br>
                    <strong>Wykonawca: </strong><p>" .$doc->wykonawca . "</p><br> 
                    <strong>Gatunek: </strong><p>" .$doc->gatunek . "</p><br> 
                    <strong>Data wydania: </strong><p>" .$doc->data_wydania . "</p><br><hr>  
                </li>";

            }


            echo "</ul>";
        }
        catch (MongoDB\Driver\Exception\Exception $e) {
            echo "Błąd podczas wyświetlania płyt: " . $e->getMessage();
        }
    }

?>