<?php
class myClass
{
    public $myName = "Asif Abir";
    public $myAge = 37;
    protected $myWives = 1;


    public function mainSkill()
    {
        return "Web Developer";
    }

    public function totalWife()
    {
        return "Total wives of " . $this->myName . " is " . $this->myWives;
    }
}

$myObj = new myClass;
echo $myObj->myName . "<br>";
echo $myObj->mainSkill() . "<br>";
// echo $myObj->myWives . "<br>";
echo $myObj->totalWife() . "<br>";

class myChield extends myClass
{
    public function myChieldFunc()
    {
        return "My father name is " . $this->myName;
    }
}

$myChieldObj = new myChield;
echo $myChieldObj->myChieldFunc();

// make a private propertin on the main class
// call it through the object
// use it on any internal function
// use it on a chiled class
