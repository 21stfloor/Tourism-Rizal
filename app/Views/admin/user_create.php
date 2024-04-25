<?php
$isNewRecord = !isset($record); // Check if the record is new

// Determine the submit button text
$submitButtonText = $isNewRecord ? 'Create' : 'Update';
if (!$isNewRecord) {
    // Populate the form fields with the fetched data
    $id = $record['id'];
    $name = $record['name'];
    $email = $record['email'];
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
            echo 'Create New Admin User';
        else
            echo 'Update Admin User';
        ?>
    </title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .password-wrapper {
            position: relative;
        }
        .reveal-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php $index = 0; ?>
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
                            echo 'Create New Admin User';
                        else
                            echo 'Update Admin User';
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

                    <form id="form" action="<?= site_url('users/store'); ?>" method="post" autocomplete="off">
                        <input type="text" name="id" value="<?= $id ?? '' ?>" hidden />
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= $name ?? '' ?>" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= $email ?? '' ?>" autocomplete="off"
                                required>
                                <input type="email" name="previousEmail" value="<?= $email ?? '' ?>" hidden/>
                        </div>
                        <div class="form-group password-wrapper">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" autocomplete="off" minlength="8" <?php if ($isNewRecord){ echo 'required';}?>>
                            <span class="reveal-btn" onclick="togglePassword(this)" data-id="password">Show</span>
                        </div>

                        <div class="form-group password-wrapper">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" autocomplete="off" minlength="8" <?php if ($isNewRecord){ echo 'required';}?>>
                            <span class="reveal-btn" onclick="togglePassword(this)" data-id="confirmPassword">Show</span>
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
        function togglePassword(elem) {
            var passwordInput = document.getElementById($(elem).data('id'));
            var revealBtn = $(elem);
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                revealBtn.text("Hide");
            } else {
                passwordInput.type = "password";
                revealBtn.text("Show");
            }
        }

        document.getElementById("form").addEventListener("submit", function(event) {
            var password1 = document.getElementById("password").value;
            var password2 = document.getElementById("confirmPassword").value;
            
            if (password1 !== password2) {
                alert("Passwords do not match");
                event.preventDefault(); // Prevent the form from being submitted
            }
        });
    </script>
</body>

</html>