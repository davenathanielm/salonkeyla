 <?= $this->extend('auth/template') ?>

 <?= $this->section('content') ?>
 <style>
     /* Card ini untuk card-body */
     .card {
         padding-top: 50px;
         padding-left: 30px;
         padding-right: 30px;
         border-radius: 30px;
         /* background-color: #0f172a; */
         box-shadow: 10px 10px 18px rgba(0, 0, 0, 0.1);
         background-color: rgba(255, 255, 244, 0.8);
         /* padding : 30px,30px,0px,30px; */
         /* rgba untuk gradasi warna     */
     }

     .col-lg-5 {
         padding-top: 6%;

     }

     .mb-3 {
         margin-top: 10px;
     }

     .btn {
         margin-top: 40px;
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
         margin-top: 40px;
         background-color: whitesmoke;
         border-radius: 40px;
         width: 40%;
         padding-top: 10px;
         margin-left: 30%;
         margin-right: 50%;
         opacity: 1;
         color: #0f102c;
     }


     .form-control {
         border-radius: 15px;
         background-color: white;
         background-color: rgba(255, 255, 244, 0.4);
         margin-top: 5px;

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

     .login {
         font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
         padding-top: 60px;
         padding-bottom: 10px;
         text-shadow: 2px 2px 8px #b11ae9;
     }

     .small a {
         color: purple;
     }

     .small a:hover {
         color: #0f102c;
     }

     .small {
         color: whitesmoke;
     }

     .card-body {
         padding-top: 10px;
     }
 </style>
 <main>
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-5">

                 <div class="border-0 rounded-lg mt-5">
                     <h1 class="text-center font-weight-bold login text-white">Keyla Yong </h3>
                         <!-- card-shadow-lg untuk nambahin border di luar -->
                         <div class="card-body card shadow-lg">
                             <?php if (isset($validation)) : ?>
                                 <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                             <?php endif; ?>
                             <form action="/login/auth" method="post">
                                 <?= csrf_field() ?>
                                 <br>
                                 <div class="form-floating mb-3">
                                     <input class="form-control   <?php if (session('msg')) : ?>is_invalid<?php endif ?>" name="email" placeholder="Email atau Username" type="text" style="background-color: white;" />
                                     <label for="inputEmail">Email atau Username</label>
                                     <div class="invalid-feedback">
                                         <?= session('msg') ?>
                                     </div>
                                 </div>

                                 <div class="form-floating mb-3">
                                     <input class="form-control  <?php if (session('msg')) : ?>is_invalid<?php endif ?>" name="password" type="password" placeholder="Password" style="background-color: white;" />
                                     <label for="inputPassword">Password</label>
                                     <div class="invalid-feedback">
                                         <?= session('msg') ?>
                                     </div>
                                     <div class="d-grid gap-2">

                                     </div>
                                     <div class=" d-grid">
                                         <button type="submit" class="btn btn-sm btn-1">Log in</button>
                                     </div>
                             </form>
                         </div>
                 </div>
                 <div class="text-center py-3">
                     <div class="small">
                         <p>Dont Have Account?<a href="login/register"> Register Account</a></p>
                     </div>
                 </div>
             </div>
         </div>
 </main>
 <?= $this->endSection() ?>