<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    $id = $_GET['e'];
    $sel = "SELECT * FROM web_blog WHERE blog_id='$id'";
    $be = mysqli_query($con,$sel);
    $blog = mysqli_fetch_assoc($be);

    if(!empty($_POST)){
        $id=$_POST['id'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $photo = $_FILES['photo'];

    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $update="UPDATE web_blog SET blog_category='$category',blog_title='$title',blog_subtitle='$subtitle'
        WHERE blog_id='$id'";

        $imgEdit = "UPDATE web_blog SET blog_image='$imgName' WHERE blog_id='$id'";

        if(mysqli_query($con,$update)){
            if ($photo['name']!='') {
                mysqli_query($con,$imgEdit);
                move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
                echo "Successfully complete blog updated.";
            }
            
            header ('location: blog-all.php');
        }else{
        echo "Opps! blog update failed.";
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
                            <p><i class="fa fa-user"></i>UPDATE BLOG</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="blog-all.php"><i class="fa fa-user"></i>BLOG INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Category:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id" value="<?= $blog['blog_id']; ?>">
                            <input type="text" class="form-control" name="category"
                            value="<?= $blog['blog_category']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title"
                            value="<?= $blog['blog_title']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle"
                            value="<?= $blog['blog_subtitle']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo"
                            <?= $blog['blog_image']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php if($blog['blog_image']!=''){?>
                            <img height="50px" src="upload/<?= $blog['blog_image']; ?>">
                            <?php }else{?>
                                <img height="50px" src="img/avatar.png">
                            <?php } ?>
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