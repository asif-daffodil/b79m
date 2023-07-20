<?php
$conn = mysqli_connect("localhost", "root", "", "student79");
$id = $_GET["id"] ?? header("location: ./index.php");
$preData = $conn->query("SELECT * FROM users WHERE id = $id");
$preData->num_rows != 1 && header("location: ./index.php");
$pd = $preData->fetch_object();
if (isset($_POST['upStudent'])) {
    $sname = $_POST['sname'];
    if (!empty($sname)) {
        $update = $conn->query("UPDATE users SET name = '$sname' WHERE id = $id");
        if (!$update) {
            echo "Something went wrong";
        } else {
            echo "Student updated successfully";
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
        <input type="text" placeholder="Student Name" name="sname" value="<?= $pd->name ?>">
        <input type="submit" name="upStudent">
    </form>
    <br><br>
    <a href="./allStudent.php">
        <button>Back</button>
    </a>
</body>

</html>