<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<div class="row">
    <div class="col-md-12 main_content">

        <!-- table section start -->
    <div class="card text-center">
        <div class="card-header">
            <div class="row">
               <div class="col-md-7">
                    <p><i class="fa fa-user"></i>ALL COURSE INFORMATION</p>
                </div>
                <div class="col-md-3">
                    <p><a href="course-add.php"><i class="fa fa-user"></i>Add COURSE</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">catagory</th>
                        <th scope="col">author img</th>
                        <th scope="col">title</th>
                        <th scope="col">subtitle</th>
                        <th scope="col">photo</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_course";
                        $a = mysqli_query($con,$sql);
                        while($rafi=mysqli_fetch_assoc($a)){

                    ?>
                    <tr>
                        <td><?php echo $rafi['course_category']; ?></td>
                        <td>
                            <?php if($rafi['course_auth']!=''){ ?>
                           
                            <img height="50px" src="upload/<?= $rafi['course_auth']; ?>" alt="author-photo">
                           
                           <?php }else{ ?>
                           
                            <img height="50px" src="img/avatar.png" alt="author-photo"> 
                              
                           <?php }?>
                        </td>
                        <td><?php echo $rafi['course_title']; ?></td>
                        <td><?php echo $rafi['course_subtitle']; ?></td>
                        <td>
                            <?php if($rafi['course_photo']!=''){ ?>
                           
                            <img height="50px" src="upload/<?= $rafi['course_photo']; ?>" alt="course-photo">
                           
                           <?php }else{ ?>
                           
                            <img height="50px" src="img/avatar.png" alt="course-photo"> 
                              
                           <?php }?>
                                
                        </td>
                        
                        <td>
                            <a href="course-edit.php?e=<?= $rafi['course_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="course-delete.php?d=<?= $rafi['course_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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
?>