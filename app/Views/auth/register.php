<?= $this->extend('auth/auth-layouts/auth-layout.php') ?>

<?= $this->section('content') ?>

<main id="main">

  <!-- Register Section -->
  <section id="auth" class="auth">
    <div class="container">

      <div class="wrapper mx-auto">
        <div class="row">
          <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-2 d-flex flex-column justify-content-center px-4">
            <h1 class="text-center">Register</h1>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('/register/process') ?>" method="post" role="form" class="auth-form"
              enctype="multipart/form-data">
              <?= csrf_field(); ?>
              <div class="row">
                <div class="form-group mb-3">
                  <label for="name">Full Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="<?= old('name'); ?>">
                  <!-- Error -->
                  <?php if ($validation->getError('name')) { ?>
                  <small class="text-danger">
                    <?= $error = $validation->getError('name'); ?>
                  </small>
                  <?php } ?>
                </div>
                <div class="form-group mb-3">
                  <label for="email">E-mail</label>
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
                  <?php } ?>
                </div>
                <div class="form-group mb-3">
                  <label for="password-confirm">Confirm Password</label>
                  <input type="password" class="form-control" name="password-confirm" id="password-confirm"
                    value="<?= old('password-confirm'); ?>">
                  <?php if ($validation->getError('password-confirm')) { ?>
                  <small class="text-danger">
                    <?= $error = $validation->getError('password-confirm'); ?>
                  </small>
                  <?php } ?>
                </div>
                <div class="form-group mb-3">
                  <label for="profile_picture">Profile Picture</label>
                  <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                  <?php if ($validation->getError('profile_picture')) { ?>
                  <small class="text-danger">
                    <?= $error = $validation->getError('profile_picture'); ?>
                  </small>
                  <?php } ?>
                </div>
              </div>
              <div class=" text-center"><button type="submit">Register</button>
              </div>
            </form>
            <span class="mt-3 text-center">Already have account? <a href="<?= base_url('login') ?>">Back to
                Login</a></span>
          </div>
          <div class="col-lg-6 order-1 order-lg-1 auth-img">
            <img src="<?= base_url('assets/img/features-2.png') ?>" class="img-fluid" alt="Auth Image">
          </div>
        </div>
      </div>

    </div>
  </section>

</main>

<?= $this->endSection() ?>