<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
$s = "SELECT  tasks.id,tasks.title as task_name,track.title as tr_title,groups.status ,groups.id as group_id  FROM `tasks` JOIN groups on tasks.group_id=groups.id JOIN diplomas on groups.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id order by groups.id ";
$s_q = mysqli_query($con, $s);
?>
<main id="main" class="main">
    <h3>Tasks</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">task name</th>
                    <th scope="col">group</th>
                    <th scope="col">status</th>
                    <th scope="col"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td><?= $data['task_name'] ?></td>
                        <td><?= $data['tr_title'] ?>(<?= $data['group_id'] ?>)</td>
                        <td><?= $data['status'] ?></td>
                        <td><a href="/instant/admin-panel/tasks/show.php?show=<?= $data['id'] ?>"><i class='bx bx-show'></i></i></a></td>
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