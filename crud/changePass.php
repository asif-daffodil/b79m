<?php
include_once("./header.php");
if (isset($_POST['reg123'])) {
    $crrEmail = $_SESSION['user']['email'];

    $old_password = safeThat($_POST['old_password']);
    $new_password = safeThat($_POST['new_password']);
    $confirm_password = safeThat($_POST['confirm_password']);

    $checkOldPass = $conn->query("SELECT * FROM `users` WHERE `email` = '$crrEmail'");
    if ($checkOldPass->num_rows !== 1 || !password_verify($old_password, $checkOldPass->fetch_object()->pass)) {
        $errOldPass = "Incorrect old password";
    }

    if (empty($new_password)) {
        $errNewPass = "Please enter your new password";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,}$/', $new_password)) {
        $errNewPass = "Please provide a strong password";
    }

    if (empty($confirm_password)) {
        $errConfirmPass = "Please confirm your new password";
    } elseif ($new_password !== $confirm_password) {
        $errConfirmPass = "Passwords do not match";
    }

    if (isset($errOldPass) || isset($errNewPass) || isset($errConfirmPass)) {
        echo "<script>toastr.warning('Please check the data accordingly!')</script>";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $updateQuery = $conn->query("UPDATE `users` SET `pass` = '$hashed_password' WHERE `email` = '$crrEmail'");

        if (!$updateQuery) {
            echo "<script>toastr.warning('Database problem!')</script>";
        } else {
            echo "<script>toastr.success('Password changes successfully!')</script>";
        }
    }
}


?>
<div class="row">
    <div class="col-md-5 m-auto my-3 border rounded shadow p-5">
        <h3 class="mb-3">Sign-in Form</h3>
        <form action="" method="post">
            <div class="mb-3 form-floating">
                <input type="password" class="form-control <?= isset($errPass) ? "is-invalid" : null ?>" name="old_password" placeholder="Enter your old password" value="<?= $old_password ?? null ?>">
                <label>Old Password</label>
                <div class="invalid-feedback">
                    <?= $errPass ?? null ?>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control <?= isset($errNewPass) ? "is-invalid" : null ?>" name="new_password" placeholder="Enter your new password" value="<?= $new_password ?? null ?>">
                <label>New Password</label>
                <div class="invalid-feedback">
                    <?= $errNewPass ?? null ?>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control <?= isset($errConfirmPass) ? "is-invalid" : null ?>" name="confirm_password" placeholder="Confirm your new password" value="<?= $confirm_password ?? null ?>">
                <label>Confirm New Password</label>
                <div class="invalid-feedback">
                    <?= $errConfirmPass ?? null ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="reg123">Submit</button>
        </form>
    </div>
</div>
<?php
include_once("./footer.php");
?>