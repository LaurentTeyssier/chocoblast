<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="1" id="">
        <input type="text" name="2" id="">
        <input type="text" name="3" id="">
        <input type="text" name="4" id="">
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>

<?php $content = ob_get_clean();?>