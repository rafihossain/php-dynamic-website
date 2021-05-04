<?php
    require_once('functions/manage.php');
    get_header();
?>
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/bg/Student-Discounts.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Blog Grid View</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <div class="blog-grid-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="blog-grid-list">
                <div class="row">
                    <?php
                    $query ="SELECT * FROM web_blog";
                    $s = mysqli_query($con,$query);
                    while ($blog=mysqli_fetch_assoc($s)) {
                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="blog-wrapper mb-30">
                            <div class="blog-thumb mb-25">
                                <a href="blog.php"><img src="admin/upload/<?= $blog['blog_image'];?>" alt=""></a>
                                <span class="blog-category"><?= $blog['blog_category'];?></span>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span>Auguest 25, 2018</span>
                                </div>
                                <h5><a href="news_details.html"><?= $blog['blog_title'];?></a></h5>
                                <p><?= $blog['blog_subtitle'];?></p>
                                <div class="read-more-btn">
                                    <button>Read more</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                    
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="single-events-btn mt-15 mb-30">
                            <nav class="course-pagination mb-30" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-angle-left"></span></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-angle-right"></span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    get_footer();
?>
