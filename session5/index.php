<?php
require 'session.php';
require 'functions.php';

redirectIfNotAuthenticated();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Postbook</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="assets/js/user.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <button class="navbar-brand" id="logout-btn">Logout</button>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav>
        </div>
        <div class="container">
          <div class="well">
              <div class="media">
              	<a class="pull-left" href="#">
            		<img class="media-object" src="http://placekitten.com/150/150">
          		</a>
          		<div class="media-body">
            		<h4 class="media-heading">Receta 1</h4>
                  <p class="text-right">By Francisco</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
        Aliquam in felis sit amet augue.</p>
                  <ul class="list-inline list-unstyled">
          			<li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                    <li>|</li>
                    <li>
                    <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                      <span><i class="fa fa-facebook-square"></i></span>
                      <span><i class="fa fa-twitter-square"></i></span>
                      <span><i class="fa fa-google-plus-square"></i></span>
                    </li>
        			</ul>
               </div>
            </div>
          </div>
        </div>
    </body>
</html>
