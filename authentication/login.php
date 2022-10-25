<?php
include './../koneksi.php';
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password =  $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if ($query) {
        $fetch = mysqli_fetch_assoc($query);
        if ($fetch['password'] == $password) {
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['hak_akses'] = $fetch['hak_akses'];
            $_SESSION['username'] = $fetch['username'];
            header("Location:./../index.php?menu=dashboard");
        } else {
            echo "<script>
            alert('login gagal')
            </script>";
        }
    } else {
        echo "<script>
        alert('login gagal')
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login </title>
    <link rel="stylesheet" href="./../css/styles.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-white">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-5 ">
                    <div class="row justify-content-center ">
                        <div class="col-lg-5">
                            <div class="rounded" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header">
                                        <h5 class="text-center font-weight-light my-4 ">
                                            Bengkel Mobil LBS Auto Service
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" id="inputEmail" type="text" placeholder="name@example.com" required />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button type="submit" name="submit" class="btn btn-primary" style="width: 200px;"> Sing in</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- <script src="js/scripts.js"></script> -->
    <script src="./../js/scripts.js"></script>
</body>

</html>