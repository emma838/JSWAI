<?php
session_start();

if (isset($_POST['submit_page3'])) {
    // Kod przetwarzający dane z trzeciej strony formularza
}


// Pobieranie danych z poprzednich stron
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$model = $_POST['model'];
$year = $_POST['year'];
$registration_number = $_POST['registration_number'];

$description = $_POST['description'];
$date = $_POST['date'];
$damage_estimate = $_POST['damage_estimate'];

// Zapisanie danych do sesji
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['phone'] = $phone;

$_SESSION['model'] = $model;
$_SESSION['year'] = $year;
$_SESSION['registration_number'] = $registration_number;

$_SESSION['description'] = $description;
$_SESSION['date'] = $date;
$_SESSION['damage_estimate'] = $damage_estimate;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Podsumowanie zgłoszenia szkody OC</title>
</head>
<body>
    <h3>Podsumowanie zgłoszenia szkody OC</h3>
    
    <h3>Dane zgłaszającego:</h3>

    <div class="summary">
    <?php 
    // Sprawdź, czy dane zgłaszającego zostały przekazane
    if (isset($_POST['name'])) {
        echo "Imię i nazwisko: " . $_POST['name'] . "<br>";
    }
    if (isset($_POST['email'])) {
        echo "Adres email: " . $_POST['email'] . "<br>";
    }
    if (isset($_POST['phone'])) {
        echo "Telefon kontaktowy: " . $_POST['phone'] . "<br>";
    }
    ?>

    <h2>Dane pojazdu:</h2>
    <?php 
    // Sprawdź, czy dane pojazdu zostały przekazane
    if (isset($_POST['model'])) {
        echo "Model pojazdu: " . $_POST['model'] . "<br>";
    }
    if (isset($_POST['year'])) {
        echo "Rok produkcji: " . $_POST['year'] . "<br>";
    }
    if (isset($_POST['registration_number'])) {
        echo "Numer rejestracyjny: " . $_POST['registration_number'] . "<br>";
    }
    ?>

    <h2>Informacje o zdarzeniu:</h2>
    <?php 
    // Sprawdź, czy informacje o zdarzeniu zostały przekazane
    if (isset($_POST['description'])) {
        echo "Opis zdarzenia: " . $_POST['description'] . "<br>";
    }
    if (isset($_POST['event_date'])) {
        echo "Data zdarzenia: " . $_POST['event_date'] . "<br>";
    }
    if (isset($_POST['damage_estimate'])) {
        echo "Szacowana kwota szkody: " . $_POST['damage_estimate'] . "<br>";
    }
    ?>
    </div>
</body>
</html>



