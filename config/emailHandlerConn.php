<?php

$host = $_ENV['DB_HOST'];
$db = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

return new PDO("mysql:host=$host;dbname=$db", "$user", "$pass");