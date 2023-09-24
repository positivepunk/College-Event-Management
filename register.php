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
<?php require 'utils/header.php'; ?>
<div class="content"><!-- body content holder -->
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST">
                <label>Student USN:</label><br>
                <input type="text" name="usn" class="form-control" required><br><br>
                <label>Student Name:</label><br>
                <input type="text" name="name" class="form-control" required><br><br>
                <label>Branch:</label><br>
                <input type="text" name="branch" class="form-control" required><br><br>
                <label>Semester:</label><br>
                <input type="text" name="sem" class="form-control" required><br><br>
                <label>Email:</label><br>
                <input type="text" name="email" class="form-control" required><br><br>
                <label>Phone:</label><br>
                <input type="text" name="phone" class="form-control" required><br><br>
                <label>College:</label><br>
                <input type="text" name="college" class="form-control" required><br><br>
                <button type="submit" name="update">Submit</button><br><br>
                <a href="usn.php"><u>Already registered?</u></a>
            </form>
        </div>
    </div>
</div>
<?php require 'utils/footer.php'; ?>
</body>
</html>

<?php
if (isset($_POST["update"])) {
    $usn = $_POST["usn"];
    $name = $_POST["name"];
    $branch = $_POST["branch"];
    $sem = $_POST["sem"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $college = $_POST["college"];
    
    if (!empty($usn) && !empty($name) && !empty($branch) && !empty($sem) && !empty($email) && !empty($phone) && !empty($college)) {
        include 'classes/db1.php';
        $INSERT = "INSERT INTO participent (usn, name, branch, sem, email, phone, college, event_id) 
                   VALUES ('$usn', '$name', '$branch', $sem, '$email', '$phone', '$college', '$EID')";
        $INSERT2 = "INSERT INTO registered (usn, event_id) VALUES ('$usn', '$EID')";
        
        if ($conn->query($INSERT) === TRUE && $conn->query($INSERT2) === TRUE) {
            echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='usn.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Already registered this USN');
                    window.location.href='usn.php';
                  </script>";
        }
        $conn->close();
    } else {
        echo "<script>
                alert('All fields are required');
                window.location.href='register.php';
              </script>";
    }
}
?>
