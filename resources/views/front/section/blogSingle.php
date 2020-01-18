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
                                                <button class="btn btn-sm btn-outline"><img src="/front/assets/img/share-icon.webp" alt=""> Share This</button>
                                            </div>
                                            <div id="share_options" class="sharebox" style="display:none" data-url="{{url()->current()}}" data-title="{{$product_details->product_name}}" data-services="facebook twitter  linkedin pinterest print">
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>

                        <div class="related_posts">
                            <h3>Related posts</h3>
                            <div class="row">
                                <?php
                                $blogs = $relatedBlogs;
                                include('blogs.php');
                                ?>
                            </div>
                        </div>

                        <!-- Comment List -->

                        <comment_box blog_id="<?= $blog->id ?>">

                        </comment_box>
                        <!-- Comment Form -->
                        <comment_form blog_id="" reply_to=""></comment_form>

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
                        </div>
                        <!-- <div class="widget_list widget_post">
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
                        </div> -->
                        <!-- <div class="widget_list widget_categories">
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
 -->
                        <!-- <div class="widget_list widget_tag">
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
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>