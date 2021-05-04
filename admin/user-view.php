<?php session_start();
    require_once('functions/function.php');
    get_header();
?>
<?php
        $id = $_GET['v'];
        $sel = "SELECT * FROM web_rafi NATURAL JOIN web_role WHERE id='$id'";
        $query = mysqli_query($con,$sel);
        $info = mysqli_fetch_array($query);
    ?>
    
<div class="row">
    <div class="col-md-12 main_content">
        <form>

            <div class="card text-center">
                <div class="card-header">
                    <div class="row">
                       <div class="col-md-7">
                            <p><i class="fa fa-user"></i>VIEW USER REGISTRATION INFORMATION</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="user-all.php"><i class="fa fa-user"></i>VIEW TABLE</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                           <table class="table table-bordered table-striped table-hover custom_view_table">
                               <tr>
                                  <td>Name</td>
                                  <td>:</td>
                                  <td><?= $info['Name']; ?></td>
                              </tr>
                              <tr>
                                  <td>Course</td>
                                  <td>:</td>
                                  <td><?= $info['Course']; ?></td>
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td>:</td>
                                  <td><?= $info['Email']; ?></td>
                              </tr>
                              <tr>
                                  <td>Role</td>
                                  <td>:</td>
                                  <td><?= $info['role_name']; ?></td>
                              </tr>
                              <tr>
                                  <td>Username</td>
                                  <td>:</td>
                                  <td><?= $info['Username']; ?></td>
                              </tr>
                              <tr>
                                  <td>Photo</td>
                                  <td>:</td>
                                  <td>
                                        <?php if($info['Photo']!=''){ ?>

                                      <img height="200px" width="200px" src="upload/<?= $info['Photo']; ?>" alt="user-photo">

                                      <?php }else{ ?>

                                      <img height="200px" width="200px" src="img/avatar.png" alt="user-photo">

                                      <?php }?>  
                                  </td>
                              </tr>
                           </table> 
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>


<?php
    get_footer();
?>