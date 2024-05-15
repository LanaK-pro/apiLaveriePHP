<?php

namespace Src\Entity;

use JsonSerializable;

/**
 * Service represente une occurence de la table Service sous forme d'objet PHP
 */

class Service implements JsonSerializable
{
    private int $service_id;
    private string $service_name;

    private float $service_price;

    public function __construct(int $service_id, string $service_name, float $service_price)
    {
        $this->service_id = $service_id;
        $this->service_name = $service_name;
        $this->service_price = $service_price;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->getServiceId(),
            "name" => $this->getServiceName(),
            "price" => $this->getServicePrice()
        ];
    }
    static public function fromArray($array):self{
        return new self($array["service_id"], $array["service_name"], $array["service_price"]);
    }


    public function getServiceId(): int
    {
        return $this->service_id;
    }

    public function setServiceId(int $service_id): void
    {
        $this->service_id = $service_id;
    }

    public function getServiceName(): string
    {
        return $this->service_name;
    }

    public function setServiceName(string $service_name): void
    {
        $this->service_name = $service_name;
    }

    public function getServicePrice(): float
    {
        return $this->service_price;
    }

    public function setServicePrice(float $service_price): void
    {
        $this->service_price = $service_price;
    }
}