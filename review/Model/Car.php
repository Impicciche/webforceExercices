<?php
declare(strict_types=1);

namespace Model;

class Car
{
    public const COLOR_WHITE = 'white';
    public const COLOR_RED = 'red';
    public const COLOR_BLACK = 'black';
    public const COLOR_SILVER = 'silver';

    public $brand;
    public $color;
    protected $previousOwner;
    private $locked = true;


    public function __construct(string $previousOwner = null)
    {
        $this->setPreviousOwner($previousOwner);
        echo 'Hello Matthieu';
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $newBrand): Car
    {
        $this->brand = $newBrand;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     * @return Car
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPreviousOwner()
    {
        return $this->previousOwner;
    }

    /**
     * @param mixed $previousOwner
     * @return Car
     */
    public function setPreviousOwner($previousOwner)
    {
        $this->previousOwner = $previousOwner;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->locked;
    }

    /**
     * @param bool $locked
     * @return Car
     */
    public function setLocked(bool $locked): Car
    {
        $this->locked = $locked;
        return $this;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }


}

$volvo = new Car();
$volvoBrand = $volvo->getBrand();

$volvo->setBrand('volvo')
    ->setColor(Car::COLOR_BLACK)
    ->setLocked(false)
    ->setPreviousOwner('Yurii');

