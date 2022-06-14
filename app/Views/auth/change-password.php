<?= $this->extend('auth/auth-layouts/auth-layout.php') ?>

<?= $this->section('content') ?>

<main id="main">

  <!-- Change Password Section -->
  <section id="auth" class="auth">
    <div class="container">

      <div class="wrapper mx-auto">
        <div class="row">
          <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-2 d-flex flex-column justify-content-center px-4">
            <h1 class="text-center">Change Password </h1>
            <h3 class="span text-center"><?= session()->get('reset_email'); ?></h3>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('/forgot-password/change-password/process') ?>" method="post" role="form"
              class="auth-form" enctype="multipart/form-data">
              <?= csrf_field(); ?>
              <div class="row">
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
              </div>
              <div class=" text-center"><button type="submit">Change Password
                </button>
              </div>
            </form>
          </div>
          <div class="col-lg-6 order-1 order-lg-1 mb-lg-4 auth-img">
            <img src="<?= base_url('assets/img/features-2.png') ?>" class="img-fluid" alt="Auth Image">
          </div>
        </div>
      </div>

    </div>
  </section>

</main>

<?= $this->endSection() ?>