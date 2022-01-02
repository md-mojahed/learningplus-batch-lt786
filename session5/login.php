<?php
require 'session.php';
require 'functions.php';
redirectIfAuthenticated();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/login.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <section class="vh-100" style="background-color: #508bfc;">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Sign in</h3>

                    <div class="form-outline mb-4">
                      <input type="email" id="email" class="form-control form-control-lg" />
                      <label class="form-label" for="typeEmailX-2">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="password" class="form-control form-control-lg" />
                      <label class="form-label" for="typePasswordX-2">Password</label>
                    </div>
                    <button id="submit" class="btn btn-primary btn-lg btn-block" type="button">Login</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </body>
</html>
