<?php
    
    $regErrors=[];
    //  Be sure user clicked the submit button

    if($_POST['register'] == "Submit"){
        // Process and validate form
        // echo "good to go";

        if(empty($_POST['firstname'])){
           $regErrors['firstname']="Please enter your first name";
        }
        if(empty($_POST['lastname'])){
            $regErrors['lastname']="Please enter your lastname";
        }
        if(empty($_POST['email'])){
            $regErrors['email']="Please enter your Email";
        }
        if(empty($_POST['password'])){
            $regErrors['password']="Please enter your Password";
        }
        if(empty($_POST['username'])){
            $regErrors['username']="Please enter your Username";
        }

        $varFirstname = $_POST['firstname'];
        $varLastname = $_POST['lastname'];
        $varUsername = $_POST['username'];
        $varEmail = $_POST['email'];
        $varPassword = $_POST['password'];
        
        if($regErrors != []) 
        {
          echo("<p>There was an error:</p>\n");
          echo("<ul>" . $regErrors . "</ul>\n");
        } 
        else 
        {
          $fs = fopen("mydata.txt","a");
          fwrite($fs,$varFirstname . ", " . $varName . ", " . $varUsername . ", " . $varEmail . ", " . $varPassword . "\n");
          fclose($fs);

          header("Location: thankyou.html");
          exit;
        }
        
    }

    $loginErrors=[];
    # Check if user clicked the submit button

    if($_POST['login'] == "Submit"){

        session_start();

        if(empty($_POST['email'])){
            $loginErrors['email']="Please enter your Email";
        }
        if(empty($_POST['password'])){
            $loginErrors['password']="Please enter your Password";
        }

        $varEmail = $_POST['email'];
        $varPassword = $_POST['password'];

        # If everything is ok
        if($loginErrors != []) 
        {
          echo("<p>There was an error:</p>\n");
          echo("<ul>" . $loginErrors . "</ul>\n");
        } 
        else 
        {
          $fs = fopen("mydata.txt","r");
          $size = filesize("mydata.txt");
          fread($fs, $size);
          fclose($fs);

          header("Location: success.html");
          exit;
        }
    }

    $resetErrors=[];
    # Check if user clicked the submit button

    if($_POST['resetPassword'] == "Submit"){
        if(empty($_POST['email'])){
            $resetErrors['email']="Please enter your Email";
        }
        if(empty($_POST['password'])){
            $resetErrors['password']="Please enter your Password";
        }

        $varEmail = $_POST['email'];
        $varPassword = $_POST['password'];

        # If everything is ok
        if($resetErrors != []) 
        {
          echo("<p>There was an error:</p>\n");
          echo("<ul>" . $resetErrors . "</ul>\n");
        } 
        else 
        {
          $fs = fopen("mydata.txt","r");
          fwrite($fs,$varPassword . "\n");
          fclose($fs);

          header("Location: success.html");
          exit;
        }
    }

    if($_POST['logout'] == "Submit") {
        session_end();
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
    <form action="auth.php" method="POST">

        <label>First Name</label>
        <input type="text" name="firstname"><br/>
        
        <label>Last Name</label>
        <input type="text" name="lastname"><br/>
   
        <label>Email</label>
        <input type="text" name="email"><br/>
        
        <label>Password</label>
        <input type="password" name="password"><br/>

        <label for="username">Username</label>
        <input type="text" name="username"><br/>


        <input type="submit" name="register" value="Register">
    </form>

    <h1>Login</h1>
    <hr/>
    <form method="post" action="auth.php">

        <label for="email">Email :</label>
        <input type="email" name="email"><br/>
       
        <label for="password">Password :</label>
        <input type="password" name="password"><br/>
        

        <input type="submit" name="login" value="login">
    
    </form>

    <h1>Reset Password</h1>
    <hr/>
    <form method="post" action="auth.php">

        <label for="email">Email :</label>
        <input type="email" name="email"><br/>
       
        <label for="password">Password :</label>
        <input type="password" name="password"><br/>
        

        <input type="submit" name="resetPassword" value="login">
    
    </form>

    <h1>Logout</h1>
    <hr/>
    <form method="post" action="auth.php">

        <input type="submit" name="logout" value="login">
    
    </form>
</body>
</html>