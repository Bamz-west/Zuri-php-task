<?php
session_start();

# Import database
include 'includes/db.php';

#Import functions
include 'includes/func.php';

$errors=[];
# Check if user clicked the submit button

if(array_key_exists('submit',$_POST)){
    if(empty($_POST['email'])){
        $errors['email']="Please enter your Email";
    }
    if(empty($_POST['password'])){
        $errors['password']="Please enter your Password";
    }

    # If everything is ok
    if(empty($errors)){

        loginuser($conn);

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

        # Display message only if message exists

        if(isset($_GET['m'])){
            echo $_GET['m']; 
        }
    ?>
    <form method="post" action="login.php">

        <?php displayerrors($errors,'email'); ?>
        <label for="email">Email :</label>
        <input type="email" name="email"><br/>
       
        <?php displayerrors($errors, 'password'); ?>
        <label for="password">Password :</label>
        <input type="password" name="password"><br/>
        

        <input type="submit" name="submit" value="login">
    
    </form>
</body>
</html>