<?php

namespace Src\Manager;

use Src\Entity\Service;

/**
 * ServiceManager representera un outil permettant de faire les requetes relatives a l'Entity Service
 */
class ServiceManager extends DatabaseManager
{
    public function findAll()
    {
        $query = $this->getConnection()->prepare("SELECT * FROM service");
        $query->execute([]);

        $results = $query->fetchAll();
        $services = [];

        foreach ($results as $result) {
            $services[] = Service::fromArray($result);
        }

        return $services;
    }

    public function findById(int $id)
    {

        $query = $this->getConnection()->prepare("SELECT * FROM Service WHERE service_id = :service_id");
        $query->execute([":service_id" => $id]);

        //Convertir le resultat de la requete en Objet
        return Service::fromArray($query->fetch());
    }

    public function add(Service $service): void
    {
        $query = $this->getConnection()->prepare("INSERT INTO Service (service_name, service_price) VALUES (:service_name, :service_price)");
        $query->execute([":service_name" => $service->getServiceName(), ":service_price" => $service->getServicePrice()]);
    }

    public function edit(Service $service): void
    {
        $query = $this->getConnection()->prepare("UPDATE Service SET service_name = :service_name, service_price = :service_price WHERE service_id = :service_id");
        $query->execute([":service_id" => $service->getServiceId(), ":service_name" => $service->getServiceName(), ":service_price" => $service->getServicePrice()]);
    }

    public function delete(int $id): void
    {
        $query = $this->getConnection()->prepare("DELETE FROM Service WHERE service_id = :service_id");
        $query->execute([":service_id" => $id]);
    }
}
