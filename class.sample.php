<?php


class Person 
{
    public $name;
    public $age;

    // default public
    public function breathe()
    {
        echo $this->name . " is breathing.";
    }

}   

$person = new Person();
$person->name = "Inanc";
$person->age = 29;

dd($person->breathe());