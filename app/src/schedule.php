<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Schedule</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    include './sections/header.php';
    include './sections/nav.php';
    ?>
    <h1>Course Schedule</h1>
    <table>
        <thead>
            <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>8:00-9:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9:00-10:00</td>
                <td>Introduction to Psychology (Room 101)</td>
                <td></td>
                <td>Introduction to Psychology (Room 101)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10:00-11:00</td>
                <td></td>
                <td>Calculus I (Room 202)</td>
                <td></td>
                <td>Calculus I (Room 202)</td>
                <td></td>
            </tr>
            <tr>
                <td>11:00-12:00</td>
                <td>English Literature (Room 303)</td>
                <td></td>
                <td>English Literature (Room 303)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>12:00-1:00</td>
                <td colspan="5">Lunch Break</td>
            </tr>
            <tr>
                <td>1:00-2:00</td>
                <td></td>
                <td>Chemistry Lab (Room 404)</td>
                <td></td>
                <td>Chemistry Lab (Room 404)</td>
                <td></td>
            </tr>
            <tr>
                <td>2:00-3:00</td>
                <td>World History (Room 505)</td>
                <td></td>
                <td>World History (Room 505)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3:00-4:00</td>
                <td></td>
                <td>Computer Science (Room 606)</td>
                <td></td>
                <td>Computer Science (Room 606)</td>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php include './sections/footer.php' ?>
</body>
</html>