<?php
date_default_timezone_set("Asia/Dhaka");
echo date("m-d-y h:i:s a") . "<br>";
echo date("M-d-Y D H:i:s A") . "<br>";
echo date("F/d/Y l") . "<br>";

// mktime h m s m d y
$myTime = mktime(0, 0, 0, 4, 2, 2004);
echo date("F/d/Y l", $myTime) . "<br>";

//strtotime
$s2t1 = strtotime("next friday");
echo date("F/d/Y l", $s2t1) . "<br>";

$s2t2 = strtotime("+3 years +2 month + 17 days");
echo date("F/d/Y l", $s2t2) . "<br>";

$startDate = strtotime("next friday");
$endDate = strtotime("+6 weeks", $startDate);
while ($startDate <= $endDate) {
    echo date("F/d/Y l", $startDate) . "<br>";
    $startDate = strtotime("+1 week", $startDate);
}
