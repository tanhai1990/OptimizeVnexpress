
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Chào bạn <?php echo $_SESSION["HoTen"]; ?>!</p>
    <form action="" method="post">
        <input type="submit" name="btnLogout" value="Thoát">
    </form>
</body>
</html>
