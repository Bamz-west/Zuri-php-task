<?php
session_start();

include 'includes/func.php';

include 'includes/db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <a href="dashboard.php">Home</a>
    <a href="view_users.php">View users</a>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
                <th>username</th>
                <th>email</th>
            </tr>
        </thead>

        <tbody>
            <?php showcustomers($conn); ?>
        </tbody>
    </table>
</body>
</html>