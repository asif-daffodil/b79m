<?php

/**
 * string
 * int
 * float
 * null
 * boolean
 * array
 * object
 * resource
 */

var_dump("Hello World");
echo "<br>";
var_dump(123);
echo "<br>";
var_dump(123.45);
echo "<br>";
var_dump(null);
echo "<br>";
var_dump(true);
echo "<br>";
var_dump(["Dhaka", "Rajshahi", "Khulna"]);
echo "<br>";

class nadim
{
    public $city = "Narshindi";
}

$obj = new nadim;
var_dump($obj);
