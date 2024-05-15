<?php
require_once("vendor/autoload.php");

use Src\Entity\Service;
use Src\Manager\DatabaseManager;
use Src\Manager\ServiceManager;



//$databaseManager = new DatabaseManager();
//$pdo = $databaseManager->getConnection();

//$query = $pdo->prepare("SELECT * FROM Service");

//$query->execute([]);

//$services = $query->fetchAll();

//Prendre un tableau le transformé en object

//$serviceObjects = [];
/** @/var Service $service */
//foreach ($services as $service) {
    //$serviceObjects[] = new Service($service["service_id"], $service["service_name"], $service["service_price"]);
//}


//foreach ($serviceObjects as $service) {
  //  echo($service->getServiceName() . " " . $service->getServicePrice() . "euros");
//}

//dump($services, $serviceObjects);


//Instanciation de mon ServiceManager
$serviceManager = new ServiceManager();

$services = $serviceManager->findById(1);


//Renseigne le format du Body pour la reponse
header("Content-type: application/json");


echo (json_encode($services));


