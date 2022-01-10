$(document).ready(function(){
    $('#search-categories').change(function(){
        var category_id = $('#search-categories').val();

        if (category_id) {
            var filtered_posts = window.posts.filter(function(post){
                return category_id == post.category_id;
            });

            var html = '';

            for(var post of filtered_posts) {
                html += `<tr style="">
                    <td>
                        <a class="text-dark" href="">
                            <div class="w-75 pt-3 rounded" style="margin:auto;background-color:rgba(110, 0, 255,0.1);padding-bottom:10px;background-image:url(assets/images/icon-logo/story-bg.png);background-size:60px 50px;background-position:center center;background-repeat:no-repeat;">
                                <b>${post.title}</b><br>
                                <i>Posted By</i>-<br>
                                <b>${post.user_name}</b>
                        </a>
                        <div id="">

                        </div>
                    </td>
                </tr>`;
            }

            $('#post-container').html(html);
        } else {
            var html = '';

            for(var post of window.posts) {
                html += `<tr style="">
                    <td>
                        <a class="text-dark" href="">
                            <div class="w-75 pt-3 rounded" style="margin:auto;background-color:rgba(110, 0, 255,0.1);padding-bottom:10px;background-image:url(assets/images/icon-logo/story-bg.png);background-size:60px 50px;background-position:center center;background-repeat:no-repeat;">
                                <b>${post.title}</b><br>
                                <i>Posted By</i>-<br>
                                <b>${post.user_name}</b>
                        </a>
                        <div id="">

                        </div>
                    </td>
                </tr>`;
            }

            $('#post-container').html(html);
        }
    });

    $('#search-btn').click(function(event){
        event.preventDefault();

        var search_text = $('#search-input').val().toLowerCase();
        var filtered_posts = window.posts.filter(function(post){
            return post.title.toLowerCase().includes(search_text) || post.description.toLowerCase().includes(search_text);
        });

        var html = '';

        for(var post of filtered_posts) {
            html += `<tr style="">
                <td>
                    <a class="text-dark" href="">
                        <div class="w-75 pt-3 rounded" style="margin:auto;background-color:rgba(110, 0, 255,0.1);padding-bottom:10px;background-image:url(assets/images/icon-logo/story-bg.png);background-size:60px 50px;background-position:center center;background-repeat:no-repeat;">
                            <b>${post.title}</b><br>
                            <i>Posted By</i>-<br>
                            <b>${post.user_name}</b>
                    </a>
                    <div id="">

                    </div>
                </td>
            </tr>`;
        }

        $('#post-container').html(html);
        $("#search-story-modal").modal('toggle');
    });

    $("#change_font_size").click(function(){
        var new_font_size = $("#story-description").css("font-size");
        new_font_size = parseInt(new_font_size, 10);
        new_font_size = new_font_size + 3;
          if(new_font_size <= 35){
              $("#story-description").css({
                  "font-size": new_font_size + "px"
              });
          }
     });
     $("#less-change_font_size").click(function(){
         var new_font_size = $("#story-description").css("font-size");
        new_font_size = parseInt(new_font_size, 10);
        new_font_size = new_font_size - 3;
          if(new_font_size >= 11){
              $("#story-description").css({
                  "font-size": new_font_size + "px"
              });
             }
     });
});

function showPost(post) {
    $('#story-title').text(post.title);
    $('#story-description').text(post.description);
    $('#posted-by').text(post.user_name);
    $('#show-story').modal('show');
}
