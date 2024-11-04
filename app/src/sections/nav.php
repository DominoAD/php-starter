<nav class='topnav'>
        <?php if (empty($activePage)) {
            $activePage = "home";
        } ?>
        <a <?php if ($activePage == "home") {
            echo 'class="active"';
        } ?> href='./index.php'>Home</a>
        <a <?php if ($activePage == "projects") {
            echo 'class="active"';
        } ?> href='./addProgram.php'>Add Form</a>
        <a <?php if ($activePage == "courses") {
            echo 'class="active"';
        } ?> href='./courses.php'>Courses</a>
        <a <?php if ($activePage == "schedule") {
            echo 'class="active"';
        } ?> href='./schedule.php'>Schedule</a>
        <a <?php if ($activePage == "Database") {
            echo 'class="active"';
        } ?> href='./databaselist.php'>Database List</a>
        <a <?php if ($activePage == "contact") {
            echo 'class="active"';
        } ?> href='http://localhost:8113/'>phpMyAdmin</a>
        <a <?php if ($activePage == "legend") {
            echo 'class="active"';
        } ?> href='./legend.php'>legend</a>
</nav>
