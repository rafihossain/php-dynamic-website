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
                    <p><i class="fa fa-user"></i>ALL CONTENT INFORMATION</p>
                </div>
                <div class="col-md-3">
                    <p><a href=""><i class="fa fa-user"></i>ADD CONTENT</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">title</th>
                        <th scope="col">subtitle</th>
                        <th scope="col">details</th>
                        <th scope="col">photo</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_content";
                        $a = mysqli_query($con,$sql);
                        while($rafi=mysqli_fetch_assoc($a)){

                    ?>
                    <tr>
                        <td><?php echo substr($rafi['content_title'],0,100); ?></td>
                        <td><?php echo substr($rafi['content_subtitle'],0,100); ?></td>
                        <td><?php echo substr($rafi['content_details'],0,100); ?></td>
                        <td>
                            <?php if($rafi['content_image']!=''){?>

                                <img height='100px' src="upload/<?= $rafi['content_image']; ?>">

                            <?php }else { ?>

                                <img height="100px" src="img/avatar.png" alt="content">

                            <?php }?>
                                
                        </td>
                        
                        <td>
                            <a href="page-edit.php?e=<?= $rafi['content_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
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