<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>cems</title>
    <?php
    $EID = isset($_GET["varname"]) ? $_GET["varname"] : "";

    require 'utils/styles.php'; // Include CSS links from the 'utils' folder
    ?>
</head>
<body>
<?php require 'utils/adminHeader.php'; ?>
<form method="POST">
<div class="w3-container">
<div class ="content"><!--body content holder-->
<div class = "container">
<div class ="col-md-6 col-md-offset-3">
<label>Event ID:</label><br>
<input type="number" name="event_id" required class="form-control"><br><br>
<label>Event Name:</label><br>
<input type="text" name="event_title" required class="form-control"><br><br>
<label>Event Price:</label><br>
<input type="number" name="event_price" required class="form-control"><br><br>
<label>Upload Path to Image:</label><br>
<input type="text" name="img_link" required class="form-control"><br><br>
<label>Type_ID </label><br>
<input type="number" name="type_id" required class="form-control"><br><br>
<label>Event Date</label><br>
<input type="date" name="Date" required class="form-control"><br><br>
<label>Event Time</label><br>
<input type="text" name="time" required class="form-control"><br><br>
<label>Event Location</label><br>
<input type="text" name="location" required class="form-control"><br><br>
<label>Staff co-ordinator name</label><br>
<input type="text" name="sname" required class="form-control"><br><br>
<label>Student co-ordinator name</label><br>
<input type="text" name="st_name" required class="form-control"><br><br>
<button type="submit" name="update" class="btn btn-default pull-right">Create Event <span 
class="glyphicon glyphicon-send"></span></button>
<a class="btn btn-default navbar-btn" href = "adminPage.php"><span class="glyphicon glyphicon-circle-arrowleft"></span> Back</a>
</div></div></div>
</form>
</body>
<?php require 'utils/footer.php'; ?>
</html>
<?php
if (isset($_POST["update"])) {
    $event_id = $_POST["event_id"];
    $event_title = $_POST["event_title"];
    $event_price = $_POST["event_price"];
    $img_link = $_POST["img_link"];
    $type_id = $_POST["type_id"];
    $name = $_POST["sname"];
    $st_name = $_POST["st_name"];
    $Date = $_POST["Date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    
    if (!empty($event_id) && !empty($event_title) && !empty($event_price) && !empty($img_link) && !empty($type_id)) {
        include 'classes/db1.php';

        // Insert into the 'events' table
        $INSERT_EVENTS = "INSERT INTO events (event_id, event_title, event_price, img_link, type_id) 
                          VALUES ($event_id, '$event_title', $event_price, '$img_link', $type_id)";
        
        // Insert into the 'event_info' table
        $INSERT_EVENT_INFO = "INSERT INTO event_info (event_id, Date, time, location) 
                              VALUES ($event_id, '$Date', '$time', '$location')";
        
        // Insert into the 'student_coordinator' table
        $INSERT_STUDENT_COORDINATOR = "INSERT INTO student_coordinator (sid, st_name, phone, event_id) 
                                      VALUES ($event_id, '$st_name', NULL, $event_id)";
        
        // Insert into the 'staff_coordinator' table
        $INSERT_STAFF_COORDINATOR = "INSERT INTO staff_coordinator (stid, name, phone, event_id) 
                                    VALUES ($event_id, '$name', NULL, $event_id)";
        
        // Execute the SQL queries
        if ($conn->query($INSERT_EVENTS) === TRUE && 
            $conn->query($INSERT_EVENT_INFO) === TRUE && 
            $conn->query($INSERT_STUDENT_COORDINATOR) === TRUE && 
            $conn->query($INSERT_STAFF_COORDINATOR) === TRUE) {
            echo "<script>
                    alert('Event Inserted Successfully!');
                    window.location.href='adminPage.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Event already exists or an error occurred.');
                    window.location.href='createEventForm.php';
                  </script>";
        }
        $conn->close();
    } else {
        echo "<script>
                alert('All fields are required');
                window.location.href='createEventForm1.php';
              </script>";
    }
}
?>
