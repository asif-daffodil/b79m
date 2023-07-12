<?php
include_once("./header.php");
isset($_SESSION['user']) ? header("location: ./") : null;
if (isset($_POST['reg123'])) {
    $email = safeThat($_POST['email']);
    $password = safeThat($_POST['password']);

    if (empty($email)) {
        $errEmail = "Please provide your name";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email Address";
    } else {
        $crrEmail = $email;
    }

    if (empty($password)) {
        $errPass = "Please provide your name";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,}$/', $password)) {
        $errPass = "Please provide an strong password";
    } else {
        $crrPass = $conn->real_escape_string($password);
    }


    if (isset($crrEmail) && isset($crrPass)) {
        // $encPass = password_hash($crrCpass, PASSWORD_BCRYPT);
        $checkemail = $conn->query("SELECT * FROM `users` WHERE `email` = '$crrEmail'");
        if ($checkemail->num_rows !== 1) {
            echo "<script>toastr.warning('Email or password error!')</script>";
        } else {
            $uEmail = $checkemail->fetch_object();
            if (!password_verify($crrPass, $uEmail->pass)) {
                echo "<script>toastr.warning('Email or password error!')</script>";
            } else {
                $_SESSION['user'] = ["name" => $uEmail->name, "email" => $crrEmail];
                echo "<script>toastr.success('Login Successfull!');setTimeout(()=>location.reload(),2000)</script>";
            }
        }
    }
}
?>
<div class="row">
    <div class="col-md-5 m-auto my-3 border rounded shadow p-5">
        <h3 class="mb-3">Sign-in Form</h3>
        <form action="" method="post">
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
            <button type="submit" class="btn btn-primary" name="reg123">Submit</button>
        </form>
    </div>
</div>
<?php
include_once("./footer.php");
?>