<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obsługa formularza z metodą POST
    if (isset($_POST["language"])) {
        // Pobranie preferencji z formularza
        $language = $_POST["language"];
        $backgroundColor = $_POST["background_color"];
        $fontSize = $_POST["font_size"];

        // Zapisanie preferencji w sesji
        $_SESSION["user_preferences"] = array(
            "language" => $language,
            "background_color" => $backgroundColor,
            "font_size" => $fontSize
        );

        // Ustawienie ciasteczka z preferencjami
        setcookie("user_preferences", serialize($_SESSION["user_preferences"]), time() + (86400 * 30), "/");

        // Przekierowanie użytkownika na stronę preferencji
        header("Location: preferencje.php");
        exit();
    }
}
?>
