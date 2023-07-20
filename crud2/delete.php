<?php
$conn = mysqli_connect("localhost", "root", "", "student79");
$id = $_GET["id"];
$delete = $conn->query("DELETE FROM users WHERE id = $id");
if ($delete) {
    echo "Data deleted successfulli";
}
?>
<a href="./allStudent.php"><button>Back</button></a>