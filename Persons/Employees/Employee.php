<?php

namespace Persons\Employees;

use Persons\Person;

abstract class Employee extends Person{
    protected string $job;
    public function __construct($name,$age,$addless,$job){
        parent::__construct($name,$age,$addless);
        $this->job = $job;
    }
}