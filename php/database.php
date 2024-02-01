<?php

    define('HOST', 'mysql-snowstorm.alwaysdata.net');
    define('DB_NAME', 'snowstorm_bdd');
    define('USER', 'snowstorm_admin');
    define('PASS', 'ftrdtructyctr56418974!');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*echo "Connect > ok !";*/
        return true;
    } catch(PDOException $e){
        echo $e;
    }
