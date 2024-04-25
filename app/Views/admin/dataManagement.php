
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin accounts</title>
        <!-- Favicon-->
        <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
        
    </head>
    <body>
        <?php $index=0; ?>
        <div class="d-flex" id="wrapper">
            <?php include(APPPATH . 'Views/partials/sidebar.php'); ?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4"> Admin accounts </h1>
                    <?php if (session()->has('messages')) : ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <ul>
                                <?php foreach (session('messages') as $messages) : ?>
                                    <li><?= $messages ?></li>
                                <?php endforeach ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Validation errors:</strong>
                            <ul>
                                <?php foreach (session('errors') as $error): ?>
                                    <li>
                                        <?= $error ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <a href="<?= site_url('users/create'); ?>" class="btn btn-success mb-3">Add New Admin User</a>
                    <table id="table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['created_at']; ?></td>
                                    <td>
                                        <button class="btn btn-primary edit-button" data-id="<?= $user['id'] ?>">Edit</button>
                                        <button class="btn btn-danger delete-button" data-id="<?= $user['id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- Core theme JS-->
        <?php include(APPPATH . 'Views/partials/scripts.php'); ?>
        <script>
            $(document).ready(function () {
                const table = $('#table').DataTable();

                $(document).on('click', '.edit-button', function () {
                    var id = $(this).data('id');
                    window.location.href = '<?= site_url('users/edit') ?>/' + id;
                });

                table.on('click', '.delete-button', function () {
                    var id = $(this).data('id');
                    bootbox.confirm({
                        message: "Are you sure you want to delete this user?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-danger'
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-secondary'
                            }
                        },
                        callback: function (result) {
                            if (result) {
                                // User confirmed, perform AJAX delete request
                                $.ajax({
                                    url: '<?= site_url('users/delete') ?>/' + id,
                                    method: 'POST',
                                    success: function (response) {
                                        // Handle success, such as refreshing the table
                                        location.reload();
                                    },
                                    error: function (xhr, status, error) {
                                        // Handle error
                                        console.error(error);
                                    }
                                });
                            }
                        }
                    });
                });
            });

            
        </script>
    </body>
</html>