<?= $this->extend('layout/template') ?>

<!-- masukin dia ke content -->
<?= $this->section('content') ?>

<style>
    .card {
        box-shadow: 5px 10px 20px #888888;
        border-radius: 10px;
    }

    .batal:hover {
        background-color: white;
        color: red;
    }

    .simpan:hover {
        background-color: white;
        color: blue;
    }
</style>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">DATA USERS</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <form action="<?= base_url('users/create') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3 row">
                        <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('firstname') ? 'is-invalid'
                                                                        : '' ?>" id="firstname" name="firstname" value="<?= old('firstname') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('firstname') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('lastname') ? 'is-invalid'
                                                                        : '' ?>" id="lastname" name="lastname" value="<?= old('lastname') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('lastname') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid'
                                                                        : '' ?>" id="username" name="username" value="<?= old('username') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('username') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('email') ? 'is-invalid'
                                                                        : '' ?>" id="email" name="email" value="<?= old('email') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-4">
                            <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="inputPassword" type="password" placeholder="<?= lang('password') ?>" autocomplate="off" />
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-4">
                            <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="inputPassword" type="password" placeholder="<?= lang('repeat password') ?>" autocomplate="off" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="role">
                                <option value="karyawan">Karyawan</option>
                                <option value="admin">Admin</option>
                                <option value="owner">Owner</option>
                            </select>
                        </div>
                    </div>



                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">

                        <button class="btn batal btn-danger " type="reset">Cancel</button>
                        <button class="btn simpan btn-primary me-md-2 ml-3" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</main>
<?= $this->endSection() ?>