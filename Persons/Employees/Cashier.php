<?php

namespace Persons\Employees;

use FoodItems\FoodItem;
use Invoices\Invoice;

class Cashier extends Employee{
    public function __construct(){
        parent::__construct("Cashier",-1,"Restaurant","Cashier");
    }

    public function foodOrder(array $foodItems):array{
        foreach($foodItems as $foodItem){
            if(!$foodItem instanceof FoodItem){
                throw new \InvalidArgumentException("All elements must be instances of FoodItem");
            }
        }
        return $foodItems;
    }

    public function makeInvoice(array $foodItems, array $restaurantItems):Invoice{
        return new Invoice($foodItems, $restaurantItems);
    }
}