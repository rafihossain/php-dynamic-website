<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>
<?php
    $id=$_GET['e'];
    $sel="SELECT * FROM web_rafi NATURAL JOIN web_role WHERE id='$id'";
    $Q=mysqli_query($con,$sel);
    $data=mysqli_fetch_assoc($Q);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $n = $_POST['name'];
        $c = $_POST['course'];
        $e = $_POST['email'];
        $u = $_POST['username'];
        $p = $_POST['password'];
        $role = $_POST['role'];
        $file = $_FILES['photo'];
        $imgName = '';
        
    if ($file['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($file['name'],PATHINFO_EXTENSION);
    }
        $update = "UPDATE web_rafi SET name='$n', course='$c', email='$e', username='$u',
                password='$p',role_id='$role' WHERE id='$eid' ";
        $updateImg = "UPDATE web_rafi SET photo='$imgName' WHERE id='$eid' ";

        if(mysqli_query($con,$update)){
            if ($file['name']!='') {
                    mysqli_query($con,$updateImg);
                    move_uploaded_file($file['tmp_name'],'upload/'.$imgName);
            }
            header('Location:user-view.php?v='.$eid);
        }else{
            echo "data not updated";
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
                            <p><i class="fa fa-user"></i>EDIT USER REGISTRATION INFORMATION</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="user-all.php"><i class="fa fa-user"></i>VIEW TABLE</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Name:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="eid" value="<?= $data['id']; ?>">
                            <input type="text" class="form-control" name="name" id=""
                            value="<?= $data['Name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Course:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="course" id=""
                            value="<?= $data['Course']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Email:</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email"
                            value="<?= $data['Email'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Username:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="username"
                            value="<?= $data['Username'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Password:</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password"
                            value="<?= $data['Password'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">User Role:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="role">
                                <option value="">Select User</option>
                                <?php
                                    $qr = "SELECT * FROM web_role ORDER BY role_id ASC";
                                    $role2 = mysqli_query($con,$qr);
                                    while($urole2=mysqli_fetch_assoc($role2)) {
                                        
                                ?>
                                <option value="<?= $urole2 ['role_id']; ?>"><?= $urole2 ['role_name']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo">
                        </div>
                        <div class="col-md-3">
                            <?php if ($data['Photo']!='') { ?>
                            <img height="100px" src="upload/<?= $data['Photo']; ?>" alt="photo">
                            <?php } else { ?>
                            <img height="100px" src="img/avatar.png" alt="user photo">
                            <?php } ?>
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