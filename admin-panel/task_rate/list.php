<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s = "  SELECT groups.id,groups.status,groups.days,track.title FROM groups JOIN diplomas on groups.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id";
$s_q = mysqli_query($con, $s);
?>
<main id="main" class="main">
    <h3>Tasks Group</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">group</th>
                    <th scope="col">days</th>
                   
                    <th scope="col"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td><?= $data['title'] ?>(<?= $data['id'] ?>)</td>
                        <td><?= $data['status'] ?>(<?= $data['days'] ?>)</td>
                        
                        <td><a href="/instant/admin-panel/task_rate/show.php?show=<?= $data['id'] ?>"><i class='bx bx-show'></i></i></a></td>
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