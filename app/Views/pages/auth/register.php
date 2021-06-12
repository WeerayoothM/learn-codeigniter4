<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4 ">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Sign up</h1>
                <hr>
                <?php if(isset($validation)) { ?>
                    <div class="alert alert-danger" >
                        <?= $validation->listErrors(); ?>
                    </div>
                 <?php } ?>
                <form action="/register/save" methos = 'post' >
                    <div class="mb-3">
                        <label for="inputname" class='form-label'>Name</label>
                        <input type="text" name = 'name' class='form-control' id='inputforname' value ="<?= set_value('name') ;?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputemail" class='form-label'>Email</label>
                        <input type="email" name = 'email' class='form-control' id='inputforemail' value ="<?= set_value('email') ;?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputpassword" class='form-label'>Password</label>
                        <input type="password" name = 'password' class='form-control' id='inputforpassword' >
                    </div>
                    <div class="mb-3">
                        <label for="inputconfpassword" class='form-label'>Confirm Password</label>
                        <input type="password" name = 'confpassword' class='form-control' id='inputforconfpassword'>
                    </div>
                    <button type='submit' class='btn btn-primary'>Register</button>
                </form>
                <hr>
                <a href='/login' class='btn btn-primary'>Login Page</a>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>