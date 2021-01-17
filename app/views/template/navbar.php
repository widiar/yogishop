
<body>


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?= BASEURL ?>">Yogi SHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= BASEURL ?>">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Keranjang</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
            Profile
          </a>
          <div class="dropdown-menu">
            <?php if(isset($_SESSION['user'])) : ?>
              <a class="dropdown-item" href="<?= BASEURL ?>auth/logout">LogOut</a>
            <?php else : ?>
              <a class="dropdown-item" href="<?= BASEURL ?>auth/login">Login</a>
            <?php endif; ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>