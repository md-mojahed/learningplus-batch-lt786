<?php include('includes/header.php'); ?>
<?php
require('functions.php');

$posts = getPosts();
$categories = getCategories();
?>
<script>window.posts = <?= json_encode($posts) ?>;</script>
<div class="container-fluid d-none">
 <!--Header-->
 <div class="row head w-100" style="position:fixed;top:0;z-index:2;">
     <div class="col-2" style="font-size:25px;"><a href="#create-story" data-toggle="modal" class="h-100 text-center text-warning font-weight-bold">+</a></div>
     <div class="col-8" style="">
         <select id="search-categories" class="form-control mt-1 mb-1 font-weight-bold select-category-header" name="select-category" style="height:auto;text-align-last:center;">
             <option value="">--Category--</option>
             <?php foreach ($categories as $category) { ?>
                 <option value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?></option>
             <?php } ?>
         </select>
     </div>
     <div class="col-2 pt-1 text-center" style="font-size:25px;"><a href="#search-story-modal" data-toggle="modal" class="h-100  text-light">&#128269;</a></div>
 </div>

     <!--Search Story modal-->
     <div class="w-100 modal mt-5 pt-5" id="search-story-modal" style="background:rgba(0,0,0,0.3);margin:0 auto;width:35%;">
         <div class="text-right mb-5">
             <span class="close-search mr-5 btn btn-outline-danger btn-sm" style="font-size:15px;">&#x274C;</span>
        <script>
            $(document).ready(function(){
                $('.close-search').click(function(){
                    $("#search-story-modal").modal('toggle');
                });
            });
        </script>
    </div>
        <form action="" class="form-inline text-center w-75" method="post" style="margin:auto;" autocomplete="off">
            <input type="text" class="form-control text-center w-100" id="search-input" value="" placeholder="Story..." required>
            <button id="search-btn" class="btn btn-outline-success mt-2 w-100">&#9889;</button>
        </form>
    </div>
 <!--All Stories-->
 <script>
     $(document).ready(function(){
         var height = $(window).height();
         height_2 = height - 150;
         height_2 = height_2 + "px";
         height = (height-80) + "px";
         $('.story-table').css({"height":height});
     });
 </script>
<div class="row story-table" style="overflow-y:scroll;margin-top:50px;z-index:1;">
    <div class="col-12 w-100">
        <table class="table table-borderless text-center table-hover" id="table_for_all_story">
            <tbody id="post-container">
                <?php foreach ($posts as $post) { ?>
                    <tr style="">
                        <td onclick='showPost(<?= json_encode($post) ?>)'>
                            <span class="text-dark">
                                <div class="w-75 pt-3 rounded" style="margin:auto;background-color:rgba(110, 0, 255,0.1);padding-bottom:10px;background-image:url(assets/images/icon-logo/story-bg.png);background-size:60px 50px;background-position:center center;background-repeat:no-repeat;">
                                    <b><?= $post['title'] ?></b><br>
                                    <i>Posted By</i>-<br>
                                    <b><?= $post['user_name'] ?></b>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
            </tbody>
        </table>
    </div>
</div>
<!-- <script>
    $(document).ready(function(){
       $('#link-story-1000001').click(function(){
           $.ajax({
               type:"POST",
               url:"ajax/getfile.php",
               data:{storypath:"../profile/story/user_33/single/someone/শেষ দানেও আছি.....txt",views:"18",table:"user_33",storyId:"48",writer:"সাফিনাজ আরজু",posted:"Story World",name:"শেষ দানেও আছি....",count:"1000001"},
               success:function(result){
                    $('#td-1000001').html('');
                    $('#td-1000001').html(result);
                    var story_h = $(window).height();
                    story_h = story_h - 150;
                    story_h = story_h + "px";
                    $('.story-div').css({"height":story_h});
                    $('#show-story-1000001').modal('show');
               }
           });
       });
   });
</script> -->
<div class="w-100 modal p-2" style="background:rgba(0,0,0,0.3);"
  id="show-story">
   <div class="text-right">
     <span class="close-story btn btn-outline-danger btn-sm" style="font-size:15px;">&#x274C;</span>
            <script>
                $(document).ready(function(){
                    $(".close-story").click(function(){
                        $("#show-story").modal("toggle");
                    });
                });
            </script>
    </div>
   <div class="bg-light w-100 rounded p-2 text-center" style="margin:auto;height:40vw">
       <div class="text-center w-100">
           <button id="change_font_size" class="btn btn-sm btn-success">Zoom In
           </button>
           <button id="less-change_font_size" class="btn btn-sm btn-info">Zoom Out
           </button>
        </div>
       <span class="text-center">
            <img src="assets/images/icon-logo/icon.png" width="50px" height="40px">
               </span>
       <div class="form-control text-left story-div" style="overflow-y:scroll;height:68vh">

           <b id="story-title"></b>
           <pre id="story-description"></pre>
           <br><br>Posted By - <b id="posted-by"></b>
       </div>
   </div>
</div>
<div class="w-100 modal p-2" style="background:rgba(0,0,0,0.3);"
  id="create-story">
   <div class="text-right">
     <span class="close-form btn btn-outline-danger btn-sm" style="font-size:15px;">&#x274C;</span>
            <script>
                $(document).ready(function(){
                    $(".close-form").click(function(){
                        $("#create-story").modal("toggle");
                    });
                });
            </script>
    </div>
   <div class="bg-light w-50 rounded p-2 text-center" style="margin:auto;height:40vw">
       <form class="form" action="api.google.com" method="post" id="story-form">
           <div class="form-group">
               <center>Create Post</center>
           </div>
           <div class="form-group pl-5 pr-5">
               <input class="form-control" required type="text" id="title" placeholder="Title...">
           </div>
           <div class="form-group pl-5 pr-5">
               <select class="form-control" required id="category">
                   <?php foreach ($categories as $category) { ?>
                       <option value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?></option>
                   <?php } ?>
               </select>
           </div>
           <div class="form-group">
               <textarea id="description" required rows="8" cols="57" placeholder="Description.."></textarea>
           </div>
           <div class="form-group">
               <center>
                   <button type="submit" class="btn btn-success">Create</button>
               </center>
           </div>
       </form>
       <script>
           $(document).ready(function(){
               $('#story-form').submit(function(event) {
                   event.preventDefault();
                   let title = $('#title').val();
                   let category = $('#category').val();
                   let description = $('#description').val();

                   $.ajax({
                       type : 'POST',
                       url : 'request.php',
                       data : {
                           title, category, description, url : '/store-post'
                       },
                       success : function(response) {
                           console.log(response);
                           if (response.status == 'success') {
                               swal({
                                   title : 'Successfull',
                                   icon : 'success'
                               });

                               window.location.reload();
                           } else {
                               swal({
                                   title : 'Error',
                                   text : response.message,
                                   icon : 'error'
                               });
                           }
                       }
                   });
               });
           });
       </script>
   </div>
</div>
<?php include('includes/footer.php'); ?>
