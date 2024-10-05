<?php

spl_autoload_register(function ($class) {
    $file = __DIR__ ."/". str_replace("\\","/",$class) . ".php";
    if (file_exists($file)) {
        require $file;
    }else{
        echo "" . $class ."not exists.\n";
    }
});

$cheeseBurger = new \FoodItems\CheeseBurger();
$teriyakiBurger = new \FoodItems\TeriyakiBurger();
$doubleCheeseBurger = new \FoodItems\DoubleCheeseBurger();
$bigBurger = new \FoodItems\BigBurger();

$interestTasteMap = [
    "CheeseBurger"=> 1,
    "TeriyakiBurger"=> 2,
    "DoubleCheeseBurger"=> 3,
    "BigBurger"=> 4,
];

$cash = new \Persons\Employees\Cashier();
$chef = new \Persons\Employees\Chef("Jhon","32", "Saitama");
$employees = [
    "Cashier"=>$cash,
    "Chef"=>$chef,
];

$foodItems = [
    "CheeseBurger"=>$cheeseBurger,
    "TeriyakiBurger"=>$teriyakiBurger,
    "DoubleCheeseBurger"=>$doubleCheeseBurger,
    "BigBurger"=>$bigBurger,
];
$mac = new \Restaurants\Restaurant("Mac",$foodItems,$employees);

$tom = new \Persons\Customers\Customer("Tom","16","Tokyo",$interestTasteMap);

$invoice = $tom->interestedCategories($mac);
$invoice->printInvoice();