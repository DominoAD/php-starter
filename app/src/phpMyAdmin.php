<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        iframe {
            display: block;
            border: none;
        }
    </style>
</head>
<body>
    <?php 
    include './sections/header.php'; 
    $pageName = 'My Admin';
    ?>
    <?php include './sections/nav.php' ?>
    <iframe src="http://localhost:8113/index.php?route=/database/structure&db=mydatabase" width="100%" height="1000px"></iframe>
<?php include './sections/footer.php' ?>
</body>
</html>