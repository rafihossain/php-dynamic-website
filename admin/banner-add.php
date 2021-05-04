<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    
    if(!empty($_POST)){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $btn = $_POST['btn'];
        $url = $_POST['url'];
        $photo = $_FILES['photo'];
        
    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $insert="INSERT INTO web_banner(ban_title,ban_subtitle,ban_btn,ban_url,ban_photo)
        VALUES('$title','$subtitle','$btn','$url','$imgName')";

        if(mysqli_query($con,$insert)){
            move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
        echo "Successfully complete banner upload.";
            header ('location: banner-all.php');
        }else{
        echo "Opps! banner upload failed.";
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
                            <p><i class="fa fa-user"></i>UPLOAD BANNER</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="banner-all.php"><i class="fa fa-user"></i>VIEW ALL BANNER INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Bannner Button:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="btn">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Button Url:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Photo:</label>
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