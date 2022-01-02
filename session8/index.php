<?php include('includes/header.php'); ?>
<?php

$posts = require('getPosts.php');

?>
<!-- Theme Options -->
<div class='theme-options' style='display:none'>
 <div class='sora-panel section' id='sora-panel' name='Theme Options'>
    <div class='widget LinkList' data-version='2' id='LinkList71'>
       <script type='text/javascript'>
          //<![CDATA[


              var disqusShortname = "soratemplates";


              var commentsSystem = "blogger";


              var postPerPage = 6;


          //]]>
       </script>
    </div>
 </div>
</div>
<!-- Outer Wrapper -->
<div id='outer-wrapper'>
 <!-- Header Wrapper -->
 <div id='header-wrap'>
    <div class='header-header'>
       <div class='container row'>
          <div class='header-social section' id='header-social' name='Header Social'>
             <div class='widget LinkList' data-version='2' id='LinkList73'>
                <ul class='social'>
                   <li class='facebook'><a href='#' target='blank'></a></li>
                   <li class='pinterest'><a href='#' target='blank'></a></li>
                   <li class='instagram'><a href='#' target='blank'></a></li>
                </ul>
             </div>
          </div>
          <div class='header-logo section' id='header-logo' name='Header Logo'>
             <div class='widget Header' data-version='2' id='Header1'>
                <div class='header-widget'>
                   <h1>
                      <a href='https://healthy-way2themes.blogspot.com/'>
                      Healthy
                      </a>
                   </h1>
                   <p></p>
                </div>
             </div>
          </div>
          <span class='search-toggle'></span>
       </div>
    </div>
 </div>
 <div class='clearfix'></div>
 <!-- Content Wrapper -->
 <div class='row' id='content-wrapper'>
    <div class='container'>
       <!-- Main Wrapper -->
       <div id='main-wrapper'>
          <div class='main section' id='main' name='Main Posts'>
             <div class='widget Blog' data-version='2' id='Blog1'>
                <div class='blog-posts hfeed index-post-wrap'>
                    <!-- Single Post -->
                    <?php foreach ($posts as $post) { ?>
                        <div class='blog-post hentry index-post'>
                      <div class='post-image-wrap'>
                         <a class='post-image-link' href='post/<?= $post['id'] ?>'>
                         <img alt='Blueberry Cheesecake Protein Shake' class='post-thumb' src='<?= $post['image'] ?>'/>
                         </a>
                      </div>
                      <div class='post-info blog-post-info'>
                         <div class='post-meta'><span class='post-date published' datetime='2016-08-23T15:00:00-07:00'><?= date('d F Y') ?></span></div>
                         <h2 class='post-title'>
                            <a href='<-- post-url -->'><?= $post['title'] ?></a>
                         </h2>
                      </div>
                   </div>
                   <?php } ?>
                </div>
             </div>
          </div>
       </div>
       <!-- Sidebar Wrapper -->
       <div id='sidebar-wrapper' style='display:none!important'>
          <div class='sidebar no-items section' id='sidebar' name='Sidebar Right'></div>
       </div>
    </div>
 </div>
 <div class='clearfix'></div>
 <!-- Footer Wrapper -->
 <div id='footer-wrapper'>
    <div class='container row'>
       <div class='footer no-items section' id='footer-section' name='Follow By Email'></div>
    </div>
    <div class='clearfix'></div>
    <div id='sub-footer-wrapper'>
       <div class='footer-menu section' id='footer-menu' name='Footer Menu'>
          <div class='widget LinkList' data-version='2' id='LinkList75'>
             <ul class='footer-menu-nav'>
                <li><a href='/'>Home</a></li>
                <li><a href='https://healthy-way2themes.blogspot.com/p/about-us.html'>About</a></li>
                <li><a href='https://healthy-way2themes.blogspot.com/p/contact-us.html'>Contact Us</a></li>
             </ul>
          </div>
       </div>
    </div>
 </div>
</div>
<?php include('includes/footer.php'); ?>
