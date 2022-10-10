<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s_group = "SELECT groups.id,groups.days,groups.status FROM `groups` JOIN diploma_with_student on groups.diploma_id=diploma_with_student.diploma_id group by groups.days  ";
$q_s_group = mysqli_query($con, $s_group);




$select = "SELECT `diploma_with_student`.`id` id , `diploma_with_student`.`diploma_id` dipId , `diploma_with_student`.`student_id` std_id,
        `diploma_with_student`.`status` state ,`student`.`email` email , track.id trackId , track.title title FROM `diploma_with_student` 
        INNER JOIN student ON `diploma_with_student`.`student_id` = student.id INNER JOIN diplomas ON
        `diploma_with_student`.`diploma_id` = diplomas.id INNER JOIN track ON diplomas.track_id = track.id  ORDER BY id ASC";
$result = mysqli_query($con, $select);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $std = $_GET['std'];
    if(isset($_POST['sned'])){
        $id_group=$_POST['group_id'];
        
    $insert = "INSERT INTO `student_all_accepted`(`id`, `student_id`, `group_id`) VALUES (NULL,$std,$id_group)";
    $q=mysqli_query($con, $insert);
    if($q){
    $update = "UPDATE `diploma_with_student` SET `status`='accepted' WHERE `student_id` = '$std'";
    mysqli_query($con, $update);
    go("/student/listAll.php");
    }
    }
}
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $std = $_GET['delstd'];
    $update = "UPDATE `diploma_with_student` SET `status`='rejected' WHERE `student_id` = '$std'";
   
    mysqli_query($con, $update);
    $d="DELETE FROM `diploma_with_student` WHERE `diploma_with_student`.`student_id`=$std";
    $q_de=mysqli_query($con,$d);
    go("/student/list.php");
}
?>
<main id="main" class="main">
    <h3>All Student</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table " style="margin-left:  -15px;">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col-0">Track</th>
                    <th scope="col">status</th>
                    <th scope="col"><i class='bx bx-group'></i></th>



                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $data) {
                    if ($data['state'] == "wait") :
                ?>
                        <tr style="background-color: #14776345;">

                            <td><?= $data['email'] ?></td>
                            <td><?= $data['title'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class='bx bx-show'></i>
                                    </a>

                                    <div class="dropdown-menu">
                                     

                                            <a href="/instant/admin-panel/student/list.php?id=<?= $data['id'] ?>&std=<?= $data['std_id'] ?>" class='btn btn-success '><i class='bx bx-like'></i></a>
                                            <a href="/instant/admin-panel/student/list.php?delid=<?= $data['id'] ?>&delstd=<?= $data['std_id'] ?>" class='btn btn-danger '><i class='bx bx-dislike'></i></a>
                                            <form action="" method="POST">
                                            <select name="group_id" id="">
                                                <?php foreach ($q_s_group as $data1) { ?>
                                                    <option value="<?= $data1['id'] ?>"><?= $data1['days'] ?></option>
                                                <?php } ?>

                                            </select>
                                            <button name="sned" class="btn btn-info">Send</button>
                                        </form>
                                    </div>
                                </div>


                            </td>

                        </tr>
                    <?php elseif ($data['state'] == "accepted") : ?>
                        <tr>

                            <td><?= $data['email'] ?></td>
                            <td><?= $data['title'] ?></td>
                            <td><i class='bx bx-like'></i></td>
                            <td></td>
                        </tr>
                    <?php else : ?>
                        <tr style="background-color: rgba(255, 99, 71, 0.3);">

                            <td><?= $data['email'] ?></td>
                            <td><?= $data['title'] ?></td>

                            <td><i class='bx bx-dislike'></i></td>
                        </tr>
                <?php endif;
                } ?>
            </tbody>
        </table>
    </div>
    
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>