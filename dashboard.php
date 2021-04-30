<?php
session_start();

if(!isset($_SESSION['customer_id'])){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <a href="dashboard.php">Home</a>
    <!-- <a href="view_users.php">View users</a> -->
    <a href="view_course.php">View Courses</a>
    <a href="add_course.php">Add Course</a>
    <a href="edit_course.php">Edit Course</a>
    <a href="delete_course.php">Delete Course</a>

    <h1>Welcome <?php echo $_SESSION['firstname']; ?></h1>
    <a href="logout.php">Clich here to logout</a>
</body>
</html>