<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
    if ($_SESSION['role']=='1') {

?>

<div class="row">
    <div class="col-md-12 main_content">

        <!-- table section start -->
    <div class="card text-center">
        <div class="card-header">
            <div class="row">
               <div class="col-md-7">
                    <p><i class="fa fa-user"></i>ALL USER INFORMATION</p>
                </div>
                <div class="col-md-3">
                    <p><a href="user-add.php"><i class="fa fa-user"></i>ADD DATA</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Username</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_rafi NATURAL JOIN web_role";
                        $a = mysqli_query($con,$sql);
                        while($rafi=mysqli_fetch_assoc($a)){

                    ?>
                    <tr>
                        <td><?php echo $rafi['Name']; ?></td>
                        <td><?php echo $rafi['Course']; ?></td>
                        <td><?php echo $rafi['Email']; ?></td>                       
                        <td><?php echo $rafi['role_name']; ?></td>                        
                        <td>
                           <?php if($rafi['Photo']!=''){ ?>
                           
                            <img height="50px" src="upload/<?= $rafi['Photo']; ?>" alt="user-photo">
                           
                           <?php }else{ ?>
                           
                            <img height="50px" src="img/avatar.png" alt="user-photo"> 
                              
                           <?php }?>
                        </td>
                        <td><?php echo $rafi['Username']; ?></td>
                        <td>
                            <a href="user-view.php?v=<?= $rafi['id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <a href="user-edit.php?e=<?= $rafi['id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="user-delete.php?d=<?= $rafi['id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
                        </td>
                    </tr>
                    
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
</div>


<?php
    get_footer();
    }else {
            echo 'Access Denied!! You have no permission to view this page..please contact Rafi Hossain';
        }
?>