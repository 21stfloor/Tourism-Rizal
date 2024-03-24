<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Food Tourism</title>
        <?php include(APPPATH . 'Views/partials/header.php'); ?>
    </head>
    <body>
        <?php $index=2; ?>
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
                <div class="container-fluid">
                    <h1 class="mt-4"> Food Tourism Management </h1>
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
                    <a href="<?= site_url('food-tourism/create'); ?>" class="btn btn-success mb-3">Add New Food Tourism</a>
                    <table id="table" class="w-100 table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date Posted</th>
                            <th>Visible</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($foods as $food): ?>
                            <tr>
                                <td><?= $food['id']; ?></td>
                                <td><?= $food['name']; ?></td>
                                <td><?= $food['created_at']; ?></td>
                                <td><?= $food['visible']; ?></td>
                                <td>
                                    <button class="btn btn-primary edit-button" data-id="<?= $food['id'] ?>">Edit</button>
                                    <button class="btn btn-danger delete-button" data-id="<?= $food['id'] ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <?php include(APPPATH . 'Views/partials/scripts.php'); ?>
        <script>
            $(document).ready(function () {
                const table = $('#table').DataTable();

                $(document).on('click', '.edit-button', function () {
                    var id = $(this).data('id');
                    window.location.href = '<?= site_url('food-tourism/edit') ?>/' + id;
                });

                table.on('click', '.delete-button', function () {
                    var id = $(this).data('id');
                    bootbox.confirm({
                        message: "Are you sure you want to delete this record?",
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
                                    url: '<?= site_url('food-tourism/delete') ?>/' + id,
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