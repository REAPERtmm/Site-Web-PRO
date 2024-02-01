
<?php
    include 'database.php';
    global $db;
                
    $q = $db->query("SELECT * FROM Users;");
    $q = $q->fetch();

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <?php
            print_r($q);
        ?>
    </body>
</html>
