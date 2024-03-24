<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Department Of Tourism of Tanay, Rizal</title>
    <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                button: "OK DONE!",
                });
                 <?php if(session()->getFlashdata('status')) {?>

                 <?php }?>
        });
    </script>
    
<li class="logo">
            <a href="/home" target="/home"><img src='images/logo-removebg-preview.png' width="80" height="75"></a>
                <!-- <a href="/home" target="/home" img src='images/logo-removebg-preview.png'> -->
                <!--<svg role="images/logo-removebg-preview.png" aria-label="Department Of Tourism of Tanay, Rizal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2100 500" height="44"><path fill="#dd4814" d="M10 10"/></svg> -->
                
            </li>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group` mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>