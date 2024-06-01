<?php
session_start();

// Sprawdzenie, czy są zapisane preferencje w sesji
if (isset($_SESSION['user_preferences'])) {
    $preferences = $_SESSION['user_preferences'];
    
    // Ustawienie stylu tylko dla sekcji wyświetlającej preferencje (rozmiar czcionki)
    $font_size = isset($preferences['font_size']) ? $preferences['font_size'] . 'px' : 'inherit';
    echo "<style>.preferences-info { font-size: $font_size; text-align: center; margin-top: 20px; }</style>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Preferencje</title>
    <?php
    // Sprawdzenie, czy są zapisane preferencje w sesji
    if (isset($_SESSION['user_preferences'])) {
        $background_color = isset($preferences['background_color']) ? $preferences['background_color'] : '#ffffff';
        echo "<style>body { background-color: $background_color; }</style>";
    }
    ?>
</head>
<body>
    
<form method="post" action="prefs.php">
    <h2>Preferencje</h2>
    <label for="language">Język strony:</label>
    <select id="language" name="language">
        <option value="pl" <?php if(isset($_SESSION['user_preferences']['language']) && $_SESSION['user_preferences']['language'] == 'pl') echo 'selected'; ?>>Polski</option>
        <option value="en" <?php if(isset($_SESSION['user_preferences']['language']) && $_SESSION['user_preferences']['language'] == 'en') echo 'selected'; ?>>Angielski</option>
    </select><br><br>
    <label for="background_color">Kolor tła:</label>
    <input type="color" id="background_color" name="background_color" value="<?php echo isset($_SESSION['user_preferences']['background_color']) ? $_SESSION['user_preferences']['background_color'] : '#ffffff'; ?>"><br><br>
    <label for="font_size">Rozmiar czcionki:</label>
    <input type="number" id="font_size" name="font_size" min="10" max="30" step="1" value="<?php echo isset($_SESSION['user_preferences']['font_size']) ? $_SESSION['user_preferences']['font_size'] : ''; ?>"><br><br>
    <button type="submit" value="Zapisz preferencje">Zapisz preferencje</button>
</form>

<?php
// Wyświetlenie preferencji z sesji
if(isset($_SESSION['user_preferences'])) {
    echo '<div class="preferences-info">';
    echo '<h2>Wybrane preferencje</h2>';
    echo '<p>- Wybrany język: ' . ($_SESSION['user_preferences']['language'] ?? 'brak danych') . '</p>';
    echo '<p>- Wybrany kolor: ' . ($_SESSION['user_preferences']['background_color'] ?? 'brak danych') . '</p>';
    echo '<p>- Wybrany rozmiar czcionki: ' . ($_SESSION['user_preferences']['font_size'] ?? 'brak danych') . '</p>';
    echo '</div>';
}
?>
</body>
</html>



















