<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4 ">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Login</h1>
                <hr>
                <?php if(session()->getFlashdata('msg')) { ?>
                    <div class="alert alert-danger" >
                        <?= session()->getFlashdata('msg'); ?>
                    </div>
                 <?php } ?>
                <form action="/login/auth" methos = 'post' >
                    <div class="mb-3">
                        <label for="inputemail" class='form-label'>Email</label>
                        <input type="email" name = 'email' class='form-control' id='inputforemail' value ="<?= set_value('email') ;?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputpassword" class='form-label'>Password</label>
                        <input type="password" name = 'password' class='form-control' id='inputforpassword' >
                    </div>
                    <button type='submit' class='btn btn-primary'>Login</button>
                </form>
                <hr>
                <a href='/register' class='btn btn-primary'>Register</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>