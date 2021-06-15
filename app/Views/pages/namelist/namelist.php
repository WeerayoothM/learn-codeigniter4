    <?= $this->extend('layouts/main'); ?>

    <?= $this->section('content') ;?>

    <div class='container mt-4'>
        <h1>CodeIgniter CRUD</h1>
        <hr>
        <div class='d-flex justify-content-end'> 
            <a href="<?= site_url('addname');?>" class = 'btn btn-primary'>Add a name &email</a>
        </div>

        <div class="mt-3">
            <table class='table table-bordered' id="users-list">
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users) :?>
                        <?php foreach ($users as $user) :?>
                            <tr>
                                <td><?= $user['id'] ;?></td>
                                <td><?= $user['name'] ;?></td>
                                <td><?= $user['email'] ;?></td>
                                <td>
                                    <a href="<?= base_url('editname/'.$user['id']) ;?>" class = 'btn btn-warning'>Edit</a>
                                    <a href="<?= base_url('delete/'.$user['id']) ;?>" class = 'btn btn-danger'>Delete</a>
                                </td>
                            </tr>

                        <?php endforeach ; ?>
                    <?php endif ; ?>
                </tbody> 
            </table>
        </div>
    </div>
    
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#users-list').DataTable();
        })
    </script>

<?= $this->endSection() ;?>