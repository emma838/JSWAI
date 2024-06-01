<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formularz zgłaszania szkody OC - Strona 1</title>
</head>
<body>
    <h3>Formularz zgłaszania szkody OC - Strona 1</h3>
    <form action="page2.php" method="POST">
        <label for="name">Imię i nazwisko:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="email">Adres email:</label><br>
        <input type="email" id="email" name="email"><br>
        
        <label for="phone">Telefon kontaktowy:</label><br>
        <input type="tel" id="phone" name="phone" required><br>
        
        <button type="submit" name="submit_page1">Przejdź do strony 2</button>

    </form>
</body>
</html>
