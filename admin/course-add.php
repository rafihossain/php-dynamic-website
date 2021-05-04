<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    
    if(!empty($_POST)){
        $category = $_POST['category'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $photo = $_FILES['photo'];
        $picname='';

    if ($photo['name']!='') {
        $picname = 'course_'.time().'-'.rand(10000,100000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        

        $insert="INSERT INTO web_course(course_category,course_title,course_subtitle,course_photo)
        VALUES('$category','$title','$subtitle','$picname')";

        if(!empty($title)){
        if(!empty($subtitle)){

        if(mysqli_query($con,$insert)){
            move_uploaded_file($photo['tmp_name'],'upload/'.$picname);
        echo "course insert Successfully insert";
            header ('location: course-all.php');
        }else{
        echo "Opps! course insert failed.";
        }

        }else{
        echo "please enter course subtitle";
        }

        }else{
        echo "please enter course title";
        }
    }
?>

<div class="row">
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="card text-center">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <p><i class="fa fa-user"></i>Add COURSE</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="course-all.php"><i class="fa fa-user"></i>ALL COURSE INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Category:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="category" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo" >
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>

<?php
    get_footer();
?>