<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="mail_utilisateur">Saisir l'email</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Saisir le mot de passe</label>
        <input type="password" name="password_utilisateur">
        <input type="submit" value="Connexion" name="submit">
        <div><?=$error?></div>
    </form>
</body>
</html>