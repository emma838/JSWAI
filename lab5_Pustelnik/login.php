<?php

session_start();

$poprawny_email = "123@xyz.pl";
$poprawne_haslo = "password123";

$result = ""; // Zmienna przechowująca wynik logowania

if(isset($_POST["submit"])) { // Sprawdzamy, czy formularz został przesłany za pomocą metody POST
    // Sprawdzamy, czy został przesłany formularz logowania
    $podany_email = $_POST["email"];
    $podane_haslo = $_POST["password"];

    if ($podany_email == $poprawny_email && $podane_haslo == $poprawne_haslo) {
        // Jeśli podane dane są poprawne, ustawiamy odpowiednią informację
        $result = "Poprawnie zalogowano"; 
    } else {
        // W przeciwnym razie, ustawiamy informację o błędnym logowaniu
        $result = "Błędne dane logowania";
    }

    // Ustawiamy ciasteczko przechowujące wynik logowania
    setcookie("login_result", $result, time() + (86400 * 30), "/"); // 86400 = 1 dzień
}

// Przekierowujemy użytkownika z powrotem do formularza logowania
header("Location: logowanie.php");
exit();

?>


