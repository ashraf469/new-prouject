<?php
try {
    $conect = new PDO('mysql:host=localhost;dbname=new_app','root','');

}
catch(PDOException $e){
    echo "you are not connect " . $e->getMessage();
}
?>