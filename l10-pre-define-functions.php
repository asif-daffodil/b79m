<?php
$str = "This is a demo text";

echo strlen($str) . "<br>";
echo strrev($str) . "<br>";
echo strpos($str, "demo") . "<br>";
echo str_word_count($str) . "<br>";
echo substr($str, 0, 4) . "<br>";
echo substr($str, -9, 4) . "<br>";
echo str_replace("demo", "dangerous", $str) . "<br>";

$pName = "abdulla nadim";
echo ucfirst($pName) . "<br>";
echo strtoupper($pName) . "<br>";
echo ucwords($pName) . "<br>";

echo "<pre>";
print_r(explode(" ", $pName));
echo "</pre>";

$arr = ["Nadim", "is", "not", "a", "bad", "boy."];
echo implode(" ", $arr) . "<br>";

if (is_string("Dhaka")) {
    echo "Joy Bangla<br>";
} else {
    echo "Amar Bangladesh<br>";
}

echo is_int(123) . "<br>";

/**
 * $sentence = "We live in Bangladesh";
 * show it on php like this
 * We
 * Live
 * In
 * Bangladesh
 * explode -> loop -> ucfirst -> "<br>"
 */

$sentence = "We live in Bangladesh";
$sArr = explode(" ", $sentence);
for ($i = 0; $i < count($sArr); $i++) {
    echo ucfirst($sArr[$i]) . "<br>";
}
