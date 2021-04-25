<?php


function displayerrors($e,$f){
  if(array_key_exists($f,$e)){
    echo '<p>'.$e[$f].'</p>';
  }
}

function registeruser($dbconn){
      //insert data into the database
      $stmt = $dbconn->prepare("INSERT into Customer(first_name,last_name,email,username,password) VALUES(:fn,:ln,:e,:un,:p)");

      // encrypt password

      $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

      // bind parameters
      $data = [
          ":fn" => $_POST['firstname'],
          "ln" => $_POST['lastname'],
          "e" => $_POST['email'],
          "un" => $_POST['username'],
          "p" => $hash
      ];

      $stmt->execute($data);

      $n = $_POST['firstname'];
      header("location: succes.php?name=$n");
}

function loginuser($dbconn){

    $stmt = $dbconn->prepare("SELECT * from Customer WHERE email=:e");
        $data = [
            ":e" => $_POST['email']
        ];

        $stmt->execute($data);

        # If we dont get one single result
        # Throw an error message
        # var_dump($stmt->rowCount()); exit();
        if($stmt->rowCount() != 1) {
            $msg = "either your username or password is incorrect";
            return header("location: login.php?m=$msg");
        } 

        # Fetch the record from the database
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($_POST['password'],$record['password']) == false) {
            $msg = "password is incorrect";
            return header("location: login.php?m=$msg");
        }

        # Create an identity for the user in the session
        $_SESSION['customer_id'] = $record['Id'];
        $_SESSION['firstname'] = $record['first_name'];

        
        # Take the user to the dashboard
        header("location: dashboard.php");
}

function showcustomers($dbconn) {
    
    $stmt= $dbconn->prepare("SELECT * FROM Customer");

    $stmt->execute();

    # Keep Fetching a single record till there is none left  
    while($record = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo ' <tr>
                <td>'.$record['Id'].'</td>
                <td>'.$record['first_name'].'</td>
                <td>'.$record['last_name'].'</td>
                <td>'.$record['username'].'</td>
                <td>'.$record['email'].'</td>
            </tr>';

    }

}

?>