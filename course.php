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
                                <h1 class="white-color f-700">Our Course</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <div class="courses-area courses-bg-height gray-bg pt-100 pb-70">
        <div class="container">
            <div class="courses-list">
                <div class="row">
                <?php
                    $q= "SELECT * FROM web_course";
                    $s= mysqli_query($con,$q);
                    while($course=mysqli_fetch_assoc($s)) {

                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="courses-wrapper course-radius-none mb-30">
                            <div class="courses-thumb">
                                <a href="course_details.html"><img height="350" width="300px" src="admin/upload/<?= $course['course_photo']; ?>" alt="course-photo"></a>
                            </div>
                            <div class="courses-author">
                                <img src="img/courses/coursesauthor1.png" alt="">
                            </div>
                            <div class="course-main-content clearfix">
                                <div class="courses-content">
                                    <div class="courses-category-name">
                                        <span>
                                            <a href="#"><?= $course['course_category']; ?></a>
                                        </span>
                                    </div>
                                    <div class="courses-heading">
                                        <h1><a href="course_details.html"><?= $course['course_title']; ?></a></h1>
                                    </div>
                                    <div class="courses-para">
                                        <p><?= $course['course_subtitle']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses-wrapper-bottom clearfix">
                                <div class="courses-icon d-flex f-left">
                                    <div class="courses-single-icon">
                                        <span class="ti-user"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                    <div class="courses-single-icon">
                                        <span class="ti-heart"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                </div>
                                <div class="courses-button f-right">
                                    <a href="course_details.html">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                   

                    <div class="col-xl-12">
                        <div class="single-courses-btn text-center mt-15 mb-30">
                            <button class="btn black-border">View all course</button>
                        </div>
                    </div>

            </div>
        </div>
    </div>
<?php
    get_footer();
?>
