<?php
    //walidacja danych z formularza

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //czy wszystkie pola wypelnione
        if(empty($_POST["tytul"]) || empty($_POST["wykonawca"]) || empty($_POST["gatunek"]) || empty($_POST["data"])){
            $errors[]="Wypełnij wszystkie pola";
        }
        else{
            //czy data ma wlasciwy format
            $data = $_POST['data']; 
            $format = 'Y-m-d';

            if(!DateTime::createFromFormat($format,$data)){
                $errors[]="Nieprawidłowy format daty";
            }
        }

        if(! empty($errors)){
            // Przekazanie komunikatów o błędach z powrotem do index.php
            $url = 'index.php?error=' . urlencode(implode("<br>", $errors));
            header('Location: ' . $url);
            exit();
        }
        else {

            // Połączenie z bazą danych MongoDB
            $connection = new MongoDB\Driver\Manager("mongodb://user1:password@localhost:27017/?authSource=labyphp&authMechanism=SCRAM-SHA-256");
   
            //pobranie danych z formularza
            $tytul = $_POST['tytul'];
            $wykonawca = $_POST['wykonawca'];
            $gatunek = $_POST['gatunek'];
            $data = $_POST['data'];

            //dokument do wstawienia do kolekcji
            $document = [
                'tytul'=> $tytul,
                'wykonawca'=> $wykonawca,
                'data_wydania'=>$data,
                'gatunek'=>$gatunek,
            ];

            //bulkwrite
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($document);

            //operacja na bazie
            try{
                $result = $connection->executeBulkWrite('labyphp.plyty', $bulk);
                $url = 'index.php?success=Płyta dodana';
                header('Location: ' . $url);
                exit();
            }
            catch(MongoDB\Drier\Exception\Exception $e){
                $url = 'index.php?error=' . urlencode("Błąd podczas dodawania płyty: " . $e->getMessage());
                header('Location: ' . $url);
                exit();
            }

        }

    }



    





?>