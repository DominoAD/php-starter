<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legend</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        h2 {
            text-align: center;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        $activePage = 'legend';
        $pageName = 'Legend';
        include './sections/header.php';
        include './sections/nav.php';
    ?>
    <form action="">
        <fieldset>
            <legend>Legend</legend>
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required>
            <br>
            <br>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" required>
        </fieldset>
    </form>
    <?php
        include './sections/footer.php';
    ?>
</body>
</html>