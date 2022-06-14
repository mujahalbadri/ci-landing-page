<?= $this->extend('auth/auth-layouts/auth-layout.php') ?>

<?= $this->section('content') ?>

<main id="main">

  <!-- Forgot Password Section -->
  <section id="auth" class="auth">
    <div class="container">

      <div class="wrapper mx-auto">
        <div class="row">
          <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-2 d-flex flex-column justify-content-center px-4">
            <h1 class="text-center">Forgot Password</h1>
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <h5>Forgot Password Failed</h5>
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
            <form action="<?= base_url('/forgot-password/process') ?>" method="post" role="form" class="auth-form"
              enctype="multipart/form-data">
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
              </div>
              <div class=" text-center"><button type="submit">Forgot Password
                </button>
              </div>
            </form>
            <span class="mt-3 text-center"><a href="<?= base_url('login') ?>">Back to
                Login</a></span>
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