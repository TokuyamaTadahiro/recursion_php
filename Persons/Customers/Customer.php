<?php

namespace Persons\Customers;

use Invoices\Invoice;
use Restaurants\Restaurant;
use Persons\Person;

class Customer extends Person{
    public array $interstTasteFoods = [];
    public function __construct($name,$age,$addless,$foodItems){
        parent ::__construct($name,$age,$addless);
        $this->interstTasteFoods = $foodItems;
    }

    public function interestedCategories(Restaurant $restaurant):Invoice{
        echo "" . $this->name . " は";
        foreach($this->interstTasteFoods as $name => $value){
            echo "". $name ."を" . $value . "つ、";
        }
        echo "頼みました。\n";
        return $restaurant->order($this->interstTasteFoods);
    }
}