<?php

require "Database.php";
$config = require("config.php");
$db = new Database($config["database"]);

$childs = $db->query("SELECT * FROM gifts")->fetchAll();

echo "<ol>";
foreach ($childs as $child) {
    echo "<li>";
    echo $child['name'], " ";
    echo $child['count_available'], " ";
    echo "</li>";
}
echo "</ol>";