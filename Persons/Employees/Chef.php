<?php

namespace Persons\Employees;

use FoodItems\FoodItem;

class Chef extends Employee{
    public function __construct($name,$age,$addless){
        parent::__construct($name,$age,$addless,"Chef");
    }
    public function cooking(FoodItem $food):void{
        echo "". $this->name ." is cooking " . $food->getName() . ".\n";
    }
}