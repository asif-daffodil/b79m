<?php
function greetings($g = "Assalamuwalaikum", $p = "Vai", $m = "Mr.")
{
    if ($m == "Mr.") {
        echo "$g $p (Gender: Male)";
        echo "<br>";
    } elseif ($m == "Miss") {
        echo "$g $p (Gender: Female)";
        echo "<br>";
    } elseif ($m == "Mrs.") {
        echo "$g $p (Gender: Female)";
        echo "<br>";
    } else {
        echo "$g $p (Gender: Tiktoker)";
        echo "<br>";
    }
}

greetings("Hi", "Brother", "Mr.");
greetings("Hello", "Sister", "Miss");
greetings();
greetings("Oyastagfilrullah");
greetings(p: "bon", m: "Mrs.");
greetings(p: "beyain", g: "Hi", m: "ha ha");

function namta($n, $l)
{
    for ($i = 1; $i <= $l; $i++) {
        echo "$n x $i = " . ($n * $i) . "<br>";
    }
}

namta(369, 10);

//return
function course($age = 18)
{
    if ($age >= 18) {
        return "Welcome to our course.<br>";
    }
    return "Sorry you are not allowed to our course.<br>";
}

echo course(13);

echo gettype([1, 2]) . "<br>";

function f2c($d)
{
    if (gettype($d) !== "integer") {
        return "Please provide a number<br>";
    }
    return (($d - 32) * 5 / 9) . "<br>";
}

echo f2c("ha ha ha");
echo f2c(104);

// function will take 3 peram
// day / hour / min
// function wil find the second

function t2s($d = null, $h = null, $m = null)
{
    if (empty($d) || empty($h) || empty($m)) {
        return "Please provide all the information";
    } else {
        if (gettype($d) !== "integer" || gettype($h) !== "integer" || gettype($m) !== "integer") {
            return "Please dont provide invalid data";
        }
    }

    $d2s = $d * 86400;
    $h2s = $h * 3600;
    $m2s = $m * 60;
    return $tSec = $d2s + $h2s + $m2s;
}

echo t2s(2, 5, 7);
