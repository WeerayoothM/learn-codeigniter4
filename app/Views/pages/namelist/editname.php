<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>

    <style>
        .error {
            display:block;
            padding-top:5px;
            font-size: 14px;
            color:red
        }
    </style>
</head>
<body>
    <div class='container mt-4'>
        <h1>CodeIgniter CRUD Update page</h1>
        <hr>

        <div class="mt-3">
            <form id ="update-form" action="<?= site_url('/update');?>" method = 'post' name ='update_user'>
                <input type="hidden" name='id' id='id' value='<?= $user_obj['id']; ?>'>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name='name' class = 'form-control' value='<?= $user_obj['name']; ?>'>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name='email' class = 'form-control' value='<?= $user_obj['email']; ?>'>
                </div>
                <div class="form-group">
                    <input type="submit" class = 'btn btn-primary mt-2' value = 'Update Data'>
                </div>

            </form>
            
        </div>
    </div>

    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            if ($('#update-form').length > 0){
                $('#update-form').validate({
                    rules:{
                        name:{
                            required:true
                        },
                        email:{
                            required:true,
                            maxlength:60,
                            email:true,
                        }
                    },
                    messages:{
                        name:{
                            required:'Name is required.'
                        },
                        email:{
                            required:'Email is required.',
                            email:'It does not seem to be a Valid email.',
                            max_ength:'The email should be equal to 60 chars.'
                        }
                    }
                })

            }
        })
    </script>
</body>
</html>