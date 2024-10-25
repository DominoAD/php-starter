<!DOCTYPE HTML>
<html>
<head>
    <title>Add Program</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 auto;
        }
        label {
            margin-top: 10px;
        }
        input, textarea {
            margin-top: 5px;
            margin-bottom: 10px;
            padding: 5px;
        }
        input[type="submit"] {
            width: 100px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php
    $activePage = 'addProgram';
    $pageName = 'Add Program';
    include './sections/header.php';
    include './sections/nav.php';
    ?>
    <section>
        <article>
            <h2>Add Program</h2>
            <form action="addProgram.php" method="post">
                <label for="programCode">Program Code:</label>
                <input type="text" name="programCode" id="programCode" required>
                <label for="programTitle">Program Title:</label>
                <input type="text" name="programTitle" id="programTitle" required>
                <input type="submit" value="Add Program">
            </form>
        </article>
    </section>
    <?php include './sections/footer.php' ?>
</body>
</html>