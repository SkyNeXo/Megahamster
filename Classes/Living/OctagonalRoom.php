<?php

namespace FIS\Megahamster\Living;

class OctagonalRoom extends Room implements \JsonSerializable
{
    private $side = 0;
    private $area = 0;

    function __construct(string $name, float $price, float $side, array $special_equipment)
    {
        parent::__construct($price, $name, $special_equipment);
        $this->side = $side;
        $this->area = $this->calcArea();
    }


    /**
     * @return float
     */
    public function getSide(): float
    {
        return $this->side;
    }

    public function toHTML(): string
    {
        return
    "<tr>
        <td>{$this->getName()}</td>
        <td>{$this->getPrice()} €</td>
        <td>{$this->calcArea()} cm²</td>
        <td>/</td>
        <td>/</td>
        <td>{$this->getSide()} cm</td>
        <td>{$this->printSpecialEquipment()}</td>
    </tr>";
    }


    public function calcArea(): float
    {
        return round(pow($this->side, 2) * (2 + 2 * sqrt(2)), 2);
    }

    /**
     * @return float|int
     */
    public function getArea()
    {
        return $this->area;
    }



    //Testzwecke
    function __toString()
    {
        return $this->getName() . ' ' . $this->getPrice() . '$ ' . $this->calcArea() . 'cm²';
    }

    public function jsonSerialize()
    {
        $rv = parent::jsonSerialize();
        $rv['side'] = $this->getSide();
        $rv['area'] = $this->calcArea();
        return $rv;
    }
}