<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image manipulation</title>
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
                <h1>Image manipulation</h1>
                <hr>
                <?php if(session()->getFlashdata('msg')) { ?>
                    <div class="alert alert-danger" >
                        <?= session()->getFlashdata('msg'); ?>
                    </div>
                 <?php } ?>
                <form  method = "post" enctype="multipart/form-data" >
                
                    <div class="mb-3">
                        <label for="exampleFormControlFile" class="form-label">Upload File</label>
                        <input class="form-control" multiple name="theFile[]" type="file" id = "exampleFormControlFile" >
                    </div>
                    
                    <button type='submit' class='btn btn-primary'>Submit</button>
                </form>

                <?php if (isset($image)) :?>
                    <div class="row">
                    <div class="col-md-4 mt-4">
<h4>Original</h4>
                            <img src="<?= src($image)?>" class='img-fluid'>
                    </div>
                    <?php foreach ($folders as $folder) :?>
                        <div class="col-md-4 mt-4">
                        <h4><?= ucfirst($folder) ?></h4>
                            <img src="<?= src($image,$folder)?>" class='img-fluid'>
                        </div>
                     <?php endforeach ;?> 
                    </div>

                <?php endif ;?>
                <hr>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>