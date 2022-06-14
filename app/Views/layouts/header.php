<!-- Header -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">

    <div class="logo me-auto">
      <h1><a href="<?= base_url('/') ?>">WireFrame</a></h1>
    </div>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li>
          <a href="#hero" class="nav-link scrollto active">Home</a>
        </li>
        <li>
          <a href="#about" class="nav-link scrollto">About</a>
        </li>
        <li>
          <a href="#services" class="nav-link scrollto">Services</a>
        </li>
        <li>
          <a href="#portfolio" class="nav-link scrollto">Portfolio</a>
        </li>

        <?php if (session('logged_in') == true) : ?>

        <li class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img
              src="<?= session()->get("profile_picture") == null ? base_url("assets/img/no-profile.png") : base_url('uploads/profile_picture/' . $user->profile_picture);   ?>"
              class="rounded-circle avatar" alt="">
            <?= $user->name; ?> </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a></li>
            <li> <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
            </li>
          </ul>
        </li>

        <?php else :  ?>

        <li>
          <a href="<?= base_url('login') ?>" class="nav-link btn-sign-in mt-2 mt-lg-0">Sign In</a>
        </li>

        <?php endif; ?>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>