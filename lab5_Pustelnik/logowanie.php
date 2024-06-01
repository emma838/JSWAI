<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Logowanie</title>
</head>
<body>
    <form action="login.php" method="POST"> <!-- Zmieniamy metodę na POST -->
        Email<br>
        <input type="email" name="email"/><br>
        Hasło<br>
        <input type="password" name="password"/><br>
        <button type="submit" name="submit">Zaloguj</button>
    </form>
    <?php 
    // Inicjalizacja zmiennej wyniku logowania
    $result = "";

    if(isset($_COOKIE['login_result'])) {
        // Jeśli ciasteczko z wynikiem logowania istnieje, przypisz jego wartość do zmiennej wyniku
        $result = $_COOKIE['login_result'];
        // Usuń ciasteczko, aby nie było dostępne po odświeżeniu strony
        setcookie("login_result", "", time() - 3600);
    }

    ?>

<p class="login-info"><?php echo $result; ?></p>
</body>
</html>

