<?php
$conn = mysqli_connect("localhost", "root", "", "student79");
if (isset($_POST['addStudent'])) {
    $sname = $_POST['sname'];
    if (!empty($sname)) {
        $insert = $conn->query("INSERT INTO `users` (`name`) VALUES ('$sname')");
        if (!$insert) {
            echo "Something went wrong";
        } else {
            echo "Student added successfully";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" placeholder="Student Name" name="sname">
        <input type="submit" name="addStudent">
    </form>
</body>

</html>