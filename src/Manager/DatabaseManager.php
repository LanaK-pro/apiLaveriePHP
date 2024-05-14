<?php

namespace Src\Manager;

use Exception;
use PDO;

class DatabaseManager
{

    public function __construct()
    {
        try {

            $host = "localhost";
            $databaseName = "Pressing_Laetitia_Bernard";
            $user = "root";
            $password = "root";


            $pdo = new PDO("mysql:host=" . $host . ";port=3306;dbname=" . $databaseName . ";charset=utf8", $user, $password);

            $this->configPdo($pdo);

            return $pdo;

        } catch (Exception $e) {

            //Lancer l'erreur
            //throw $e;

            echo("Tu fait n'importe quoi : " . $e->getMessage());

            exit();
        }
    }

    function configPdo(PDO $pdo): void
    {
        // Recevoir les erreurs PDO ( coté SQL )
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Choisir les indices dans les fetchs
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

}





