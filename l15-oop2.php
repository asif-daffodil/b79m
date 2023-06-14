<?php
class dipti
{
    private static string $address = "Daffodil Tower";
    public int $age = 20;
    private const name = "Daffodil International Professional Training Institute";
    public static string | null $uName = "Daffodil Insernational University";

    /* public function __destruct()
    {
        echo dipti::$uName;
    } */

    private function __construct()
    {
        return;
    }

    public static function aws(): string
    {
        return "Amazon Web Service - at " . dipti::$address . " at " . dipti::name;
    }
}

/* $dObj = new dipti;
echo $dObj->aws(); */
echo dipti::$uName . "<br>" . dipti::aws();
