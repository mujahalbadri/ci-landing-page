<?= $this->extend('auth/auth-layouts/auth-layout.php') ?>

<?= $this->section('content') ?>

<main id="main">

  <!-- Profile Section -->
  <section id="profile" class="profile">
    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="profile-info text-center py-5">
            <img
              src="<?= session()->get("profile_picture") == null ? base_url("assets/img/no-profile.png") : base_url('uploads/profile_picture/' . $user->profile_picture);   ?>"
              class="profile-img" alt="">
            <h1 class="my-2"><?= $user->name ?></h1>
            <h6><?= $user->email ?></h6>
            <span class="profile-date">Member since
              <?= date('d F Y', strtotime(str_replace('/', '-', $user->created_at)))  ?></span>
          </div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">

          <?php $validation = \Config\Services::validation(); ?>



          <div class="profile-edit-form px-5">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="edit-profile-tab" data-bs-toggle="tab"
                  data-bs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile"
                  aria-selected="true">Edit Profile</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="change-password-tab" data-bs-toggle="tab" data-bs-target="#change-password"
                  type="button" role="tab" aria-controls="change-password" aria-selected="false">Change
                  Password</button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="edit-profile" role="tabpanel"
                aria-labelledby="edit-profile-tab">

                <form action="<?= base_url('/profile/update') ?>" method="post" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <h1 class="text-center mt-5 mb-3">Edit Profile</h1>
                  <?php if (!empty(session()->getFlashdata('success'))) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php elseif (!empty(session()->getFlashdata('message'))) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php endif; ?>
                  <div class="form-group mb-3">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?= $user->email ?>"
                      disabled>
                    <?php if ($validation->getError('email')) { ?>
                    <small class="text-danger">
                      <?= $error = $validation->getError('email'); ?>
                    </small>
                    <?php } ?>
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $user->name ?>">
                    <!-- Error -->
                    <?php if ($validation->getError('name')) { ?>
                    <small class="text-danger">
                      <?= $error = $validation->getError('name'); ?>
                    </small>
                    <?php } ?>
                  </div>
                  <div class="form-group mb-5">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                    <?php if ($validation->getError('profile_picture')) { ?>
                    <small class="text-danger">
                      <?= $error = $validation->getError('profile_picture'); ?>
                    </small>
                    <?php } ?>
                  </div>
                  <div class=" text-center"><button type="submit">Save Changes</button>
                  </div>
                </form>

              </div>

              <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">

                <form action="<?= base_url('/profile/change-password') ?>" method="post" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <h1 class="text-center mt-5 mb-3">Change Password</h1>
                  <?php if (!empty(session()->getFlashdata('success'))) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php elseif (!empty(session()->getFlashdata('message'))) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php endif; ?>
                  <div class="form-group mb-3">
                    <label for="password">Current Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <?php if ($validation->getError('password')) { ?>
                    <small class="text-danger">
                      <?= $error = $validation->getError('password'); ?>
                    </small>
                    <?php } ?>
                  </div>
                  <div class="form-group mb-3">
                    <label for="new-password">New Password</label>
                    <input type="password" name="new-password" class="form-control" id="new-password">
                    <!-- Error -->
                    <?php if ($validation->getError('new-password')) { ?>
                    <small class=" text-danger">
                      <?= $error = $validation->getError('new-password'); ?>
                    </small>
                    <?php } ?>
                  </div>
                  <div class="form-group mb-5">
                    <label for="password-confirm">Confirm New Password</label>
                    <input type="password" name="password-confirm" class="form-control" id="password-confirm">
                    <!-- Error -->
                    <?php if ($validation->getError('password-confirm')) { ?>
                    <small class="text-danger">
                      <?= $error = $validation->getError('password-confirm'); ?>
                    </small>
                    <?php } ?>
                  </div>
                  <div class=" text-center"><button type="submit">Change Password</button>
                  </div>
                </form>

              </div>
            </div>

          </div>

        </div>

      </div>

      .
    </div>
  </section>

</main>

<?= $this->endSection() ?>