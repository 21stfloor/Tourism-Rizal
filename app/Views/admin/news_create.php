<?php
$isNewRecord = !isset($record); // Check if the record is new

// Determine the submit button text
$submitButtonText = $isNewRecord ? 'Create' : 'Update';
$isVisible = 'checked';
if (!$isNewRecord) {
    // Populate the form fields with the fetched data
    $id = $record['id'];
    $name = $record['name'];
    $description = $record['description'];
    $visible = $record['visible'];
    $isVisible = $visible == 1 ? "checked" : "";
    // ... (populate other fields)
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php
        if ($isNewRecord)
            echo 'Create News article';
        else
            echo 'Update News article';
        ?>
    </title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php $index = 3; ?>
    <div class="d-flex" id="wrapper">
        <?php include(APPPATH . 'Views/partials/sidebar.php'); ?>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <div class="container mt-4">
                    <h2>
                        <?php
                        if ($isNewRecord)
                            echo 'Create News Article';
                        else
                            echo 'Update News Article';
                        ?>
                    </h2>

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

                    <form action="<?= site_url('news/store'); ?>" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $id ?? '' ?>" hidden />
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= $name ?? '' ?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description"
                                class="form-control summernote"><?= $description ?? '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $visible ?? 1 ?>"
                                id="flexCheckChecked" name="visible" <?= $isVisible ?> />
                            <label class="form-check-label" for="flexCheckChecked">
                                Visible
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <?= $submitButtonText ?>
                        </button>
                    </form>
                </div>



            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"
        integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/scripts.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
        });

        $('input[type="checkbox"]').change(function () {
            this.value = this.checked ? 1 : 0;
        });
    </script>
</body>

</html>