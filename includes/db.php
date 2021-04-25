<?php
    define('DBNAME','Store');
    define('DBUSER','root');
    define('DBPASS','');

    try {
        $conn = new pdo('mysql:host=localhost;dbname='.DBNAME,DBUSER,DBPASS);


        #set verbose error modes
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    } catch (PDOException $e) {
        echo $e->getmessage();
    }


?>