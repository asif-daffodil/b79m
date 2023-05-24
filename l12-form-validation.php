<?php

$countries = ["", "Bangladesh", "India", "Pakistan", "USA", "Rusia", "Others"];

if (isset($_POST['lbtn'])) {
    $yname = $_POST['yname'];
    $yemail = $_POST['yemail'];
    $gndr = $_POST['gndr'] ?? null;
    $skill = $_POST['skill'] ?? null;
    $ycountry = $_POST['ycountry'];

    if (empty($yname)) {
        $errName = "<span style='color:red'>please write your name</span>";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $yname)) {
        $errName = "<span style='color:red'>Invalid name format</span>";
    } else {
        $crrYname = $yname;
    }

    if (empty($yemail)) {
        $errEmail = "<span style='color:red'>please write your email</span>";
    } elseif (!filter_var($yemail, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "<span style='color:red'>Invalid email address</span>";
    } else {
        $crrYemail = $yemail;
    }

    if (empty($gndr)) {
        $errGndr = "<span style='color:red'>please select your gender</span>";
    } else {
        $crrGndr = $gndr;
    }

    if (empty($skill)) {
        $errSkill = "<span style='color:red'>please select your skills</span>";
    } else {
        $crrSkill = $skill;
    }

    if (empty($ycountry)) {
        $errYcountry = "<span style='color:red'>please select your ocuntry</span>";
    } else {
        $crrYcountry = $ycountry;
    }

    if (isset($crrYname) && isset($crrYemail) && isset($crrGndr) && isset($crrSkill) && isset($crrYcountry)) {
        $skills = implode(", ", $crrSkill);
        $msg = "
            <div style='color: green'>You Name: $crrYname</div>
            <div style='color: green'>You Email: $crrYemail</div>
            <div style='color: green'>You Gender: $crrGndr</div>
            <div style='color: green'>You Skills: $skills</div>
            <div style='color: green'>You Country: $crrYcountry</div>
        ";
        $yname = $yemail = $gndr = $skill = $ycountry = null;
    }
}
?>

<form action="" method="post">
    <input type="text" placeholder="Your Name" name="yname" value="<?= $yname ?? null ?>">
    <?= $errName ?? null ?>
    <br><br>
    <input type="text" placeholder="Your Email" name="yemail" value="<?= $yemail ?? null ?>">
    <?= $errEmail ?? null ?>
    <br><br>
    Gender :
    <input type="radio" name="gndr" value="Male" <?= isset($gndr) && $gndr == "Male" ? "checked" : null ?>>Male
    <input type="radio" name="gndr" value="Female" <?= isset($gndr) && $gndr == "Female" ? "checked" : null ?>>Female
    <?= $errGndr ?? null ?>
    <br><br>
    Skills:
    <input type="checkbox" value="HTML" name="skill[]" <?= isset($skill) && in_array("HTML", $skill) ?  "checked" : null ?>>HTML
    <input type="checkbox" value="CSS" name="skill[]" <?= isset($skill) && in_array("CSS", $skill) ?  "checked" : null ?>>CSS
    <input type="checkbox" value="Bootstrap" name="skill[]" <?= isset($skill) && in_array("Bootstrap", $skill) ?  "checked" : null ?>>Bootstrap
    <input type="checkbox" value="JS" name="skill[]" <?= isset($skill) && in_array("JS", $skill) ?  "checked" : null ?>>JS
    <input type="checkbox" value="jQuery" name="skill[]" <?= isset($skill) && in_array("jQuery", $skill) ?  "checked" : null ?>>jQuery
    <input type="checkbox" value="React" name="skill[]" <?= isset($skill) && in_array("React", $skill) ?  "checked" : null ?>>React
    <?= $errSkill ?? null ?>
    <br><br>
    <select name="ycountry">
        <?php foreach ($countries as $country) { ?>
            <option value="<?= $country ?>" <?= isset($ycountry) && $ycountry == $country ? "selected" : null ?>><?= empty($country) ? "--Select Country--" : $country ?></option>
        <?php } ?>
    </select>
    <?= $errYcountry ?? null ?>
    <br><br>
    <button type=" submit" name="lbtn">Log in</button>
</form>

<?= $msg ?? null; ?>