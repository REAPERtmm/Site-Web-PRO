<?php 
echo '<input type="hidden" id="data" value='. $_GET["data"] .'>';
echo '
    <form action="load_key_in_db.php" method="GET" id="form"> 
        <input type="hidden" name="IDCustom" value="'.$_GET["IDCustom"].'">
    </form>
'
?>

<?php 
echo "<script src='../script/extractKey.js'></script>";
?>