<?php

namespace Src\Manager;

use Exception;
use PDO;

class DatabaseManager
{
    private PDO $connection;

    public function getConnection(): PDO
    {
        return $this->connection;
    }
    public function __construct()
    {
        try {

            $host = "localhost";
            $databaseName = "pressing";
            $user = "root";
            $password = "root";


            $this->connection = new PDO("mysql:host=" . $host . ";port=3306;dbname=" . $databaseName . ";charset=utf8", $user, $password);



        } catch (Exception $e) {

            //Lancer l'erreur
            //throw $e;

            echo("Tu fait n'importe quoi : " . $e->getMessage());

            exit();
        }
    }

    function configPdo(): void
    {
        // Recevoir les erreurs PDO ( coté SQL )
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Choisir les indices dans les fetchs
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

}





