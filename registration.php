<?php
    
    include 'includes/db.php';

    include 'includes/func.php';
    
    $errors=[];
    //  Be sure user clicked the submit button

    if(array_key_exists('submit', $_POST)){
        // Process and validate form
        // echo "good to go";

        if(empty($_POST['firstname'])){
           $errors['firstname']="Please enter your first name";
        }
        if(empty($_POST['lastname'])){
            $errors['lastname']="Please enter your lastname";
        }
        if(empty($_POST['email'])){
            $errors['email']="Please enter your Email";
        }
        if(empty($_POST['password'])){
            $errors['password']="Please enter your Password";
        }
        if(empty($_POST['username'])){
            $errors['username']="Please enter your Username";
        }
        if(empty($errors)){

          registeruser($conn);
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
    <h1>Register</h1>
    <hr/>
    <form action="registration.php" method="POST">
        <?php
            displayerrors($errors,'firstname');
        ?>
        <label>First Name</label>
        <input type="text" name="firstname"><br/>
        
        <?php
            displayerrors($errors,'lastname');
        ?>
        <label>Last Name</label>
        <input type="text" name="lastname"><br/>
        
        <?php
            displayerrors($errors,'email');
        ?>
        <label>Email</label>
        <input type="text" name="email"><br/>
        
        <?php
            displayerrors($errors,'password');
        ?>
        <label>Password</label>
        <input type="password" name="password"><br/>

        <?php
            displayerrors($errors,'username');
        ?>
        <label for="username">Username</label>
        <input type="text" name="username"><br/>

            

        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>