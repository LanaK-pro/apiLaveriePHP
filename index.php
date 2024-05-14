<?php
require_once("vendor/autoload.php");

use Src\Manager\DatabaseManager;

$pdo = new DatabaseManager();

dump($pdo);


