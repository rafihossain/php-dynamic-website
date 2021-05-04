<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    $id = $_GET['e'];
    $sel = "SELECT * FROM web_banner WHERE ban_id='$id'";
    $be = mysqli_query($con,$sel);
    $bedit = mysqli_fetch_assoc($be);

    if(!empty($_POST)){
        $id=$_POST['id'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $btn = $_POST['btn'];
        $url = $_POST['url'];
        $photo = $_FILES['photo'];

    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $update="UPDATE web_banner SET ban_title='$title',ban_subtitle='$subtitle',
        ban_btn='$btn',ban_url='$url' WHERE ban_id='$id'";

        $imgEdit = "UPDATE web_banner SET ban_photo='$imgName' WHERE ban_id='$id'";

        if(mysqli_query($con,$update)){
            if ($photo['name']!='') {
                mysqli_query($con,$imgEdit);
                move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
                echo "Successfully complete banner upload.";
            }
            
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
                        <div class="col-md-5">
                            <p><a href="banner-all.php"><i class="fa fa-user"></i>VIEW ALL BANNER INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Title:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id" value="<?= $bedit['ban_id']; ?>">
                            <input type="text" class="form-control" name="title"
                            value="<?= $bedit['ban_title']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle"
                            value="<?= $bedit['ban_subtitle']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Bannner Button:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="btn"
                            value="<?= $bedit['ban_btn']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Button Url:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="url"
                            value="<?= $bedit['ban_url']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Banner Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo"
                            <?= $bedit['ban_photo']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php if($bedit['ban_photo']!=''){?>
                            <img height="50px" src="upload/<?= $bedit['ban_photo']; ?>">
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