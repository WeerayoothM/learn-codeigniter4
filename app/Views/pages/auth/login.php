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
        <?php if(isset($validation)) : ?>
            <div class='text-danger'>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif ;?>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Login</h1>
                <hr>
                <?php if(session()->getFlashdata('msg')) { ?>
                    <div class="alert alert-danger" >
                        <?= session()->getFlashdata('msg'); ?>
                    </div>
                 <?php } ?>
                <form  method = 'post' >
                    <div class="mb-3">
                        <label for="inputemail" class='form-label'>Email</label>

                        <input type="text" name = 'email' class='form-control' id='inputforemail'
                         value ="<?= set_value('email') ;?>">
                         <!-- use set_value to kepp data after refresh -->
                    </div>
                    <div class="mb-3">
                        <label for="inputpassword" class='form-label'>Password</label>
                        <input type="password" name = 'password' 
                        value ="<?= set_value('password') ;?>"
                        class='form-control' id='inputforpassword' >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="category">Options</label>
                        </div>
                        <select name='category' class="custom-select " id="inputGroupSelect01">
                            <option value=""></option>
                            <?php foreach($categories as $cat) :?>
                                <option <?= set_select('category',$cat ) ?> value="<?= $cat ?>" ><?= $cat ?></option>
                            <?php endforeach ;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class='form-label'>Date</label>
                        <input type="date" name = 'date' 
                        value ="<?= set_value('date') ;?>"
                        class='form-control' id='inputfordate' >
                    </div>
                    <?php
                        echo '<pre>';
                        print_r($_POST);
                        echo '<pre>';
                    ?>
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