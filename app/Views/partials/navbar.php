<nav class="navbar navbar-expand-lg bg-body-tertiary p-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">
      <img src="<?= base_url('images/logo-removebg-preview.png') ?>" alt="logo" width="80" height="75">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if (isset($index) && $index == 0)
            echo 'active'; ?>" href="<?= site_url('/home'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (isset($index) && $index == 1)
            echo 'active'; ?>" href="<?= site_url('/attractions'); ?>">Attractions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (isset($index) && $index == 2)
            echo 'active'; ?>" href="<?= site_url('/food'); ?>">Food</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (isset($index) && $index == 3)
            echo 'active'; ?>" href="<?= site_url('/aboutus'); ?>">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('views/signin'); ?>" target="_blank">Log In</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="<?= site_url('search/results') ?>" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="query" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>