<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>
<?php
    $id=$_GET['e'];
    $sel="SELECT * FROM web_content WHERE content_id='$id'";
    $Q=mysqli_query($con,$sel);
    $data=mysqli_fetch_assoc($Q);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $details = $_POST['details'];
        $photo = $_FILES['photo'];
        $picname='';
        if($photo['name']!=''){
          $picname='content-'.time().'_'.rand(1000,10000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
        }
        
      $update = "UPDATE web_content SET content_title='$title', content_subtitle ='$subtitle',
      content_details='$details' WHERE content_id='$eid'";
      $picUpdate="UPDATE web_content SET content_image='$picname' WHERE content_id='$eid'";
        
        if(!empty($title)){
          if(mysqli_query($con,$update)){
              if ($photo['name']!='') {
                  mysqli_query($con,$picUpdate);
                  move_uploaded_file($photo['tmp_name'],'upload/'.$picname);
              }
              header('location:page-content.php');
          }else{
              echo "Page content information updated failed!";
          }
        }else{
            echo "Please enter page content title!";
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
                            <p><i class="fa fa-user"></i>EDIT CONTENT PAGE</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="page-content.php"><i class="fa fa-user"></i>ALL CONTENT INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Title:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="eid" value="<?= $data['content_id']; ?>">
                            <input type="text" class="form-control" name="title" 
                            value="<?= $data['content_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle" 
                            value="<?= $data['content_subtitle']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Details:</label>
                        <div class="col-sm-7">
                            <textarea type="text" rows='10' class="form-control" name="details">
                            <?= $data['content_details'];?> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Image:</label>
                        <div class="col-sm-3">
                            <input type="file"  name="photo"
                            value="<?= $data['content_image'];?>">
                        </div>
                        <div class="col-sm-4">
                            <?php if ($data['content_image']!='') { ?>
                               <img height="100px" src="upload/<?= $data['content_image'];?>" alt="content-image">
                            <?php }else{?>
                                <img height="100px" src="img/avatar.png" alt="content-image">
                            <?php }?>
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