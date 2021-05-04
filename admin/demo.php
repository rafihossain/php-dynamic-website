<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    if (!empty($_POST)){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $details = $_POST['details'];
        $photo = $_FILES['photo'];
        $img='';
    if ($photo['name']!='') {
        $img ='content_'.time().'-'.rand(1000,10000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);  
        }

        $insert = "INSERT INTO web_content(content_title,content_subtitle,content_details,content_image)
        VALUES('$title','$subtitle','$details','$img')";

        if (mysqli_query($con,$insert)) {
            move_uploaded_file($photo['tmp_name'],'upload/'.$img);
            echo "content upload successfully";
        }else{
            echo "oop! content upload faild";
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
                            <p><i class="fa fa-user"></i>CONTENT INFORMATION</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="all-content.php"><i class="fa fa-user"></i>VIEW ALL CONTENT</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Details:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="details" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo">
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary">Upload</button>
            </div>

        </form>
    </div>
</div>

<?php
    get_footer();
?>