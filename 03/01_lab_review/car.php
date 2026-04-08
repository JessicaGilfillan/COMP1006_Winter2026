<?php

class Car
{

    // these are the properties, public makes them accessible outside of the class 
    public string $make;
    public string $model;
    public int $year;

    public function __construct(string $make, string $model, int $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    //method 
    public function getCar(): string
    {
        return "Make : {$this->make} | Model : {$this->model} | Year: {$this->year}";
    }
}

//create a new car object 
$car = new Car("Honda", "Civic", 2010); 

echo $car->getCar(); 

