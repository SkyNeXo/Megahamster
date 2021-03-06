<?php

namespace FIS\Megahamster\Living;

abstract class Room implements \JsonSerializable
{

    private $price = 0;
    private $name = 0;
    private $special_equipment = [];

    public function __construct(float $price, string $name, array $special_equipment)
    {
        $this->price = $price;
        $this->name = $name;
        $this->special_equipment = $special_equipment;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return String
     */
    public function printSpecialEquipment()
    {
        if (!empty($this->special_equipment)) {

            $r = "";
            foreach ($this->special_equipment as $se) {
                $r .= "- " . $se . "<br>";
            }
            return $r;
        }
        return "None";
    }

    /**
     * @return array
     */
    public function getSpecialEquipment(): array
    {
        return $this->special_equipment;
    }



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        $rv['name'] = $this->getName();
        $rv['price'] = $this->getPrice();
        $rv['special_equipment'] = $this->getSpecialEquipment();
        return $rv;
    }

    public abstract function calcArea();

    public abstract function toHTML();

}