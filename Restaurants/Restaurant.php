<?php

namespace Restaurants;

use FoodItems\FoodItem;
use Invoices\Invoice;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;
use Persons\Employees\Employee;

class Restaurant{
    public string $name;
    public array $restaurantItems = [];
    public array $employees = [];

    public function __construct(string $name, array $foodItems, array $employees){
        $this->name = $name;

        foreach($foodItems as $key => $foodItem){
            if(!$foodItem instanceof FoodItem){
                throw new \InvalidArgumentException("All elements must be instances of FoodItem.\n");
            }
        }
        $this->restaurantItems = $foodItems;

        foreach($employees as $key => $employee){
            if(!$employee instanceof Employee){
                throw new \InvalidArgumentException("All elements must be instances of Employee.\n");
            }
        }
        $this->employees = $employees;
    }

    private function getChef(): Chef{
        foreach($this->employees as $employee){
            if($employee instanceof Chef){
                return $employee;
            }
        }
        return new Chef("臨時",33,"Tokyo");
    }

    private function getCashier(): Cashier{
        foreach($this->employees as $employee){
            if($employee instanceof Cashier){
                return $employee;
            }
        }
        return new Cashier();
    }

    public function takeMenus() : array{
        return $this->restaurantItems;
    }

    public function order(array $foodItemsMap) : Invoice{
        $finalOrder = [];
        foreach($foodItemsMap as $key => $value){
                for($i = 0; $i < $value; $i++){
                    $finalOrder[] = $this->restaurantItems[$key];
                }

        }

        $chef = $this->getChef();
        if(!isset($chef)){
            echo "Restaurant does not have a Chef.\n";
            return new Invoice(["Faild"],$this->restaurantItems);
        }
        
        foreach($finalOrder as $index => $foodItem){
            $chef->cooking($foodItem);
        }
        echo "Please enjoy.\n";

        $cashier = $this->getCashier();
        $invoice = $cashier->makeInvoice($finalOrder,$this->restaurantItems);
        return $invoice;
    }

    public function getFoodItemPrice(string $input_key) : int{
        foreach($this->restaurantItems as $key => $foodItem){
            if($key == $input_key){
                return $foodItem->price;
            }
        }
        return 0;
    }

}