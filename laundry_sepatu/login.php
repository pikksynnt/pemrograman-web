<?php
session_start();
include 'config/koneksi.php';

if(isset($_SESSION['login'])){
    header("Location: admin/dashboard.php");
    exit;
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM admin 
        WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $_SESSION['login'] = true;
        header("Location: admin/dashboard.php");
        exit;
    }else{
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#0f172a; min-height:100vh;">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-4">

            <div class="text-center text-white mb-4">
                <h2 class="fw-bold">Laundry Sepatu</h2>
                <p class="text-secondary">Login admin untuk mengelola transaksi</p>
            </div>

            <div class="card border-0 rounded-4 shadow">
                <div class="card-body p-4">

                    <h5 class="mb-3">Masuk ke Dashboard</h5>

                    <?php if(isset($error)){ ?>
                        <div class="alert alert-danger">
                            <?= $error; ?>
                        </div>
                    <?php } ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" name="login" class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>
            </div>

            <p class="text-center text-secondary mt-3">
                Project Pemrograman Web 2
            </p>

        </div>

    </div>
</div>

</body>
</html>