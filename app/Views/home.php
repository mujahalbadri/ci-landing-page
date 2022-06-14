<?= $this->extend('layouts/page-layout.php') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <div>
          <?php if (session('logged_in') == true) : ?>
          <h1>Hello <?= $user->name ?></h1>
          <?php endif; ?>
          <h1>Grow your business <br> with WireFrame</h1>
          <h2>We are team of talented designers making websites with Bootstrap</h2>
          <?php if (session('logged_in') == true) : ?>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
          <?php else :  ?>
          <a href="<?= base_url('register') ?>" class="btn-get-started">Sign Up Now</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="<?= base_url('assets/img/hero-img.png') ?>" class="img-fluid" alt="Hero Image">
      </div>
    </div>
  </div>
</section>

<main id="main">

  <!-- About Section -->
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6" data-aos="zoom-in">
          <img src="<?= base_url('assets/img/about.jpg') ?>" class="img-fluid" alt="About">
        </div>
        <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
          <div class="content pt-4 pt-lg-0">
            <h3>About us</h3>
            <p class="fst-italic">
              We're on a mission to take more market share for our clients using our 15+ years combined experience.
              Along the way, we've learned some lessons.
            </p>
            <p>
              You see, as well as working agency, we've thrived in successful start-ups and led growth designer teams.
            </p>
            <p>
              Innovation, empathy and pragmatism help us outperform your competition and meet your stretch targets.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="features">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                <h4>Created with the latest technologies</h4>
                <p>We use the latest technologies and tools in order to create a better code that not only works great,
                  but it is easy easy to work with too.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                <h4>Built by developers for developers</h4>
                <p>You don't only need a theme, but also great tools in order to ease the process or building and
                  customizing. And this is exactly what we offer you.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                <h4>
                  Built for awesomeness</h4>
                <p>We use the latest technologies and tools in order to create a better code that not only works great,
                  but it is easy easy to work with too.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                <h4>Made for great first impressions</h4>
                <p>is lighter and faster than most of the themes out there which means you get more for less. Check out
                  the components and examples pages.</p>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <figure>
                <img src="<?= base_url('assets/img/features-1.png') ?>" alt="" class="img-fluid">
              </figure>
            </div>
            <div class="tab-pane" id="tab-2">
              <figure>
                <img src="<?= base_url('assets/img/features-2.png') ?>" alt="" class="img-fluid">
              </figure>
            </div>
            <div class="tab-pane" id="tab-3">
              <figure>
                <img src="<?= base_url('assets/img/features-3.png') ?>" alt="" class="img-fluid">
              </figure>
            </div>
            <div class="tab-pane" id="tab-4">
              <figure>
                <img src="<?= base_url('assets/img/features-4.png') ?>" alt="" class="img-fluid">
              </figure>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="services section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <p>We have the liberty to choose any of the page layouts and components from the package and create your own
          version.</p>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box icon-box-pink">
            <div class="icon"><i class="bx bxs-window-alt"></i></div>
            <h4 class="title">Landing Pages</h4>
            <p class="description">Impress with these beautiful landing pages.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box icon-box-cyan">
            <div class="icon"><i class="bx bx-credit-card"></i></div>
            <h4 class="title">Account Pages</h4>
            <p class="description">Profile and account managemend made cool.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box icon-box-green">
            <div class="icon"><i class="bx bxs-key"></i></div>
            <h4 class="title">Authentication</h4>
            <p class="description">Provide users good looking forms that inspire trust.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box icon-box-blue">
            <div class="icon"><i class="bx bx-cart-alt"></i></div>
            <h4 class="title">Shop Pages</h4>
            <p class="description">Complete front-end flow for e-commerce website.</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>Show the client potentiality by this awesome project build with Bootstrap 5.</p>
      </div>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="<?= base_url('assets/img/portfolio/portfolio-web-1.png') ?>" class="img-fluid" alt="Portfolio">
            <div class="portfolio-info">
              <h4>Web 1</h4>
              <p>Toko Spant</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="<?= base_url('assets/img/portfolio/portfolio-web-2.png') ?>" class="img-fluid" alt="Portfolio">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>React Movies</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="<?= base_url('assets/img/portfolio/portfolio-web-3.png') ?>" class="img-fluid" alt="Portfolio">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Market Pos</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="<?= base_url('assets/img/portfolio/portfolio-web-4.png') ?>" class="img-fluid" alt="Portfolio">
            <div class="portfolio-info">
              <h4>Web 4</h4>
              <p>My Zoo</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="<?= base_url('assets/img/portfolio/portfolio-web-5.png') ?>" class="img-fluid" alt="Portfolio">
            <div class="portfolio-info">
              <h4>Web 5</h4>
              <p>GameBox</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="<?= base_url('assets/img/portfolio/portfolio-web-6.png') ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 6</h4>
              <p>Premier League</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

</main>

<?= $this->endSection() ?>