<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form id="addProgramForm" method="POST" action="insertInto.php">
                <label for="programCode">Program Code:</label>
                <input type="text" name="programCode" id="programCode" size="4" maxlength="4" minlength="4" required>
                
                <label for="programTitle">Program Title:</label>
                <input type="text" name="programTitle" id="programTitle" required>
                
                <input type="submit" value="Add Program">
            </form>
            <div id="responseMessage"></div>
        </article>
    </section>

    <?php 
        include './sections/footer.php';
    ?>

    <script>
        document.getElementById('addProgramForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting and navigating to a new page

            const formData = new FormData(this);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'insertInto.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('responseMessage').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('responseMessage').innerHTML = '<h1>Error! Unable to insert program!</h1>';
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>