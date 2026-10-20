<?php
class Vehicle {
    const TOYOTA = "Toyota";
    const YAMAHA = "Yamaha";
    const CAR = "Car";
    const MOTORCYCLE = "Motorcycle";
    const TRUCK = "Truck";
    const UNKNOWN = "Unknown";

    private int $numberOfWheels;
    private string $color;
    private string $brand;
    private string $model;

    public function __construct(int $numberOfWheels, string $color, string $brand, string $model) {
        $this->numberOfWheels = $numberOfWheels;
        $this->color = $color;
        $this->brand = $brand;
        $this->model = $model;
    }
    public function getNumberOfWheels(): int {
        return $this->numberOfWheels;
    }
    public function setNumberOfWheels(int $numberOfWheels): void {
        $this->numberOfWheels = $numberOfWheels;
    }
    public function getColor(): string {
        return $this->color;
    }
    public function setColor(string $color): void {
        $this->color = $color;
    }
    public function getBrand(): string {
        return $this->brand;
    }
    public function setBrand(string $brand): void {
        $this->brand = $brand;
    }
    public function getModel(): string {
        return $this->model;
    }
    public function setModel(string $model): void {
        $this->model = $model;
    }

    public function getDescription(): string {

        return $this->brand . " " . $this->model . ", " . $this->color . ", " . $this->numberOfWheels . " wheels";
    }

    public function type(): string {
        if ($this->numberOfWheels == 2) {
            return  self::MOTORCYCLE;
        } elseif ($this->numberOfWheels == 4) {
            return self::CAR;
        } elseif ($this->numberOfWheels > 4) {
            return self::TRUCK;
        } else {
            return self::UNKNOWN;
        }
    }
}

$vehicle1 = new Vehicle(4, "Red", Vehicle::TOYOTA, "Corolla");
$vehicle2 = new Vehicle(2, "Black", Vehicle::YAMAHA, "MT-07");
$vehicle3 = new Vehicle(6, "Blue", "Volvo", "FH16");
$vehicle4 = new Vehicle(0, "Green", "UFO", "X-2000");

echo $vehicle1->getDescription() . "<br>";
echo $vehicle1->type() . "<br>";

echo $vehicle2->getDescription() . "<br>";
echo $vehicle2->type() . "<br>";

echo $vehicle3->getDescription() . "<br>";
echo $vehicle3->type() . "<br>";

echo $vehicle4->getDescription() . "<br>";
echo $vehicle4->type() . "<br>";
