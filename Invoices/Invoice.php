<?php

namespace Invoices;

use FoodItems\FoodItem;

class Invoice{
    public int $invoice_id;
    public string $data;
    public array $order_data = [];

    private array $restaurantItems = [];
    public function __construct(array $order_data,array $restaurantItems){
        $this->invoice_id = $this->generateInvoiceId();
        $this->data = $this->getData();
        $this->order_data = $order_data;
        $this->restaurantItems = $restaurantItems;
    }

    private function generateInvoiceId():int{
        return rand(1,9999);
    }

    private function getData():string{
        return date("D M d, Y G:i");
    }

    public function printInvoice(){
        echo "Invoice ID is " . $this->invoice_id . "\n";
        echo "". $this->data ."\n";
        echo "合計金額は￥" . $this->calTotalPrice() . "です。\n";
    }

    private function calTotalPrice():int{
        $totalPrice = 0;
        #print_r($this->order_data);
        foreach($this->order_data as $index => $item){
            $totalPrice += $item->getPrice();
        }
        return $totalPrice;
    }
}