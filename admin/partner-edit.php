<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    $id = $_GET['e'];
    $sel = "SELECT * FROM web_partner WHERE partner_id='$id'";
    $be = mysqli_query($con,$sel);
    $partner = mysqli_fetch_assoc($be);

    if(!empty($_POST)){
        $id=$_POST['id'];
        $photo =$_FILES['photo'];

    if ($photo['name']!='') {
        $imgName='partner_'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $update="UPDATE web_partner SET partner_image='$imgName' WHERE partner_id='$id'";

        if(mysqli_query($con,$update)){
            move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
            echo "Successfully complete partner update.";
            header ('location: partner-all.php');
        }else{
        echo "Opps! partner update failed.";
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
                            <p><i class="fa fa-user"></i>UPDATE PARTNER</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="partner-all.php"><i class="fa fa-user"></i>PARTNER INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="hidden" name="id" value="<?= $partner['partner_id']; ?>">
                            <input type="file" name="photo" value="<?= $partner['partner_image']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php if($partner['partner_image']!=''){?>
                            <img height="100px" src="upload/<?= $partner['partner_image']; ?>">
                            <?php }else{?>
                                <img height="100px" src="img/avatar.png">
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