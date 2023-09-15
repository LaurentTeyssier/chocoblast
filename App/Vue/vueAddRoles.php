<?php




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <form action="" method="post">
        <label for="nom_roles">Saisir le nom du rôle</label>    
        <input type="text" name="nom_roles">
        <input type="submit" value="Ajouter" name="submit">
        <div><?=$error?></div>
    </form>
</body>
</html>