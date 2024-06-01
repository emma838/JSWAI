<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phone'] = $_POST['phone'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formularz zgłaszania szkody OC - Strona 2</title>
</head>
<body>
    <h3>Formularz zgłaszania szkody OC - Strona 2</h3>
    <form action="page3.php" method="POST">

    <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">
    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
    <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>">

        <label for="model">Model pojazdu:</label><br>
        <select id="model" name="model" required>
            <option value="">Wybierz model</option>
            <option value="model1">Model 1</option>
            <option value="model2">Model 2</option>
            <option value="model3">Model 3</option>
            <option value="model4">Model 4</option>
            <option value="model5">Model 5</option>
        </select><br>
        
        <label for="year">Rok produkcji:</label><br>
        <input type="number" id="year" name="year" min="1900" max="9999" required><br>
        
        <label for="registration_number">Numer rejestracyjny:</label><br>
        <input type="text" id="registration_number" name="registration_number" required><br>
        
        <button type="submit" name="submit_page2">Przejdź do strony 3</button>

    </form>
</body>
</html>
