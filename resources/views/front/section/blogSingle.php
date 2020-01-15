<div class="blog_bg_area">
    <div class="container">
        <div class="blog_page_section">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper blog_details">
                        <article class="single_blog">
                            <figure>
                                <div class="post_header">
                                    <h3 class="post_title"><?= $blog->title ?></h3>
                                    <div class="blog_meta">
                                        <span class="author">Posted by : <a href="#"><?= $blog->author_name ?></a> / </span>
                                        <span class="meta_date">On : <a href="#"><?= $blog->created_at ?></a></span>
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                    <img src="/front/assets/img/blogs/<?= $blog->image ?>" width="100%" alt="">
                                </div>
                                <figcaption class="blog_content">
                                    <div class="post_content">
                                        <?= $blog->desc ?>
                                    </div>
                                    <div class="entry_content">
                                        <div class="social_sharing">
                                        <div id="share_this">
                                            <button class="btn btn-sm btn-outline"><img src="/Ecom/static/share-icon.webp" alt=""> Share This</button>
                                        </div>
                                            <div id="share_options" class="sharebox" style="display:none" 
                                                    data-url="{{url()->current()}}"
                                                    data-title="{{$product_details->product_name}}"
                                                    data-services="facebook twitter  linkedin pinterest print">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                var $share_button  = document.getElementById('share_this');
                                $share_button.addEventListener('click', function(){
                                    if(document.getElementById('share_options').style.display=='block'){
                                        document.getElementById('share_options').style.display='none'
                                    } else {
                                        document.getElementById('share_options').style.display='block'
                                    }
                                
                                })
                                </script>

                                </figcaption>
                            </figure>
                        </article>
                        <div class="related_posts">
                            <h3>Related posts</h3>
                            <div class="row">
                                <div class="row">
                                    <?php foreach ($relatedBlogs as $blog) : ?>
                                        <div class="col-lg-4 col-md-6">
                                            <article class="single_related article_one">
                                                <figure>
                                                    <?php
                                                    $image = file_exists(ltrim(ASSETS, '/') . "/.uploads/blogs/" . $blog->image) ?
                                                        ASSETS . '/.uploads/blogs/' . $blog->image :
                                                        ASSETS . '/img/blogs/' . $blog->image;
                                                    ?>

                                                    <div class="related_thumb">
                                                        <img src="<?= $image ?>" alt="">
                                                        <div class="overlay">
                                                            <a href=""></a>
                                                        </div>
                                                    </div>
                                                    <figcaption class="related_content">
                                                        <h4><a href="#"><?= $blog->title ?></a></h4>
                                                        <div class="blog_meta">
                                                            <span class="author">By : <a href="#"><?= $blog->author_name ?></a> / </span>
                                                            <span class="meta_date"> <?= $blog->updated_at ?> </span>
                                                        </div>
                                                    </figcaption>
                                                    <div class="short_note"><?= $blog->desc ?></div>
                                                    <a href="/ui/blog/<?= $blog->id ?>/<?= $blog->slug ?>" class="btn btn-info">Read more...</a>
                                                </figure>
                                            </article>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="comments_box">
                            <h3>3 Comments </h3>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Admin</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span>
                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                                    <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>

                            </div>
                            <div class="comment_list list_two">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Demo</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span>
                                    </div>
                                    <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                                    <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Admin</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span>
                                    </div>
                                    <p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at</p>
                                    <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments_form">
                            <h3>Leave a Reply </h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="review_comment">Comment </label>
                                        <textarea name="comment" id="review_comment"></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label for="author">Name</label>
                                        <input id="author" type="text">

                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label for="email">Email </label>
                                        <input id="email" type="text">
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label for="website">Website </label>
                                        <input id="website" type="text">
                                    </div>
                                </div>
                                <button class="button" type="submit">Post Comment</button>
                            </form>
                        </div>

                    </div>
                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <div class="widget_title">
                                <h3>Search</h3>
                            </div>
                            <form action="#">
                                <input placeholder="Search..." type="text">
                                <button type="submit">search</button>
                            </form>
                        </div>
                        <div class="widget_list comments">
                            <div class="widget_title">
                                <h3>Recent Comments</h3>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <span> <a href="#">demo</a> says:</span>
                                    <a href="blog-details.html">Quisque semper nunc</a>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <span><a href="#">admin</a> says:</span>
                                    <a href="blog-details.html">Quisque orci porta...</a>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <span><a href="#">demo</a> says:</span>
                                    <a href="blog-details.html">Quisque semper nunc</a>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <span><a href="#">admin</a> says:</span>
                                    <a href="blog-details.html">Quisque semper nunc</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget_list widget_post">
                            <div class="widget_title">
                                <h3>Recent Posts</h3>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog6.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h4><a href="blog-details.html">Blog image post</a></h4>
                                    <span>March 16, 2018 </span>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog7.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h4><a href="blog-details.html">Post with Gallery</a></h4>
                                    <span>March 16, 2018 </span>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog8.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h4><a href="blog-details.html">Post with Audio</a></h4>
                                    <span>March 16, 2018 </span>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog9.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h4><a href="blog-details.html">Post with Video</a></h4>
                                    <span>March 16, 2018 </span>
                                </div>
                            </div>
                        </div>
                        <div class="widget_list widget_categories">
                            <div class="widget_title">
                                <h3>Categories</h3>
                            </div>
                            <ul>
                                <li><a href="#">Audio</a></li>
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Image</a></li>
                                <li><a href="#">Other</a></li>
                                <li><a href="#">Travel</a></li>
                            </ul>
                        </div>

                        <div class="widget_list widget_tag">
                            <div class="widget_title">
                                <h3>Tag products</h3>
                            </div>
                            <div class="tag_widget">
                                <ul>
                                    <li><a href="#">asian</a></li>
                                    <li><a href="#">brown</a></li>
                                    <li><a href="#">euro</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/jquery.sharebox.min.js')}}"></script>
<script>
jQuery(document).ready(function() {
	jQuery("#my-sharebox").sharebox();
});
</script>