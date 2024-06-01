<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['model'] = $_POST['model'];
$_SESSION['year'] = $_POST['year'];
$_SESSION['registration_number'] = $_POST['registration_number'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formularz zgłaszania szkody OC - Strona 3</title>
</head>
<body>
    <h3>Formularz zgłaszania szkody OC - Strona 3</h3>
    <form action="page4.php" method="POST">

    <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">
    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
    <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>">
    <input type="hidden" name="model" value="<?php echo $_SESSION['model']; ?>">
    <input type="hidden" name="year" value="<?php echo $_SESSION['year']; ?>">
    <input type="hidden" name="registration_number" value="<?php echo $_SESSION['registration_number']; ?>">


        <label for="description">Opis zdarzenia:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>
        
        <label for="date">Data zdarzenia:</label><br>
        <input type="datetime-local" id="date" name="date" required><br>
        
        <label for="damage_estimate">Szacowana kwota szkody:</label><br>
        <input type="number" id="damage_estimate" name="damage_estimate" min="0" required><br>
        
        <button type="submit" name="submit_page3">Przejdź do strony 4</button>

    </form>
</body>
</html>
