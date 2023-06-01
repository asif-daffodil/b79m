<?php

if (isset($_POST["lbtn"])) {
    $yname = $_POST["yname"];
    $ymail = $_POST["ymail"];
    $ygndr = $_POST["gndr"] ?? null;


    if (empty($yname)) {
        $errname = "<span>Please Write Your Name </span>";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $yname)) {
        $errname = "<span style='color:red'>Invalid name format</span>";
    } else {
        $crrname = $yname;
    }
    if (empty($ymail)) {
        $erremail = "<span>Please Write Your Email </span>";
    } elseif (!filter_var($ymail, FILTER_VALIDATE_EMAIL)) {
        $erremail = "<span style='color:red'>Invalid Email Adress</span>";
    } else {
        $crremail = $ymail;
    }
    if (empty($ygndr)) {
        $errgndr = "<span>Please Select Your Gender </span>";
    } else {
        $crrgndr = $ygndr;
    }
}

?>

<form action="" method="post">
    <input type="text" placeholder="Your Name" name="yname"> <?= $errname ?? null ?>
    <br><br>
    <input type="text" placeholder="Your Email" name="ymail"> <?= $erremail ?? null ?>
    <br><br>
    Gender :
    <input type="radio" name="gndr" value="Male">Male
    <input type="radio" name="gndr" value="Female">Female
    <input type="radio" name="gndr" value="Other">Other
    <?= $errgndr ?? null ?>
    <br><br>
    <button type="submit" name="lbtn">Log in</button>
</form>