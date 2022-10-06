<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$select = "SELECT `diploma_with_student`.`id` id , `diploma_with_student`.`diploma_id` dipId , `diploma_with_student`.`student_id` std_id,
        `diploma_with_student`.`status` state ,`student`.`email` email , track.id trackId , track.title title FROM `diploma_with_student` 
        INNER JOIN student ON `diploma_with_student`.`student_id` = student.id INNER JOIN diplomas ON
        `diploma_with_student`.`diploma_id` = diplomas.id INNER JOIN track ON diplomas.track_id = track.id ORDER BY id ASC";
$result = mysqli_query($con, $select);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $std = $_GET['std'];
    $insert = "INSERT INTO `student_all_accepted`(`id`, `student_id`, `group_id`) VALUES (NULL,$std,9)";
    mysqli_query($con , $insert);
    $update = "UPDATE `diploma_with_student` SET `status`='accepted' WHERE `student_id` = '$std'";
    mysqli_query($con , $update);
    
}
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $std = $_GET['delstd'];
    $update = "UPDATE `diploma_with_student` SET `status`='rejected' WHERE `student_id` = '$std'";
    mysqli_query($con , $update);
    
}
?>
<main id="main" class="main">
    <h3>All Student</h3>
    <hr>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Track</th>
                    <th scope="col">Accept</th>
                    <th scope="col">Reject</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $data) {
                    if ($data['state'] == "wait") :
                ?>
                        <tr style="background-color: #14776345;">
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['title'] ?></td>
                            <td>
                                <a href="/instant/admin-panel/student/list.php?id=<?= $data['id']?>&std=<?= $data['std_id'] ?>" class='btn btn-success '>Accept</a>
                            </td>
                            <td>
                            <a href="/instant/admin-panel/student/list.php?delid=<?= $data['id']?>&delstd=<?= $data['std_id'] ?>" class='btn btn-danger '>Reject</a>
                            </td>
                        </tr>
                    <?php elseif ($data['state'] == "accepted") : ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['title'] ?></td>
                            <td><button class='btn btn-secondary'>Accepted</button></td>
                            <td></td>
                        </tr>
                    <?php else : ?>
                        <tr style="background-color: rgba(255, 99, 71, 0.3);">
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['title'] ?></td>
                            <td></td>
                            <td><button class='btn btn-secondary'>Rejected</button></td>
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