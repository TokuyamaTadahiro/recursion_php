<?php

namespace Persons;

abstract class Person{
    protected string $name;
    protected int $age;
    protected string $addless;
    public function __construct(string $name, int $age, string $addless){
        $this->name = $name;
        $this->age = $age;
        $this->addless = $addless;
    }
}