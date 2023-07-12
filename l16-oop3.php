<?php
interface message
{
    public function revMsg(): string;
}


abstract class mobile implements message
{
    protected static string $name;
    protected static string $msg;
    public function __construct($name, $msg)
    {
        mobile::$name = $name;
        mobile::$msg = $msg;
    }
    abstract public function mobileRev(): string;
}

trait breakTrait
{
    public function revMsg(): string
    {
        return mobile::$msg;
    }
    public function mobileRev(): string
    {
        return mobile::$name . " " . $this->revMsg() . "<br>";
    }
}

class samsungMobile extends mobile
{
    use breakTrait;
}

$samObj = new samsungMobile("Samsung", "is a best android mobile");
echo $samObj->mobileRev();

class iPhone extends mobile
{
    use breakTrait;
}

$objIphone = new iPhone("iPhone", "is the best mobile");
echo $objIphone->mobileRev();
