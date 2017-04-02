<?php
require "php/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $cont = $_POST["content"];

    // Insufficient parameters
    if (!isset($name) or !isset($cont)) return;

    // DB
    $pdo = get_connect();
    $sql = "INSERT INTO chat
        (name, content) VALUES (:name, :content)";
    $smt = $pdo->prepare($sql);
    $params = array (
        ':name' => $name,
        ':content' => $cont,
    );
    $smt->execute($params);

    header("Location: http://localhost/web_test/");

} else {
    echo "アホ";
}

?>