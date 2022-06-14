<?= $this->extend('auth/auth-layouts/auth-layout.php') ?>

<?= $this->section('content') ?>

<main id="main">

  <!-- Login Section -->
  <section id="auth" class="auth">
    <div class="container">

      <div class="wrapper mx-auto">
        <div class="row">
          <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-2 d-flex flex-column justify-content-center px-4">
            <h1 class="text-center">Login</h1>
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <h5>Login Failed</h5>
              </hr />
              <?= session()->getFlashdata('message'); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('success'); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('/login/process') ?>" method="post" role="form" class="auth-form">
              <?= csrf_field(); ?>
              <div class="row">
                <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" value="<?= old('email'); ?>">
                  <?php if ($validation->getError('email')) { ?>
                  <small class="text-danger">
                    <?= $error = $validation->getError('email'); ?>
                  </small>
                  <?php } ?>
                </div>
                <div class="form-group mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password"
                    value="<?= old('password'); ?>">
                  <?php if ($validation->getError('password')) { ?>
                  <small class="text-danger">
                    <?= $error = $validation->getError('password'); ?>
                  </small>
                  <br>
                  <?php } ?>
                  <a href="<?= base_url('forgot-password') ?>">Forgot Password?</a>
                </div>
              </div>
              <div class="text-center"><button type="submit">Login</button></div>
            </form>
            <span class="mt-3 text-center">Not a member? <a href="<?= base_url('register') ?>">Sign Up Now</a></span>
          </div>
          <div class="col-lg-6 order-1 order-lg-1 auth-img mb-lg-4">
            <img src="<?= base_url('assets/img/features-2.png') ?>" class="img-fluid" alt="Auth Image">
          </div>
        </div>
      </div>

    </div>
  </section>

</main>

<?= $this->endSection() ?>