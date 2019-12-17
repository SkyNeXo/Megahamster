<?php

// require "Room.php";

namespace FIS\Megahamster\Living;

class RectangularRoom extends Room implements \JsonSerializable
{

    private $length = 0;
    private $width = 0;
    private $area = 0;

    function __construct(string $name, float $price, float $length, float $width, array $special_equipment)
    {
        parent::__construct($price, $name, $special_equipment);
        $this->length = $length;
        $this->width = $width;
        $this->area = $this->calcArea();
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @return string
     */
    public function toHTML(): string
    {
        return
            "<tr>
        <td>{$this->getName()}</td>
        <td>{$this->getPrice()} €</td>
        <td>{$this->calcArea()} cm²</td>
        <td>{$this->getLength()} cm</td>
        <td>{$this->getWidth()} cm</td>
        <td>/</td>
        <td>{$this->printSpecialEquipment()}</td>
    </tr>";
    }

    /**
     * @return float
     */
    public function calcArea(): float
    {
        return $this->width * $this->length;
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
        return $this->getName() . ', ' . $this->getPrice() . '€, ' . $this->calcArea() . 'cm², ' . $this->getLength() . 'cm, ' . $this->getWidth() . 'cm ';
    }

    public function jsonSerialize()
    {
        $rv = parent::jsonSerialize();
        $rv['length'] = $this->getLength();
        $rv['width'] = $this->getWidth();
        $rv['area'] = $this->calcArea();
        return $rv;
    }
}

//Testzwecke
//$room = new RectangularRoom("Toller Raum", 20, 40, 10, ["viele coole dinge"]);
//echo $room;