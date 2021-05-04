<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
    if ($_SESSION['role']=='1') {

?>

<?php
    
    if(!empty($_POST)){
        $name = $_POST['name'];
        $course = $_POST['course'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $file = $_FILES['photo'];
        $imgName = '';
        
        if ($file['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($file['name'],PATHINFO_EXTENSION);
    }
        
        $insert="INSERT INTO web_rafi(name,course,email,username,password,role_id,photo)
        VALUES('$name','$course','$email','$username','$password','$role','$imgName')";

        if(!empty($name)){
        if(!empty($course)){
        if(!empty($email)){

        if(mysqli_query($con,$insert)){
            move_uploaded_file($file['tmp_name'],'upload/'.$imgName);
        echo "Successfully complete user registration.";
            header ('location: user-all.php');
        }else{
        echo "Opps! user registration failed.";
        }

        }else{
        echo "please enter your email address";
        }

        }else{
        echo "please enter course name";
        }
        }else{
        echo "please enter your name";
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
                            <p><i class="fa fa-user"></i>USER REGISTRATION FROM</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="user-all.php"><i class="fa fa-user"></i>VIEW ALL USER DATA</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Name:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Course:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="course" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Email:</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Username:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Password:</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">User Role:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="role">
                                <option value="">Select User</option>
                                <?php
                                    $q = "SELECT * FROM web_role ORDER BY role_id ASC";
                                    $role = mysqli_query($con,$q);
                                    while($urole=mysqli_fetch_assoc($role)) {
                                        
                                ?>
                                <option value="<?= $urole ['role_id']; ?>"><?= $urole ['role_name']; ?></option>
                            <?php } ?>
                            </select>
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
                <button class="btn btn-primary">Registration</button>
            </div>

        </form>
    </div>
</div>

<?php
    get_footer();
    }else{
        echo 'Access Denied!! You have no permission to view this page..please contact Rafi Hossain';
    }
?>