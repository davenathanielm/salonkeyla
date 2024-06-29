<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?>
<style>
    .card {
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 30px;
        background-color: rgba(255, 255, 244, 0.8);
    }

    .col-lg-7 {
        padding-top: 4%;
    }

    .mb-3 {
        margin-top: 10px;
    }

    .btn {
        margin-top: 10px;
        background-color: #0f102c;
        border-radius: 40px;
        width: 40%;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-left: 30%;
        margin-right: 50%;
        color: white;
    }

    .btn-1:hover {
        background-color: white;
        color: #0f102c;
    }


    .form-control {
        border-radius: 15px;
        background-color: white;

    }

    .form-control {
        border-radius: 15px;
        background-color: white;

    }

    .inputEmail {
        opacity: 0.5;
    }

    .card-header {
        background-color: transparent;
    }

    .card-footer {
        background-color: transparent;
    }

    .register {
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        padding-top: 20px;
        text-shadow: 2px 2px 8px #b11ae9;
        padding-bottom: 10px;
        font-size: 40px;
    }

    .small a {
        color: cyan;
    }

    .small a:hover {
        color: #0f102c;
    }

    .small {
        color: whitesmoke;
    }
</style>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="border-0 rounded-lg mt-5">
                    <h3 class="text-center font-weight-bold register text-white">Create Account</h3>
                    <div class="card-body card shadow-lg ">
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif; ?>

                        <form action="/login/save" method="post">
                            <?= csrf_field() ?>
                            <br>
                            <div class="form-floating mb-3">
                                <input class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" placeholder="Email" value="<?= old('email') ?>" />
                                <label for="inputEmail">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="Username" value="<?= old('username') ?>" />
                                <label for="inputUsername">Username</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Password" autocomplete="off" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Repeat Password" autocomplete="off" />
                                        <label for="inputPasswordConfirm">Repeat Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-sm btn-1">Register</button>
                                </div>
                            </div>
                        </form>
                        <br>    
                    </div>
                </div>
                <div class="text-center py-3">
                    <div class="small">
                        <p>Have an account? Go to   <a href="/login">    login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>