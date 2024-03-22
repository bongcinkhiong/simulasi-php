<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .aw{
        display: flex;
        align-items: center;
        min-height: 90vh;
    }
</style>

<body>
    <div class="row mt-5 d-flex justify-content-center align-items-center aw">
        <div class="card" style="padding:25px; width: 20rem;">
            <h4>Register your account</h4>
            <form action="process.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" name="username" id="username" class="form-control" id="floatingInput" placeholder="Masukkan Username">
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" id="floatingInput" placeholder="Masukkan Username">
                    <label for="nama_lengkap">nama lengkap</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" class="form-control" id="floatingInput" placeholder="Masukkan Password">
                    <label for="floatingInput">password</label>
                </div>
                <span>Sudah Punya Akun</span>? <a style="color:black;" href="../login/index.php">Login</a><br>

                <button class="form-control btn btn-dark" type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
</body>

</html>