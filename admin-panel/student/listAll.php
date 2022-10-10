<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$select = "SELECT `student_all_accepted`.`id` id, `groups`.`days` groupId , `student`.`email` stdemail
        FROM `student_all_accepted` INNER JOIN `diploma_with_student`ON `student_all_accepted`.`student_id` =`diploma_with_student`.`student_id` INNER JOIN `student` on 
        `student`.`id` = `diploma_with_student`.`student_id` INNER JOIN `groups` ON `groups`.`id` = `student_all_accepted`.`group_id` GROUP BY `diploma_with_student`.`student_id`  ORDER BY id ASC";
$result = mysqli_query($con, $select);
?>
<main id="main" class="main">
    <h3>All Accepted Student</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Group</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $data) {
                ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['stdemail'] ?></td>
                            <td><?= $data['groupId'] ?></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>