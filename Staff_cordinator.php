<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,events e where e.event_id= s.event_id");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>cems</title>
<title></title>
<?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
</head>
<body><?php include 'utils/adminHeader.php'?>
<div class = "content">
<div class = "container">
<h1>Staff Co-ordinator details</h1>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-hover" ><tr>
<th>Name</th>
<th>Phone</th>
<th>Event</th>
<th></th></tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?><tr><td><?php echo $row["name"]; ?></td><td><?php echo $row["phone"]; ?></td>
<td><?php echo $row["event_title"]; ?></td>
45
<td> <?php echo '<a href="updateStaff.php?id='.$row['event_id'].'" class = "btn btn-default"> 
Update</a>'?></td></tr>
<?php
$i++;
}
?></table>
<?php
}
else{
echo "No result found";
}
?></div></div></body>
<?php include 'utils/footer.php';?>
</html>
Stu_details.php
<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM events,registered r ,participent p WHERE 
events.event_id=r.event_id and r.usn = p.usn order by event_title");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>cems</title>
<title></title>
<?php require 'utils/styles.php'; ?><!--css links. file found in utils folder--></head>
<body><?php include 'utils/adminHeader.php'?>
<div class = "content"><div class = "container"><h1>Student details</h1>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-hover" >
<tr><th>USN</th><th>Name</th><th>Branch</th><th>Sem</th><th>Email</th><th>Phone</th>
<th>College</th><th>Event</th></tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?><tr>
<td><?php echo $row["usn"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["branch"]; ?></td>
46
<td><?php echo $row["sem"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["phone"]; ?></td>
<td><?php echo $row["college"]; ?></td>
<td><?php echo $row["event_title"]; ?></td></tr>
<?php
$i++;
}
?></table>
<?php
}
else{
echo "No result found";
}
?></div></div>
<?php include 'utils/footer.php'?>;</body></html>
UpdatesStaff.php
<?php include 'classes/db1.php';
$id=$_GET['id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>cems</title>
<title></title>
<?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
</head>
<body>
<?php require 'utils/header.php'; ?>
<div class ="content"><!--body content holder-->
<div class = "container">
<div class ="col-md-6 col-md-offset-3">
<form method="POST">
<label>Staff co-ordinator name</label><br>
<input type="text" name="st_name" required class="form-control"><br><br>
<label>Staff co-ordinator phone</label><br>
<input type="text" name="phone" required class="form-control"><br><br>
<button type="submit" name="update" class = "btn btn-default ">Update</button></div></div></div>
</form>
<?php require 'utils/footer.php'; ?></body></html>
<?php
47
if (isset($_POST["update"]))
{
$name=$_POST["st_name"];
$phone=$_POST["phone"];
$sql="UPDATE staff_coordinator set phone='$phone',name='$name' where stid='$id'";
if($conn->query($sql)===true)
{
echo"<script>
alert(' Updated Successfully');
window.location.href='stu_cordinator.php';
</script>";
}
else
{
echo"<script>
window.location.href='updateStudent.php';
</script>";
}}?>