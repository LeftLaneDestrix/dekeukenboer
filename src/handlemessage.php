<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// je mist hier een bestand
require '../vendor/autoload.php';

// Check if name, email and message are given
if ( ! empty($_POST['name']) && ! empty($_POST['email']) && ! empty($_POST['message'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // TODO: Check if e-mail is valid by using laminas-validator package: https://packagist.org/packages/laminas/laminas-validator

    // When email is valid, add the message to table messages (you can find the sql in keukenboer.sql)

    $mysqli = new mysqli('mysql', 'root', 'root', 'keukenboer');
//    $mysqli = new mysqli('keukenboer.mysql.database.azure.com', 'keukenboer', 'jhu*ka!QQ23', 'keukenboer');
    $sql = "INSERT INTO message(name, email, message) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    if ($stmt->execute()){
        echo "Dank voor uw bericht";

    }

}

header("Refresh:6; url=index.php");

