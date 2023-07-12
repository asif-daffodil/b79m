<?php
include_once("./header.php");

if (isset($_POST['reg123'])) {
    $crrEmail = $_SESSION['user']['email'];

    $name = safeThat($_POST['name']);
    $email = safeThat($_POST['email']);

    // Validate name
    if (empty($name)) {
        $errName = "Please enter your name";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errName = "Invalid name";
    }

    // Validate email
    if (empty($email)) {
        $errEmail = "Please enter your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email address";
    } else {
        // Check if the new email already exists in the database
        $checkEmail = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
        if ($checkEmail->num_rows > 0 && $email !== $crrEmail) {
            $errEmail = "Email address is already in use";
        }
    }

    if (isset($errName) || isset($errEmail)) {
        echo "<script>toastr.warning('Please check the data accordingly!')</script>";
    } else {
        // Perform the database update query here
        $updateQuery = $conn->query("UPDATE `users` SET `name` = '$name', `email` = '$email' WHERE `email` = '$crrEmail'");

        if (!$updateQuery) {
            echo "<script>toastr.warning('Database problem!')</script>";
        } else {
            // Update the session variables with the new values
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            echo "<script>toastr.success('Name and email updated successfully!')</script>";
        }
    }
}

?>
<div class="row">
    <div class="col-md-5 m-auto my-3 border rounded shadow p-5">
        <h3 class="mb-3">Update Form</h3>
        <form action="" method="post">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control <?= isset($errName) ? "is-invalid" : null ?>" name="name" placeholder="Enter your name" value="<?= $_SESSION['user']['name'] ?? null ?>">
                <label>Name</label>
                <div class="invalid-feedback">
                    <?= $errName ?? null ?>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="email" class="form-control <?= isset($errEmail) ? "is-invalid" : null ?>" name="email" placeholder="Enter your email" value="<?= $_SESSION['user']['email'] ?? null ?>">
                <label>Email</label>
                <div class="invalid-feedback">
                    <?= $errEmail ?? null ?>
                </div>
            </div>


            <button type="submit" class="btn btn-primary" name="reg123">Submit</button>
        </form>
    </div>
</div>
<?php
include_once("./footer.php");
?>