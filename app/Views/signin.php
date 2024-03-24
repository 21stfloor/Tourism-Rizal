<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="/css/login.css" rel="stylesheet">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <title>Department Of Tourism of Tanay, Rizal</title>
    <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">
  </head>
  <body>

  <!--
  <div class ="container"> <img src="/images/tanayheader.jpg" alt="Tanay" width="1000" height="500"> </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                
            
                <h2>Login in</h2>
                
                
                <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Signin</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>-->
    <div class="wrapper">
                <?php if(session()->getFlashdata('msg')):?>
                                <div class="alert alert-warning">
                                  <?= session()->getFlashdata('msg') ?>
                                </div>
                <?php endif;?>
  <form class="login" action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
    <p class="title">Log in</p>
    
    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" name="password" placeholder="Password" class="form-control" />
    <i class="fa fa-key"></i>
    <a href="#">Forgot your password?</a>
    <button type="submit" class="btn btn-success">
      <i class="spinner"></i>
      <span class="state">Log in</span>
    </button>
  </form>
  <footer><a target="blank" href="https://www.facebook.com/tanaytourism">@Capstone 1.0</a></footer>
  </p>
</div>
<script>
var working = false;
$('.login').on('submit', function(e) {
  e.preventDefault();
  if (working) return;
  working = true;
  var $this = $(this),
    $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Authenticating');
  setTimeout(function() {
    $this.addClass('ok');
    $state.html('Welcome back!');
    setTimeout(function() {
      $state.html('Log in');
      $this.removeClass('ok loading');
      working = false;
    }, 4000);
  }, 3000);
});
</script>
  </body>
</html>