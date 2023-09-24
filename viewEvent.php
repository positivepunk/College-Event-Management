<?php
//session_start();
require 'classes/db1.php';

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM events, event_info ef, student_coordinator s, staff_coordinator st WHERE type_id = $id and ef.event_id = events.event_id and s.event_id = events.event_id and st.event_id = events.event_id");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>cems</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
    <?php require 'utils/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="col-md-12"></div>
            <?php
            if (isset($result) && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    include 'events.php';
                }
            }
            ?>
            <html>
            <body>
                <div style="position:relative; left:550px;">
                    <form action="register.php" method="get">
                        <label style="font-size:24px;">Enter eventid to register</label>
                        <input type="number" name="varname" style="border:5px solid;background-color:#eafafb;" required>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
                </div>
                <br>
            </body>
            </html>
            <div class="container">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span>Back</a>
        </div><!--body content div-->
    </div>
    <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
</body>
</html>
