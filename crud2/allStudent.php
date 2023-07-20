<?php
$conn = mysqli_connect("localhost", "root", "", "student79");
$select = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Action</td>
        </tr>
        <?php while ($data = $select->fetch_object()) { ?>
            <tr>
                <td><?= $data->id ?></td>
                <td><?= $data->name ?></td>
                <td>
                    <a href="./updatestudent.php?id=<?= $data->id ?>">Update</a>
                    <a href="./delete.php?id=<?= $data->id ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>