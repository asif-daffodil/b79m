<?php
include_once("./header.php");
isset($_SESSION['user']) ? header("location: ./") : null;
if (isset($_POST['reg123'])) {
    $name = safeThat($_POST['name']);
    $email = safeThat($_POST['email']);
    $password = safeThat($_POST['password']);
    $cpassword = safeThat($_POST['confirm_password']);

    if (empty($name)) {
        $errName = "Please provide your name";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errName = "Invalid name";
    } else {
        $crrName = $conn->real_escape_string($name);
    }

    if (empty($email)) {
        $errEmail = "Please provide your name";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email Address";
    } else {
        $email = $conn->real_escape_string($email);
        $checkEmail = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
        if ($checkEmail->num_rows > 0) {
            $errEmail = "Email already exicts";
        } else {
            $crrEmail = $email;
        }
    }

    if (empty($password)) {
        $errPass = "Please provide your name";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,}$/', $password)) {
        $errPass = "Please provide an strong password";
    } else {
        $crrPass = $conn->real_escape_string($password);
    }

    if (empty($cpassword)) {
        $errCpass = "Please confirm your name";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,}$/', $cpassword)) {
        $errCpass = "Please provide an strong password";
    } elseif ($password !== $cpassword) {
        $errCpass = "Password didnot matched";
    } else {
        $crrCpass = $conn->real_escape_string($cpassword);
    }

    if (isset($crrName) && isset($crrEmail) && isset($crrPass) && isset($crrCpass)) {
        $encPass = password_hash($crrCpass, PASSWORD_BCRYPT);
        $insert = $conn->query("INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$crrName', '$crrEmail', '$encPass')");
        if (!$insert) {
            echo "<script>toastr.warning('Something went wrong!')</script>";
        } else {
            $_SESSION['user'] = ["name" => $crrName, "email" => $crrEmail];
            echo "<script>toastr.success('Sign up Completed');setTimeout(()=>location.reload(),2000)</script>";
        }
    }
}
?>
<div class="row">
    <div class="col-md-5 m-auto my-3 border rounded shadow p-5">
        <h3 class="mb-3">Sign-up Form</h3>
        <form action="" method="post">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control <?= isset($errName) ? "is-invalid" : null ?>" name="name" placeholder="Enter your name" value="<?= $name ?? null ?>">
                <label>Enter your name</label>
                <div class="invalid-feedback">
                    <?= $errName ?? null ?>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="email" class="form-control <?= isset($errEmail) ? "is-invalid" : null ?>" name="email" placeholder="Enter your email" value="<?= $email ?? null ?>">
                <label>Enter your email</label>
                <div class="invalid-feedback">
                    <?= $errEmail ?? null ?>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control <?= isset($errPass) ? "is-invalid" : null ?>" name="password" placeholder="Enter your password" value="<?= $password ?? null ?>">
                <label>Enter your password</label>
                <div class="invalid-feedback">
                    <?= $errPass ?? null ?>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control <?= isset($errCpass) ? "is-invalid" : null ?>" name="confirm_password" placeholder="Confirm your password" value="<?= $cpassword ?? null ?>">
                <label>Confirm your password</label>
                <div class="invalid-feedback">
                    <?= $errCpass ?? null ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="reg123">Submit</button>
        </form>
    </div>
</div>
<?php
include_once("./footer.php");
?>