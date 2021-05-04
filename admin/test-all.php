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
                    <p><i class="fa fa-user"></i>CLIENT TESTIMONIAL INFORMATION</p>
                </div>
                <div class="col-md-3">
                    <p><a href=""><i class="fa fa-user"></i>ADD TESTIMONIAL</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th scope="col">Client Name</th>
                        <th scope="col">Client Subject</th>
                        <th scope="col">Client Subtitle</th>
                        <th scope="col">Client Image</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_testimonial";
                        $te = mysqli_query($con,$sql);
                        while($test=mysqli_fetch_assoc($te)){

                    ?>
                    <tr>
                        
                        <td><?php echo $test['test_name']; ?></td>
                        <td><?php echo $test['test_subject']; ?></td>
                        <td><?php echo $test['test_subtitle']; ?></td>
                        
                        <td>
                           <?php if($test['test_image']!=''){ ?>
                           
                            <img height="50px" src="upload/<?= $test['test_image']; ?>" alt="test-photo">
                           
                           <?php }else{ ?>
                           
                            <img height="50px" src="img/avatar.png" alt="test-photo"> 
                              
                           <?php }?>
                        </td>
                        <td>
                            <a href="test-edit.php?e=<?= $test['test_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="test-delete.php?d=<?= $test['test_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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