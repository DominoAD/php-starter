<!DOCTYPE html>
<html>
<head>
    <title>PHP Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    $activePage = 'email';
    $pageName = 'Email';
    include './sections/header.php';
    include './sections/nav.php';
    ?>
    <h1>Welcome to my PHP Page</h1>
    <?php
        echo "Hello, World!";
    ?>
    <?php include './sections/footer.php' ?>
</body>
</html>