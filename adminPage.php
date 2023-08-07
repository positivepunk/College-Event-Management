<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator 
st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>cems</title>
</head>
<body>
<?php include 'utils/adminHeader.php'?>
<div class = "content">
<div class = "container">
<h1>Event details</h1>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-hover" >
<thead>
<tr>
<th>Event_name</th>
<th>Price</th>
<th>Student Co-ordinator</th>
<th>Staff Co-ordinator</th>
<th>Date</th>
<th>Time</th>
<th>location </th>
</tr>
</thead>
<tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)){
echo '<tr>';
42
echo '<td>' . $row['event_title'] . '</td>';
echo '<td>' . $row['event_price'] . '</td>';
echo '<td>' . $row['st_name'] . '</td>';
echo '<td>' . $row['name'] . '</td>';
echo '<td>'.$row['Date'].'</td>';
echo '<td>'.$row['time'].'</td>';
echo '<td>'.$row['location'].'</td>';
echo '<td>'
.'<a class="delete" href="deleteEvent.php?id='.$row['event_id'].'">Delete</a> '
.'</td>';
echo '</tr>';
$i++;
}
?>
</tbody>
</table>
<?php
}
?>
<a class="btn btn-default" href = "createEventForm.php">Create Event</a><!--register button-->
</div>
</div>
<?php require 'utils/footer.php'; ?>
</body>
</html>
Stu_cordinator.php
<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM student_coordinator s ,events e where e.event_id= 
s.event_id");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>cems</title>
<title></title>
<?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
43
</head>
<body><?php include 'utils/adminHeader.php'?>
<div class = "content">
<div class = "container">
<h1>Student Co-ordinator details</h1>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-hover" >
<tr>
<th>Name</th>
<th>Phone</th>
<th>Event</th>
<th></th>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["st_name"]; ?></td>
<td><?php echo $row["phone"]; ?></td>
<td><?php echo $row["event_title"]; ?></td>
<td> <?php echo '<a href="updateStudent.php?id='.$row['event_id'].'" class = "btn btn-default"> 
Update</a>'?></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
echo "No result found";
}
?>
</div>
</div>
</body>
<?php include 'utils/footer.php';?>
</html>